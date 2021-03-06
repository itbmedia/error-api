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
        $rootNode = $treeBuilder->root('error_api');
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
            ->defaultValue('123')
            ->end()
            ->scalarNode('server_name')
            ->isRequired()
            ->defaultValue('whatever')
            ->end()
            ->end();
        return $treeBuilder;
    }
}
