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
 * - Navigation Section, (ex: main, sub, actions, tables)
 * --  Menu (ex: user:index)
 * ---   Menu Items (ex: user:edit)
 *         name      name of the item on the menu (i18n)
 *         url       url to use 
 *         resource  requested resource (for right management check)
 *        [pattern   regexp used to check if the item is selected]
 *        [class     additional classes for the link]
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
          'name'    => __('Home'),
          'url'     => '/admin/home',
          'pattern' => '#/\/home.*/iU',
          'resource' => 'pages:admin_display'
        ),
        'appeals' => array(
          'name'    => __('Appeals'),
          'url'     => '/admin/appeals/index',
          'pattern' => '#/\/appeals.*/iU',
          'resource' => 'appeals:admin_index',
        ),
        'posts' => array(
          'name'    => __('Posts'),
          'url'     => '/admin/posts/index',
          'pattern' => '#/\/posts.*/iU',
          'resource' => 'posts:admin_index',
        ),
        'gifts' => array(
          'name'    => __('Gifts'),
          'url'     => '/admin/gifts/index',
          'pattern' => '#/\/gifts.*/iU',
          'resource' => 'gifts:admin_index',
        ),
        'users' => array(
          'name'    => __('Users'),
          'url'     => '/admin/users/index',
          'pattern' => '#/\/users.*/iU',
          'resource' => 'users:admin_index', 
        ),
        'help' => array(
          'name'    => __('Help'),
          'url'     => '/admin/help',
          'pattern' => '#/\/help.*/iU',
          'resource' => 'pages:admin_display'
        ),
        'Logout' => array(
          'name'    => __('Logout'),
          'url'     => '/admin/logout',
          'pattern' => '#/\/logout.*/iU',
          'resource' => 'users:admin_logout'
        )
      )
    ),
    // LEVEL 1 - Content Filters
    'sub' => array(
      'authentication' => array(
        'login' => array(
          'name'     => __('Login'),
          'url'      => '/login',
          'pattern'  => '#/^(.*\/login|\/users\/login).*$/iU',
          'resource' => 'users:login'
        ),
        'lostPassword' => array(
          'name'     => __('Lost password?'),
          'url'      => '/password/forgot',
          'pattern'  => '#/^(.*\/password\/(forgot|reset)|\/users\/forgot_password).*$/iU',
          'resource' => 'users:forgot_password'
        )
      ),
      'gifts:index' => array(
        'all' => array(
          'name'     => __('all'),
          'url'      => '/admin/gifts/index/all',
          'pattern'  => '#/^\/gifts((?!pending).)*$/iU',
          //'#/^\/projects\/(index(\/(all)?)?)?)?(\/(.)*)*$/iU',
          'resource' => 'gifts:admin_index'
        ),
        'pending' => array(
          'name'     => __('Pending'),
          'url'      => '/admin/gifts/index/pending',
          'pattern'  => '#/^\/gifts\/index\/pending(\/(.)*)*$/iU',
          'resource' => 'gifts:admin_index'
        ),
        'completed' => array(
          'name'     => __('Completed'),
          'url'      => '/admin/gifts/index/completed',
          'pattern'  => '#/^\/gifts\/index\/completed(\/(.)*)*$/iU',
          'resource' => 'gifts:admin_index'
        )
      )
    ),
    // LEVEL 2 - Actions in menu bar
    'actions' => array(
      'users:admin_index' => array(
        'add' => array(
          'name'     => __('Add a user'),
          'url'      => '/admin/users/add',
          'resource' => 'users:admin_add',
          'class'    => 'users add'
        )
      ),
      'appeals:admin_index' => array(
        'add' => array(
          'name'     => __('Add an appeal'),
          'url'      => '/admin/appeals/add',
          'resource' => 'apppeal:admin_add',
          'class'    => 'appeal add'
        )
      ),
      'posts:admin_index' => array(
        'add' => array(
          'name'     => __('Add a post'),
          'url'      => '/admin/posts/add',
          'resource' => 'posts:admin_add',
          'class'    => 'posts add'
        )
      ),
      'gifts:admin_view' => array(
        'index' => array(
          'name'     => __('Gifts index'),
          'url'      => '/admin/gifts/index',
          'resource' => 'gifts:admin_index',
          'class'    => 'gifts back index'
        )
      )
    ),
    // LEVEL 3 - Actions in tables
    'tables' => array(
      'users:index' => array(
        'view' => array(
          'name'     => __('View'),
          'url'      => '/admin/users/view',
          'resource' => 'users:admin_view'
        ),
        'edit' => array(
          'name'     => __('Edit'),
          'url'      => '/admin/users/edit/%s',
          'resource' => 'users:admin_edit'
        ),
        'edit' => array(
          'name'     => __('Delete'),
          'url'      => '/admin/users/delete/%s',
          'resource' => 'users:admin_delete'
        )
      ),
      'appeals:index' => array(
        'view' => array(
          'name'     => __('View'),
          'url'      => '/%s',
          'resource' => 'gift:add'
        ),
        'edit' => array(
          'name'     => __('Edit'),
          'url'      => '/admin/appeals/edit/%s',
          'resource' => 'appeals:admin_edit'
        )
      )
    )
  )
);//_EOF
