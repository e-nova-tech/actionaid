<?php 
/**
 * Gifts Index View (Admin)
 *
 * @package     app.View.Gifts.admin_index
 * @copyright   Copyright 2012 ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Gifts index'));
  $this->set('menu_for_layout', 'gifts:admin_index');
  //pr($gifts);
?>
   <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort('status',__('Status'));?></th>
        <th><?php echo $this->MyPaginator->sort('amount',__('Amount'));?></th>
        <th><?php echo $this->MyPaginator->sort('Person.lastname',__('Name'));?></th>
        <th><?php echo $this->MyPaginator->sort('Apppeal.name',__('Appeal'));?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort('modified',__('Modified'));?></th>
        <th><?php echo __('Actions'); ?></th>
      </tr>
<?php foreach ($gifts as $gift): ?>
      <tr>
        <td><?php echo $gift['Gift']['status']; ?></td>
        <td><?php echo $gift['Gift']['amount']; ?> <?php echo $gift['Gift']['currency']; ?></td>
        <td><?php echo $gift['Person']['title'].'. '.$gift['Person']['firstname'].' '.$gift['Person']['lastname']; ?></td>
        <td><?php echo $gift['Appeal']['name']; ?></td>
        <td><?php echo $gift['Gift']['modified']; ?></td>
        <td><?php echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id'], 'admin'=>true, 'prefix'=>'admin'));?></td>
      </tr>
<?php endforeach; ?>
    </table>

