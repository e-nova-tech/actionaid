<?php $here = Router::url(null,true); ?>
  <div class="social media like">
    <h3><?php echo __('Tell your friends!'); ?></h3>
    <ul>
      <li class="twitter">
        <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="actionaidindia" data-text="<?php echo $title_for_layout; ?>" data-url="<?php echo $here; ?>">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </li>
      <li class="facebook">
        <div class="fb-like" data-href="<?php echo $here; ?>" data-send="false" data-layout="box_count" data-width="40" data-show-faces="true"></div>
        <div id="fb-root"></div>
        <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
      </li>
      <li class="google">
        <!-- Place this tag where you want the +1 button to render -->
        <g:plusone size="tall" annotation="bubble" href="<?php echo $here; ?>"></g:plusone>
        <script>(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();</script>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
