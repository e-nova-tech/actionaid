<h2><?php echo __('Something went wrong!'); ?></h2>
<br/><br/>
  <p>
    <strong><?php echo __('Something went wrong during the transaction and we were not able to get your donation'); ?></strong><br/>
    <?php echo __('Please note that your account was not debited'); ?>
  </p>
  <h3>
    What to do now ?
  </h3>

  <ul>
  	<?php if(isset($this->request->params['named']['gid'])): ?><li>You can <a href="transactions/request/<?php echo $this->request->params['named']['gid'] ?>">try again</a></li><?php endif; ?>
    <li>You can download the <a href="files/donation-form.pdf">offline donation form</a> and donate by cheque.</li>
    <li>Or you can contact us at the following number : <strong>+91-80-43650624</strong></li>
  </ul>
  
    <a href="http://actionaid.org/india/" style="padding:10px 0; display:block;">Go back to ActionAid India home page &#0155;</a>

  <div class="clearfix"></div>
