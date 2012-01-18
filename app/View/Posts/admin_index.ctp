<?php
/**
 * Posts Index View (Admin)
 *
 * @package     app.View.Posts.admin_index
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
  <h1>Blog posts</h1>
  <p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
  <table>
    <tr>
      <th>Serial</th>
      <th>Title</th>
      <th>Actions</th>
      <th>Created</th>
    </tr>
<?php foreach ($posts as $post): ?>
    <tr>
      <td><?php echo $post['Post']['serial']; ?></td>
      <td>
        <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
      </td>
      <td>
        <?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id']));?>
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']));?>
        <?php echo $this->Form->postLink(
          'Delete',
          array('action' => 'delete', $post['Post']['id']),
          array('confirm' => 'Are you sure?'));
        ?>
      </td>
      <td>
        <?php echo $post['Post']['created']; ?>
      </td>
    </tr>
<?php endforeach; ?>
  </table>

