<?php
/**
 * Add a Post (Admin)
 *
 * @package     app.View.Posts.admin_add
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('slug');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>
