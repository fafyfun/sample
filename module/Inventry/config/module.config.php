<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Inventry\Controller\Inventry' => 'Inventry\Controller\InventryController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'inventry' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/inventry[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Inventry\Controller\Inventry',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager'=>array(
        'template_path_stack'=> array(__DIR__.'/../view')
    )

);