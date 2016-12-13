<?php

namespace Librinfo\VarietiesBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Blast\CoreBundle\Exception\InvalidEntityCodeException;
use Librinfo\MediaBundle\Controller\CRUDController as BaseCRUDController;

class VarietyCRUDController extends BaseCRUDController
{
    public function hierarchyAction($id)
    {
        $species = $this->get('doctrine')
                ->getRepository('LibrinfoVarietiesBundle:Species')
                ->find($id)
            ;
        
        return new JsonResponse($species);
    }
    
    /**
     * Creates a strain from a variety and passes it to create action
     * 
     * @return Response
     */
    public function strainAction()
    {
        $id = $this->getRequest()->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);
        $strain = clone $object;
        
        $strain->setIsStrain(true);
        $strain->setParent($object);
        
        $fieldSets = ['Professional', 'Amateur', 'Production', 'Commercial', 'Plant', 'Culture', 'Inner'];
   
        foreach($fieldSets as $label)
        {
            $getter = 'get' . $label . 'Descriptions';
            $adder = 'add' . $label . 'Description';
            $collection = $object->$getter();
            $collection->initialize();
            
            foreach($collection as $desc)
            {
                $new = clone $desc;
                $strain->$adder($new);
            }
        }
        
        $this->duplicateFiles($object, $strain);
        
        foreach($object->getPlantCategories() as $cat)
            $strain->addPlantCategory($cat);
        
        return $this->createAction($strain);
    }
    
    /**
     * Get field widget for filter form
     *
     * @param String $fieldName the name of the field to get the form widget for
     * @return JsonResponse
     */
    public function getFilterWidgetAction(Request $request)
    {
        $translator = $this->get('translator');
        $fieldSet = $request->get('fieldset');
        $field = $request->get('field');

        $config = $this->admin->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties');
        $fieldConfig = $config['variety_descriptions'][$fieldSet][$field];
        $choiceType = 'blast_custom_choice';
        $options = $fieldConfig['options'];
        $type = $fieldConfig['type'] != 'textarea' ? $fieldConfig['type'] : 'text';

        if ( $type == 'blast_custom_checkbox' )
        {
            $type = 'choice';
            $options = array_merge($options, array(
                'choices' => array('1' => $translator->trans('yes'), '0' => $translator->trans('no'))
            ));
        }

        if ( $type == $choiceType )
        {
            $options['is_filter'] = true;

            if ( isset($options['expanded']) )
                unset($options['expanded']);

            if ( isset($options['multiple']) )
                unset($options['multiple']);
        }

        if ( $type == 'blast_tinymce' )
            $type = 'text';

        if ( isset($options['choices']) && empty($options['choices']) )
            unset($options['choices']);

        if ( isset($options['choices_class']) && $type != $choiceType )
            unset($options['choices_class']);

        if ( isset($options['blast_choices']) && $type != $choiceType )
            unset($options['blast_choices']);

        if ( isset($options['help']) )
            unset($options['help']);

        $view = $this->createFormBuilder()
                ->add('value', $type, $options)
                ->getForm()
                ->createView()
        ;

        return $this->render(
            'LibrinfoVarietiesBundle:Form:filter_widget.html.twig', 
            array(
                'form' => $view
            ), 
            null
        );
    }
    
    /**
     * Generate Entity Code action.
     *
     * @param int|string|null $id
     *
     * @return JsonResponse
     */
    public function generateEntityCodeAction($id = null)
    {
        $request = $this->getRequest();

        $id = $request->get($this->admin->getIdParameter());
        
        if ( $id ) 
        {
            $subject = $this->admin->getObject($id);
            if ( !$subject ) 
            {
                $error = sprintf('unable to find the object with id : %s', $id);
                
                return new JsonResponse(['error' => $error]);
            }
            
            try {
                $this->admin->checkAccess('edit', $subject); // TODO: is it necessary ? (we are not editing the entity)
            } catch (Exception $exc) {
                $error = $exc->getMessage();
                
                return new JsonResponse(['error' => $error]);
            }
        }
        else
            $subject = $this->admin->getNewInstance();

        $this->admin->setSubject($subject);

        $form = $this->admin->getForm();
        $form->setData($subject);
        $data = $request->request->get($form->getName());
   
        // prevent 'false' being interpreted as true
        if( $data['isStrain'] == 'false' )
            $data['isStrain'] = false;
        
        $form->submit($data);
        $entity = $form->getData();
        $field = $request->query->get('field', 'code');
        $registry = $this->get('blast_core.code_generators');
        $generator = $registry::getCodeGenerator(get_class($entity), $field);
        
        try {
            $code = $generator::generate($entity);
            
            return new JsonResponse(['code' => $code]);
        } catch (InvalidEntityCodeException $exc) {
            $error = $this->get('translator')->trans($exc->getMessage());
            
            return new JsonResponse(['error' => $error, 'generator' => get_class($generator)]);
        } catch (\Exception $exc) {
            $error = $exc->getMessage();
            
            return new JsonResponse(['error' => $error, 'generator' => get_class($generator)]);
        }

    }
    
    protected function duplicateFiles($object, $clone)
    {
        $manager = $this->getDoctrine()->getManager();
        $rc = new \ReflectionClass($object);
        $setter = 'set' . $rc->getShortName();
        
        foreach($object->getImages() as $image)
        {
            $new = clone $image;
            $new->$setter(null);
            $manager->persist($new);
            $clone->addImage($new);
        }
        
        $manager->flush();
    }
}
