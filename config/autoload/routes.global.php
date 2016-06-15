<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
        ],
        'factories' => [
            App\Action\HelloAction::class => App\Action\HelloActionFactory::class
        ],
        'abstract_factories' => [
            \App\Action\AbstractActionFactory::class,
        ],
    ],
    'routes' => [
        [
            'name' => 'hello',
            'path' => '/hello/{name}',
            'middleware' => App\Action\HelloAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'hey',
            'path' => '/hey',
            'middleware' => App\Action\HeyAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'try',
            'path' => '/try',
            'middleware' => App\Action\TryAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'other_hey',
            'path' => '/other/hey',
            'middleware' => OtherApp\Action\HeyAction::class,
            'allowed_methods' => ['GET'],
        ]
    ],
];
