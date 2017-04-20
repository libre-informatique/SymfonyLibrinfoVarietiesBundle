<?php

namespace Librinfo\VarietiesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('librinfo_varieties');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('code_generator')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('species')->defaultValue('Librinfo\VarietiesBundle\CodeGenerator\SpeciesCodeGenerator')->end()
                        ->scalarNode('variety')->defaultValue('Librinfo\VarietiesBundle\CodeGenerator\VarietyCodeGenerator')->end()
                    ->end()
                ->end()
                ->arrayNode('variety_descriptions')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('type')->defaultValue('textarea')->end()
                                ->arrayNode('options')
                                    ->children()
                                        ->booleanNode('required')->defaultFalse()->end()
                                        ->scalarNode('help')->defaultFalse()->end()
                                        ->scalarNode('label')->defaultNull()->end()
                                        ->scalarNode('choices_field')->end()
                                        ->scalarNode('template')->end()
                                        ->scalarNode('choices_class')->defaultValue('\Blast\UtilsBundle\Entity\SelectChoice')->end()
                                        ->booleanNode('multiple')->end()
                                        ->booleanNode('expanded')->end()
                                        ->arrayNode('choices')
                                          ->prototype('scalar')->end()
                                        ->end()
                                        ->arrayNode('blast_choices')
                                          ->prototype('scalar')->end()
                                        ->end()
                                        ->arrayNode('attr')
                                            ->prototype('scalar')->end()
                                        ->end()
                                    ->end()
                                    ->addDefaultsIfNotSet()
                                ->end()
                                ->arrayNode('show')
                                    ->children()
                                        ->scalarNode('type')->defaultValue('text')->end()
                                        ->scalarNode('template')->end()
                                    ->end()
                                    ->addDefaultsIfNotSet()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
