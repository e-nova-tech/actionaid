<?php
/**
 * Help Page (Admin)
 *
 * @package     app.View.Pages.Help
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $title_for_layout = __('Do you need help with something?');
  $this->set('title_for_layout',$title_for_layout);
?>
<h2><?php echo __('Why are the payment getway and this application statuses different?'); ?></h2>
<p>This is due to the fact that there is a redirection hapening from our page, to the payment
   gateway, and also from the payment gateway to the bank. If the user closes his/her browser
   in between two steps, the status of the transaction can be lost.<p>
<h2><?php echo __('How can I know the real status then?'); ?></h2>
<p>Here is a small graphic to help you figure it out:</p>
<img src="../img/admin/help1.jpg" width="650" styl="text-align:center"/>
