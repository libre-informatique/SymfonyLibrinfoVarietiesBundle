<?php

namespace Librinfo\VarietiesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader;
use Librinfo\CoreBundle\DependencyInjection\LibrinfoCoreExtension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LibrinfoVarietiesExtension extends LibrinfoCoreExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('admin.yml');

        $container->setParameter('librinfo_varieties', $config);

        $container->setParameter('librinfo_varieties.code_generator.species',
            $container->getParameter('librinfo_varieties')['code_generator']['species']
        );

//        $generatorClass = $container->getParameter('librinfo_varieties')['code_generator']['species'];
//        $definition = new Definition($generatorClass, [$generatorClass, $container->getDefinition('doctrine.orm.default_entity_manager')]);
//        $definition->setFactory(['Librinfo\CoreBundle\CodeGenerator\CodeGeneratorFactory', 'create']);
//        $container->setDefinition('librinfo_varieties.code_generator.species', $definition);


        if ($container->getParameter('kernel.environment') == 'test')
        {
            $loader->load('datafixtures.yml');
        }

        $this->mergeParameter('librinfo', $container, __DIR__ . '/../Resources/config');
    }

}
