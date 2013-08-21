<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Test\ControllerTest' => 'Test\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'test' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/test[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Test\Controller\Test',
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

