Name  : <?php echo $contact['Contact']['name']."\n"; ?>
Sender: <?php echo $contact['Contact']['email']."\n"; ?>
<?php if (isset($contact['Contact']['phone']) && !empty($contact['Contact']['phone'])) : ?>
Phone : <?php echo $contact['Contact']['phone']."\n"; ?>
<?php endif; ?>
<?php echo "\n".$contact['Contact']['message']; ?>

