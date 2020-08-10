<?php

declare(strict_types=1);

namespace Answear\MeestBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    private const API_URL = 'http://meestb2b.com/administration/services/MeestPoland';

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('answear_meest');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('apiUrl')->defaultValue(self::API_URL)->end()
                ->scalarNode('apiKey')->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
