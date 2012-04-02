<?php
/**
 * Users Index View (Admin)
 *
 * @package     app.View.Users.admin_index
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Users Index'));
  $this->set('menu_for_layout', 'users:admin_index');
?>
    <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort('username',__('Username'));?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort('modified',__('Modified'));?></th>
        <th><?php echo __('Actions'); ?></th>
      </tr>
<?php foreach ($users as $user): ?>
      <tr>
        <td>
          <?php echo $this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id']));?>
        </td>
        <td><?php echo $user['User']['modified']; ?></td>
        <td>
          <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']));?> | 
          <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $user['User']['id']),
            array('confirm' => 'Are you sure?'));
          ?> 
        </td>
      </tr>
<?php endforeach; ?>
    </table>
<?php echo $this->element('Paging'); ?>
