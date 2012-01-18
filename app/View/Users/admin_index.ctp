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
?>
    <h1>Users</h1>
    <p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>
    <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort(__('Username',true),'username');?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort(__('Modified',true),'modified');?></th>
        <th>Actions</th>
      </tr>
<?php foreach ($users as $user): ?>
      <tr>
        <td>
          <?php echo $this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id']));?>
        </td>
        <td><?php echo $user['User']['modified']; ?></td>
        <td>
          <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $user['User']['id']),
            array('confirm' => 'Are you sure?'));
          ?>
          <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']));?>
        </td>
      </tr>
<?php endforeach; ?>
    </table>

