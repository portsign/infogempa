<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    // $routes->connect('/page/:page', ['controller' => 'Pages', 'action' => 'display'], 
    //     [
    //         'pass' => ['page'], 
    //         'page' => '[\d]+'
    //     ]
    // );

    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'detail']);
    $routes->connect('/search', ['controller' => 'Pages', 'action' => 'search']);
    $routes->connect(
        '/pages/:id/:slug',
        ['controller' => 'Pages', 'action' => 'detail'],
        [
            'pass' => ['id', 'slug'],
            'id' => '[0-9]+'
        ]
    );
    $routes->extensions(['json', 'xml', 'html']);
    $routes->fallbacks('DashedRoute');
});

Plugin::routes();
