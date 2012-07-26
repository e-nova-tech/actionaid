  <!-- Footer -->
  <footer>
    <div class="grid_8">
      <?php echo __('ActionAid Association is registered in India under the Societies Registration Act of 1860
      with its registered office at New Delhi. Registration number S-6828 on the 5th of October 2006.')."\n"; ?>
    </div>
    <div class="grid_8 copyright">
      <?php echo Configure::read('App.copyright'); ?> - 
      <?php //echo $this->MyHtml->link(__('Privacy Policy'),array('privacy-policy'))."\n"; ?>
    </div>
  </footer>
<?php if (Configure::read('debug') > 1): ?>
  <div class="debug grid_12">
<?php echo $this->element('Debug'); ?>
  </div>
<?php endif; ?>
