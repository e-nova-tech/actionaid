<?php
/**
 * Menu & Navigation configuration
 *
 * @package     app.Config.menu
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Construction pattern is as follow:
 * App.navigation
 * - Navigation Section
 * --  Menu
 * ---   Menu Items
 *         name     name of the item on the menu (i18n)
 *         url      url to use if different than resources
 *         pattern  regexp used to check if the item is selected (based on current url)
 *         resource requested resource (for right management check)
 */
$config = array(
  'App.menu' => array(
    // LEVEL 0 (MAIN TABS)
    'main' => array(
      'public' => array(
         // Get lost or die trying!
      ),
      'admin' => array(
        'home' => array(
          'name'    => __('Home', true),
          'url'     => '/admin/home',
          'pattern' => '#/\/home.*/iU',
          'resource' => 'pages:display'
        ),
        'appeals' => array(
          'name'    => __('Appeals', true),
          'url'     => '/admin/appeals/index',
          'pattern' => '#/\/appeals.*/iU',
          'resource' => 'appeals:index',
        ),
        'posts' => array(
          'name'    => __('Posts', true),
          'url'     => '/admin/posts/index',
          'pattern' => '#/\/posts.*/iU',
          'resource' => 'posts:index',
        ),
        'gifts' => array(
          'name'    => __('Gifts', true),
          'url'     => '/admin/gifts/index',
          'pattern' => '#/\/gifts.*/iU',
          'resource' => 'gifts:index',
        ),
        'users' => array(
          'name'    => __('Users', true),
          'url'     => '/admin/users/index',
          'pattern' => '#/\/users.*/iU',
          'resource' => 'users:index', 
        ),
        'help' => array(
          'name'    => __('Help', true),
          'url'     => '/admin/help',
          'pattern' => '#/\/help.*/iU',
          'resource' => 'pages:display'
        ),
        'Logout' => array(
          'name'    => __('Logout', true),
          'url'     => '/admin/logout',
          'pattern' => '#/\/logout.*/iU',
          'resource' => 'users:logout'
        )
      )
    ),
    // LEVEL 1 - Sub Tabs
    'sub' => array(
      'authentication' => array(
        'login' => array(
          'name'     => __('Login', true),
          'url'      => '/login',
          'pattern'  => '#/^(.*\/login|\/users\/login).*$/iU',
          'resource' => 'users:login'
        ),
        'lostPassword' => array(
          'name'     => __('Lost password?', true),
          'url'      => '/password/forgot',
          'pattern'  => '#/^(.*\/password\/(forgot|reset)|\/users\/forgot_password).*$/iU',
          'resource' => 'users:forgot_password'
        )
      ),
      'gifts:index' => array(
        'all' => array(
          'name'     => __('all', true),
          'url'      => '/admin/gifts/index/all',
          'pattern'  => '#/^\/gifts((?!pending).)*$/iU',
          //'#/^\/projects\/(index(\/(all)?)?)?)?(\/(.)*)*$/iU',
          'resource' => 'gifts:index:all'
        ),
        'pending' => array(
          'name'     => __('Pending', true),
          'url'      => '/admin/gifts/index/pending',
          'pattern'  => '#/^\/gifts\/index\/pending(\/(.)*)*$/iU',
          'resource' => 'gifts:index:pending'
        ),
        'completed' => array(
          'name'     => __('Completed', true),
          'url'      => '/admin/gifts/index/completed',
          'pattern'  => '#/^\/gifts\/index\/completed(\/(.)*)*$/iU',
          'resource' => 'gifts:index:completed'
        )
      ),
      'user:edit' => array(
        'summary' => array(
          'name'     => __('User Edit', true),
          'url'      => '/admin/users/edit/summary',
          'pattern'  => '#/^\/users\/edit(\/(.)*)*$/iU',
          //'#/^\/projects\/(index(\/(all)?)?)?)?(\/(.)*)*$/iU',
          'resource' => 'users:edit:summary'
        )
      )
    ),
    
  )
);//_EOF
