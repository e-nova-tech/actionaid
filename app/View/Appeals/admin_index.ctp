<?php
/**
 * Appeals Index View (Admin)
 *
 * @package     app.View.Appeals.admin_index
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Appeal index'));
  $this->set('menu_for_layout', 'appeal:index');
?>
    <table>
      <tr>
        <th><?php echo $this->MyPaginator->sort('name',__('Name'));?></th>
        <th><?php echo $this->MyPaginator->sort('slug',__('Url Slug'));?></th>
        <th><?php echo $this->MyPaginator->sort('description',__('Description'));?></th>
        <th><?php echo $this->MyPaginator->sort('status',__('Status'));?></th>
        <th class="datetime"><?php echo $this->MyPaginator->sort('modified',__('Modified'));?></th>
        <th><?php echo __('Actions'); ?></th>
      </tr>
<?php foreach ($appeals as $appeal): ?>
      <tr>
        <td><?php echo $this->Html->link($appeal['Appeal']['name'], Common::baseUrl() . $appeal['Appeal']['slug']);?></td>
        <td><?php echo $appeal['Appeal']['slug'];?></td>
        <td><?php echo $appeal['Appeal']['description'];?></td>
        <td><?php echo $appeal['Appeal']['status'];?></td>
        <td><?php echo $appeal['Appeal']['modified']; ?></td>
        <td><?php echo $this->Html->link(__('View'), Common::baseUrl() . $appeal['Appeal']['slug']);?></td>
      </tr>
<?php endforeach; ?>
    </table>

