<?php
/**
 * View a Post (Admin)
 *
 * @package     app.View.Posts.admin_view
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h1><?php echo $post['Post']['title']?></h1>
<p><small>Created: <?php echo $post['Post']['created']?></small></p>
<p><?php echo $post['Post']['body']?></p>
