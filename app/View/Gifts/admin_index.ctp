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
  $this->set('title_for_layout', __('Sponsorship Details'));
  $this->set('menu_for_layout', 'gifts:admin_index');
?>
  <div class="gifts_admin_index">
    <div class="filters clearfix">
      <?php echo $this->Form->create('Gift',array('action'=>'search'));?>
      <div class="grid_6 alpha">
        <div class="dates-radio">
        <?php
          $options=array('today'=>'Today\'s summary','7days'=>'Last 7 days', '1month'=>'Last one month', 'custom'=>'Custom dates');
          $attributes=array('legend'=>false);
          echo $this->Form->radio('timeframe',$options,$attributes);
        ?>
        </div>
        <div class="dates-input">
          <?php
          echo $this->Form->input('datefrom', array('class'=>'hasDatePicker', 'label'=>'Date from'));
          echo $this->Form->input('dateto', array('class'=>'hasDatePicker', 'label'=>'Date to'));
          ?>
        </div>
      </div>
      <div class="grid_4 generalsearch">
        <div>
        <?php
        echo $this->Form->input('Serial', array('label'=>'ID', 'type'=>'text'));
        echo $this->Form->input('Name', array('label'=>'Name / Email'));
        echo $this->Form->input('Status', array('options'=>array('failure'=>'failure', 'pending'=>'pending', 'success'=>'success'), 'label'=>'Status', 'type'=>'select', 'empty'=>'-- choose a status --'));
        echo $this->Form->input('Amount');
        ?>
        </div>
      </div>
      <div class="grid_2 omega">
        <?php
        echo $this->Form->button('Reset', array('id'=>'searchResetButton'));
        echo $this->Form->submit('Search', array('value'=>'reset')); 
        ?>
      </div>
      <?php echo $this->Form->end(); ?>
    </div>
    
    <div class="separator">&nbsp;</div>
    
    <div class="statistics clearfix">
      <div class="grid_3 alpha">
        <div class="stat">
          <span class="big"><?php echo $statistics['success'] ?></span>
          <span class="small">succesful transactions</span>
        </div>
      </div>
      <div class="grid_3">
        <div class="stat">
          <span class="big"><?php echo $statistics['failed'] ?></span>
          <span class="small">failed transactions</span>
        </div>
      </div>
      <div class="grid_3">
        <div class="stat">
          <span class="big"><?php echo $statistics['pending'] ?></span>
          <span class="small">pending transactions</span>
        </div>
      </div>
      <div class="grid_3 omega">
        <div class="stat last">
          <span class="big"><?php echo $statistics['donations'] ?>/-</span>
          <span class="small">Sponsorhip amount generated from succesful transactions</span>
        </div>
      </div>
    </div>
    <h2>Details</h2>
    <a class="export-excel" href="<?php echo $this->request->url; ?>/format:xls">Export Excel</a>
    <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort('serial',__('ID'));?></th>
        <th><?php echo $this->MyPaginator->sort('status',__('Status'));?></th>
        <th><?php echo $this->MyPaginator->sort('amount',__('Amount'));?></th>
        <th><?php echo $this->MyPaginator->sort('Person.name',__('Name'));?></th>
        <th><?php echo $this->MyPaginator->sort('Appeal.title',__('Appeal'));?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort('modified',__('Modified'));?></th>
        <th><?php echo __('Actions'); ?></th>
      </tr>
<?php foreach ($gifts as $gift): ?>
      <tr class="<?php echo $gift['Gift']['status']; ?>">
        <td><?php echo $gift['Gift']['serial']; ?></td>
        <td class="status"><?php echo $gift['Gift']['status']; ?></td>
        <td><?php echo $gift['Gift']['amount']; ?> <?php echo $gift['Gift']['currency']; ?></td>
        <td><?php echo $gift['Person']['name']; ?></td>
        <td><?php echo $gift['Appeal']['title']; ?></td>
        <td><?php echo $gift['Gift']['modified']; ?></td>
        <td><?php echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id'], 'admin'=>true, 'prefix'=>'admin'));?></td>
      </tr>
<?php endforeach; ?>
    </table>
<?php echo $this->element('Paging'); ?>
  </div>
