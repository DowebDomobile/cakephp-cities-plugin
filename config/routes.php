<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;
use Cake\Routing\RouteBuilder;

Router::plugin(
    'Dwdm/Cities',
    ['path' => '/cities'],
    function (RouteBuilder $routes) {
        $routes->prefix(
            'api',
            function (RouteBuilder $routes) {
                $routes->extensions(['json']);

                $routes->connect(
                    '/cities/:city/:search',
                    ['controller' => 'Cities', 'action' => 'search'],
                    [':city' => '.*', ':search' => '.*', 'pass' => ['city', 'search']]
                );
                $routes->connect(
                    '/cities/:city',
                    ['controller' => 'Cities', 'action' => 'search'],
                    [':city' => '.*',  'pass' => ['city']]
                );

                $routes->resources(
                    'Regions',
                    ['inflect' => 'dasherize',],
                    function (RouteBuilder $routes) {
                        $routes->resources('Cities', ['inflect' => 'dasherize',]);
                    }
                );
            }
        );
        $routes->fallbacks(DashedRoute::class);
    }
);