<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'about' => array(
              'type' => 'literal',
              'options' => array(
                'route' => '/about-me',
                'defaults' => array(
                    'controller'  => Controller\IndexController::class,
                    'action'      => 'aboutme',
                ),
              ),
            ),
            'contact' => array(
              'type' =>'literal',
              'options' => array(
                'route' => '/contact',
                'defaults' => array(
                  'controller' => Controller\IndexController::class,
                  'action'     => 'contact'
                ),
              ),
            ),
            'team' => array(
              'type' =>'segment',
              'options' =>array(
                'route' => '/team[/:id]',
                'constraints' => array(
                  'id' =>'[0-9]+',
                ),
                'defaults' => array(
                  'controller' => Controller\IndexController::class,
                  'action'     => 'team',
                  'id'=> 0,
                ),
              ),
            ),
            'album'=>array(
              'type'=>'segment',
              'options'=>array(
                'route'=>'/album[/:id]',
                'constraints' => array(
                  'id' => '[0-9]+',
                ),
                'defaults' => array(
                  'controller' => Controller\IndexController::class,
                  'action' => 'album',
                  'id' => 1,
                ),
              ),
            ),
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
