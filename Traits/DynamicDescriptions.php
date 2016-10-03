<?php

namespace Librinfo\VarietiesBundle\Traits;

use Symfony\Component\Form\FormEvents;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\AdminBundle\Form\FormMapper;

trait DynamicDescriptions
{

    /**
     * @param FormMapper $mapper
     */
    protected function configureDynamicDescriptions($formMapper)
    {
        // Manage dynamic descriptions according to configuration settings
        $config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties')['variety_descriptions'];
        $admin = $this;

        $formMapper->getFormBuilder()->addEventListener(FormEvents::PRE_SET_DATA, function ($event) use ($admin, $config) {
            $subject = $admin->getSubject($event->getData());

            foreach ( $config as $fieldset => $field )
            {
                $getter = 'get' . ucfirst($fieldset) . 'Descriptions';
                $setter = 'set' . ucfirst($fieldset) . 'Descriptions';
                $remover = 'remove' . ucfirst($fieldset) . 'Description';
                $adder = 'add' . ucfirst($fieldset) . 'Description';
                $constructor = '\Librinfo\VarietiesBundle\Entity\VarietyDescription' . ucfirst($fieldset);

                // Hide VarietyDescriptions that are not found in configuration
                foreach ( $subject->$getter() as $desc )
                {
                    $found = false;
                    foreach ( $config[$fieldset] as $field => $settings )
                        if ( $desc->getField() == $field )
                        {
                            $found = true;
                            break;
                        }
                    if ( !$found )
                        $subject->$remover($desc);
                }

                // Create missing VarietyDescriptions (described in configuration and not present in the Variety)
                foreach ( $config[$fieldset] as $field => $settings )
                {
                    $exists = $subject->$getter()->exists(function($key, $element) use ($field) {
                        return $element->getField() == $field;
                    });
                    if ( !$exists )
                    {
                        $desc = new $constructor();
                        $desc->setFieldset($fieldset);
                        $desc->setField($field);
                        $subject->$adder($desc);
                    }
                }

                $this->sortDescriptions($config, $fieldset, $subject, $getter, $setter);
            }
        }
        );
    }

    protected function configureShowDescriptions($showMapper)
    {
        $config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties')['variety_descriptions'];

        foreach ( $config as $fieldset => $fields )
        {
            if ( !$this->getSubject() )
                return;
            $subject = $this->getSubject();
            $getter = 'get' . ucfirst($fieldset) . 'Descriptions';
            $setter = 'set' . ucfirst($fieldset) . 'Descriptions';
            $tabs = $showMapper->getAdmin()->getShowTabs();
            $descs = $subject->$getter();

            $this->sortDescriptions($config, $fieldset, $subject, $getter, $setter);

            $showMapper->remove($fieldset . '_descriptions');
            unset($tabs['form_tab_' . $fieldset]);
            $showMapper->tab('form_tab_' . $fieldset)
                    ->with('form_group_' . $fieldset)
            ;

            foreach ( $descs as $key => $desc )
            {
                $field = $desc->getField();
                $name = $fieldset . '||' . $desc->getField();
                $type = 'text';
                $options = array();
                $options['label'] = sprintf('librinfo_description_%s_%s', $fieldset, $field);

                if ( isset($fields[$field]) && isset($fields[$field]['show']) )
                {
                    if ( isset($fields[$field]['show']['type']) )
                        $type = $fields[$field]['show']['type'];
                    if ( isset($fields[$field]['show']['template']) )
                        $options['template'] = $fields[$field]['show']['template'];
                }

                $showMapper->add($name, $type, $options);
            }
            //end group then tab
            $showMapper->end()->end();
        }
    }

    private function sortDescriptions($config, $fieldset, $subject, $getter, $setter)
    {
        // Sort VarietyDescriptions according to the configuration order
        $order = [];
        $i = 0;
        foreach ( $config[$fieldset] as $field => $settings )
            $order[$field] = $i++;
        $array = iterator_to_array($subject->$getter()->getIterator());
        usort($array, function ($a, $b) use ($order) {
            return ( $order[$a->getField()] < $order[$b->getField()] ) ? -1 : 1;
        });
        $subject->$setter(new ArrayCollection($array));
    }

}
