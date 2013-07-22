<?php
/**
 * ZF2 Buch Kapitel 10
 * 
 * Das Buch "Zend Framework 2 - Das Praxisbuch"
 * von Ralf Eggert ist im Galileo-Computing Verlag erschienen. 
 * ISBN 978-3-8362-2610-3
 * 
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.galileocomputing.de/3460
 */

/**
 * namespace definition and usage
 */
namespace Pizza;

/**
 * Application module configuration
 * 
 * @package    Pizza
 */
return array(
    'router' => array(
        'routes' => array(
            'pizza' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/pizza',
                    'defaults' => array(
                        'controller' => 'pizza',
                        'action'     => 'index',
                    ),
                ),
            ),
            'pizza-name' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pizza/:name',
                    'constraints' => array(
                        'name' => '[a-zA-Z][a-zA-Z-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'pizza',
                        'action'     => 'name',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Doctrine')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Doctrine' => __NAMESPACE__ . '_driver',
                )
            )
        )
    )
);
