<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

  Router::parseExtensions('json');

	Router::connect('/', array('controller' => 'gifts', 'action' => 'add'));
	Router::connect('/admin/home', array('controller' => 'pages', 'action' => 'display', 'Home','admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/help', array('controller' => 'pages', 'action' => 'display', 'Help','admin' => true, 'prefix'=>'admin'));
  // authentication
	Router::connect('/login', array('controller' => 'users', 'action' => 'login', 'admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login', 'admin' => true, 'prefix'=>'admin'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true, 'prefix' => 'admin'));
	Router::connect('/admin/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true, 'prefix'=>'admin'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
 // admin routing
	Router::connect('/admin/:controller', array('admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/:controller/:action', array('admin' => true, 'prefix'=>'admin'));  
	Router::connect('/admin/:controller/:action/*', array('admin' => true, 'prefix'=>'admin'));  
  // everything else is a donation form
	Router::connect('/json/cities/index/*', array('controller'=>'cities', 'action'=>'json_index')); 
  Router::connect('/*', array('controller' => 'gifts', 'action' => 'add'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
