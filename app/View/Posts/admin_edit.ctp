<?php
/**
 * Edit a Post (Admin)
 *
 * @package     app.View.Posts.admin_edit
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post', array('action' => 'edit'));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
