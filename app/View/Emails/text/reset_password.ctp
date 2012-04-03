<?php
  echo __('You forgot your password? It\'s ok it happen!'); echo "\n";
  echo __('Please follow the link bellow to reset your password'); echo "\n";
  echo Router::url('/admin/password/reset/'.$user['User']['token'],true); echo "\n";
  echo __('Thank you for supporting ActionAid');
  echo "\n--\n";
  echo __('This is an automated message, please do not reply.');
?>
