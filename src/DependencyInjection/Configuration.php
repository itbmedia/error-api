<?php

namespace ITBMedia\ErrorApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('itb_media_api_error');
        $rootNode->children()
            ->scalarNode('host')
            ->isRequired()
            ->defaultValue('http://status.itbmedia.se')
            ->end()
            ->scalarNode('endpoint')
            ->isRequired()
            ->defaultValue('/api/error')
            ->end()
            ->scalarNode('api_key')
            ->isRequired()
            ->defaultNull()
            ->end()
            ->end();
        return $treeBuilder;
    }
}
