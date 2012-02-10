<?php
/**
 * Errors/Notice/Warning Messages Display
 *
 * @package     app.View.Elements.messages
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 $class = isset($class) ? ' '.$class : '';
?>
<?php if (!isset($flashMessages) || empty($flashMessages)): ?>
<div class="messages empty"></div>
<?php else : ?>
<div class="messages_wrapper">
  <ul class="messages">
<?php foreach ($flashMessages as $message): ?>
    <li class="message <?php echo strtolower($message['type']); ?><?php echo $class;?>">
      <span class="title"><?php echo $message['title']; ?>: </span>
<?php if($message['type'] == 'debug'): ?>
      <span class="description"><?php pr($message['text']); ?></span>
<?php else: ?>
      <span class="description icon <?php echo strtolower($message['type']); ?>"><?php echo $message['text']; ?></span>
<?php endif; ?>
    </li>
<?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>
