<?php
namespace Librinfo\VarietiesBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Librinfo\VarietiesBundle\Entity\SelectChoice;

class ChoiceController extends Controller
{
    /**
     * 
     * @param String $fieldName the name of the field to get the choices for
     * @return JsonResponse
     */
    public function getChoicesAction($fieldName)
    {
        $repo = $this->getDoctrine()->getRepository('LibrinfoVarietiesBundle:SelectChoice');
        $choices = $repo->findBy(array('label' => $fieldName));
        dump($choices);
        
        return new JsonResponse(array('choices' => $choices));
    }
    
    public function addChoiceAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        
        $choice = new SelectChoice;
        $choice->setLabel($request->get('name'));
        $choice->setValue($request->get('value'));
        
        $manager->persist($choice);
        $manager->flush();
        
        return new JsonResponse(array('name' => $choice->getLabel(), 'value' => $choice->getValue(), 'button' => '<i>fa-check-square</i>'));
    }
}