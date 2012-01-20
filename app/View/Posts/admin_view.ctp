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
  $this->set('title_for_layout', $post['Post']['title']);
?>
<p>Slug: <?php echo $post['Post']['slug']?></p>
<p>Created: <?php echo $post['Post']['created']?></p>
<p>Modified: <?php echo $post['Post']['modified']?></p>
<p><?php echo $post['Post']['body']?></p>
