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

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/landing.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'landing', 'home']);



    $routes->fallbacks('DashedRoute');
});

Router::prefix('student', function(RouteBuilder $routes){
    $routes->fallbacks('DashedRoute');
    $routes->connect('/dashboard', ['controller' => 'Pages', 'action' => 'dashboard']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/settings/global', ['controller' => 'Users', 'action' => 'settings']);
    $routes->connect('/settings/avatar', ['controller' => 'Users', 'action' => 'avatar']);
    $routes->connect('/settings/password', ['controller' => 'Users', 'action' => 'password']);

    $routes->connect('/profile/:username', [
        'controller' => 'Users',
        'action' => 'view',
    ], [
        'pass' => ['username']
    ]);
});

Router::prefix('company', function(RouteBuilder $routes){

    $routes->connect('/dashboard', ['controller' => 'Pages', 'action' => 'dashboard']);

    $routes->fallbacks('DashedRoute');
    
});

Router::prefix('school', function(RouteBuilder $routes){
    $routes->connect('/dashboard', ['controller' => 'Pages', 'action' => 'dashboard']);
    
    $routes->fallbacks('DashedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
