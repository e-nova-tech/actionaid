<?php 
  $here = (isset($url)) ? Router::url($url,true) : Router::url(null,true); 
  $this->set('social_media_js',true);
?>
  <div class="social media like">
    <h3><?php echo __('Tell your friends!'); ?></h3>
    <ul>
      <li class="twitter">
        <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="actionaidindia" data-text="<?php echo $title_for_layout; ?>" data-url="<?php echo $here; ?>">Tweet</a>
      </li>
      <li class="facebook">
        <div class="fb-like" data-href="<?php echo $here; ?>" data-send="false" data-layout="box_count" data-width="40" data-show-faces="true"></div>
        <div id="fb-root"></div>
      </li>
      <li class="google">
        <!-- Place this tag where you want the +1 button to render -->
        <g:plusone size="tall" annotation="bubble" href="<?php echo $here; ?>"></g:plusone>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
