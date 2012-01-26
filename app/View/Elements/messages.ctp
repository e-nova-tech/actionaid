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
?>
<?php if (!isset($flashMessages) || empty($flashMessages)): ?>
<div class="messages empty"></div>
<?php else : ?>
<div class="messages_wrapper">
  <ul class="messages ">
<?php foreach ($flashMessages as $message): ?>
    <li class="message <?php echo strtolower($message['type']); ?>">
      <span class="title"><?php echo $message['title']; ?>: </span>
      <span class="description"><?php echo $message['text']; ?></span>
    </li>
<?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>
