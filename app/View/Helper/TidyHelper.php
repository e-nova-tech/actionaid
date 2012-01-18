<?php
// app/View/Helper/TidyHelper.php
class TidyHelper extends AppHelper { 

  function __construct() {
    ob_start();
  }

  function __destruct() { 
    $output = ob_get_clean();
    $config = array(
      'indent'  => true,
      'wrap'    => 500,	
    );
    // Tidy
    $tidy = new tidy;
    $tidy->parseString($output, $config, 'utf8');
    $tidy->cleanRepair();
    echo $tidy;
  }

}
?>
