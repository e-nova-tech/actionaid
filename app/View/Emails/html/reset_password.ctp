<p><?php echo __('You forgot your password? It\'s ok it happen!'); ?></p>
<p><?php echo __('Please follow the link bellow to reset your password'); ?></p>
<?php $link = Router::url('/admin/password/reset/'.$user['User']['token'],true); ?>
<p><a href=<?php echo $link; ?>><?php echo $link; ?></a></p>
<p><?php echo __('Thank you for supporting ActionAid'); ?></p>
<p>--<p>
<p><?php echo __('This is an automated message, please do not reply.'); ?></p>
