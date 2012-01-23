<?php
/**
 * Validation Messages Json View
 *
 * @package     app.View.Validates.json_messages
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 $i = $j = 0;
?>
[{
<?php foreach ($validates as $fieldName => $rules) : $i++; $coma1=($i<sizeof($validates)); $j=0; ?>
  "<?php echo $fieldName; ?>" : {
<?php foreach ($rules as $ruleName => $rule) : $j++; $coma2=($j<sizeof($rules)); ?>
    <?php echo $ruleName; ?> : "<?php echo $rule['message'].'"'; if($coma2) echo ','; echo "\n"; ?>
<?php endforeach; ?>
  }<?php  if($coma1) echo ','; echo "\n"; ?>
<?php endforeach; ?>
}]
