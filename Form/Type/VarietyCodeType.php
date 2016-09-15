<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Librinfo\CoreBundle\Form\AbstractType as BaseAbstractType;

class VarietyCodeType extends BaseAbstractType
{
    public function getParent() {
        return 'text';
    }

    public function configureOptions(OptionsResolver $resolver) {

        $resolver->setDefaults([
            'object_type' => 'species'
        ]);
    }
    
    public function getBlockPrefix()
    {
        return 'librinfo_varietycode';
    }
    
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['objectType'] = $options['object_type'];
    }
}
