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
    <h1><?php echo __('Blog posts'); ?></h1>
    <p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
    <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort('serial',__('Serial'));?></th>
        <th><?php echo $this->MyPaginator->sort('title',__('Title'));?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort('modified',__('Modified'));?></th>
        <th><?php echo __('Actions'); ?></th>
      </tr>
<?php foreach ($posts as $post): ?>
      <tr>
        <td><?php echo $post['Post']['serial']; ?></td>
        <td>
          <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
        </td>
        <td>
          <?php echo $post['Post']['modified']; ?>
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
      </tr>
<?php endforeach; ?>
    </table>

