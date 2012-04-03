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
  // home page is the donation form
	Router::connect('/', array('controller' => 'gifts', 'action' => 'add'));
  // admin pages
	Router::connect('/admin/home', array('controller' => 'pages', 'action' => 'display', 'Home','admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/help', array('controller' => 'pages', 'action' => 'display', 'Help','admin' => true, 'prefix'=>'admin'));
  // authentication
	Router::connect('/login', array('controller' => 'users', 'action' => 'login', 'donor' => true, 'prefix'=>'donor'));
	Router::connect('/donor/login', array('controller' => 'users', 'action' => 'login', 'donor' => true, 'prefix'=>'donor'));
	Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login', 'admin' => true, 'prefix'=>'admin'));

	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true, 'prefix' => 'admin'));
	Router::connect('/admin/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/password/forgot', array('controller' => 'users', 'action' => 'forgot_password', 'admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/password/reset/*', array('controller' => 'users', 'action' => 'reset_password', 'admin' => true, 'prefix'=>'admin'));

	//Router::connect('/admin/users/logout', array('controller' => 'users', 'action' => 'logout', 'admin' => true, 'prefix'=>'admin'));
  // javascript stuffs
	Router::connect('/json/gifts/validation/*', array('controller'=>'gifts','action'=>'json_validation')); 
	Router::connect('/json/cities/index/*', array('controller'=>'cities', 'action'=>'json_index')); 
  // admin routing
	Router::connect('/admin/:controller', array('admin' => true, 'prefix'=>'admin'));
	Router::connect('/admin/:controller/:action', array('admin' => true, 'prefix'=>'admin'));  
	Router::connect('/admin/:controller/:action/*', array('admin' => true, 'prefix'=>'admin')); 
	// transactions stuffs
	Router::connect('/billdesktest/:action/*', array('controller' => 'billdeskTest'));
  Router::connect('/transactions/:action/*', array('controller' => 'transactions')); 
  // contact form & pages
	Router::connect('/contact', array('controller' => 'contacts', 'action' => 'index'));
	Router::connect('/faq', array('controller' => 'pages', 'action' => 'display', 'faq'));  
	Router::connect('/p/*', array('controller' => 'pages', 'action' => 'display'));  
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));  
  // everything else is a donation forms
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
