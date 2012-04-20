<?php 
/**
 * Gift View (Admin)
 *
 * @package     app.View.Gifts.admin_index
 * @copyright   Copyright 2012 ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Gifts View'));
  $this->set('menu_for_layout', 'gifts:admin_view');
  //pr($gift);
?>
<hr class="spacer" />
<div class="gifts_admin_view">
  <div class='grid_3 alpha'>
    <h2><?php echo __('Gift details'); ?></h2>
    <p><strong><?php echo __('Amount'); ?></strong>: <?php echo $gift['Gift']['amount']; ?></p>
    <p><strong><?php echo __('Currency'); ?></strong>: <?php echo $gift['Gift']['currency']; ?></p>
    <p><strong><?php echo __('Appeal'); ?></strong>: <?php echo $gift['Appeal']['title']; ?></p>
  </div>
  <div class='grid_3'>
    <h2><?php echo __('Person details'); ?></h2>
    <!-- <p><strong><?php echo __('Title'); ?></strong>: <?php echo $gift['Person']['title']; ?></p> -->
    <p><strong><?php echo __('Firstname'); ?></strong>: <?php echo $gift['Person']['name']; ?></p>
    <!-- <p><strong><?php echo __('Date of birth'); ?></strong>: <?php echo $gift['Person']['dob']; ?></p> -->
    <!-- <p><strong><?php echo __('Pan'); ?></strong>: <?php echo $gift['Person']['pan']; ?></p> -->
  </div>
  <div class='grid_3'>
    <h2><?php echo __('Address'); ?></h2>
    <p><strong><?php echo __('Address'); ?></strong>: <?php echo $gift['Person']['address1']; ?></p>
    <p><strong><?php echo __('Address'); ?></strong>: <?php echo $gift['Person']['address2']; ?></p>
    <p><strong><?php echo __('City'); ?></strong>: <?php echo $gift['Person']['city']; ?></p>
    <p><strong><?php echo __('State'); ?></strong>: <?php echo $gift['Person']['state']; ?></p>
    <p><strong><?php echo __('Country'); ?></strong>: <?php echo $gift['Person']['country']; ?></p>
  </div>
  <div class='grid_3 omega'>
    <h2><?php echo __('Contact Info'); ?></h2>
    <p><strong><?php echo __('Email'); ?></strong>: <?php echo $gift['Person']['email']; ?></p>
    <p><strong><?php echo __('Phone'); ?></strong>: <?php echo $gift['Person']['phone']; ?></p>
  </div>
  
  <div class='grid_12 alpha'>
    <h2><?php echo __('Transactions'); ?></h2>
    <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort('Transaction.type',__('Type'));?></th>
        <th><?php echo $this->MyPaginator->sort('Transaction.status',__('Status'));?></th>
        <th><?php echo $this->MyPaginator->sort('Gateway.name',__('Payment Gateway'));?></th>
        <th><?php echo $this->MyPaginator->sort('Transaction.created',__('Created'));?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort('Transaction.modified',__('Modified'));?></th>
        <th><?php echo __('Transaction Data'); ?></th>
        <th><?php echo __('Actions'); ?></th>
      </tr>
      <?php foreach ($transactions as $transaction): ?>
        <tr class="<?php echo $transaction['Transaction']['status']; ?>">
          <td class="type <?php echo $transaction['Transaction']['type']; ?>"><span><?php echo $transaction['Transaction']['type']; ?></span></td>
          <td class="status"><?php echo $transaction['Transaction']['status']; ?></td>
          <td><?php echo $transaction['Gateway']['name'] ?></td>
          <td><?php echo $transaction['Transaction']['created']; ?></td>
          <td><?php echo $transaction['Transaction']['modified']; ?></td>
          <td><?php echo $transaction['Transaction']['data']; ?></td>
          <td><?php //echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id'], 'admin'=>true, 'prefix'=>'admin'));?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
