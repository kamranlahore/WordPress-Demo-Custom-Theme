<!--Subscribe Start-->
<section class="subscribe">
  <div class="container">
    <div class="row">
	<div class="col-md-12 mx-auto text-center wow fadeInLeft  d-flex justify-content-center">
        <span class="subscribe-text">
        <?php echo translate_text('INSCRIVEZ-VOUS À NOTRE INFOLETTRE', 'SUBSCRIBE TO OUR NEWSLETTERE'); ?>
          </span>
        <?php echo do_shortcode('[contact-form-7 id="17" title="Newsletter"]'); ?>
        
        <!-- <input type="email" placeholder="VOTRE COURRIEL" />
        <input type="submit" value="SOUMETTRE" /> -->
      </div>
    </div>

  </div>
</section>
<!--Subscribe End-->


<!--Footer Start-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 copyright">
        <h5><i><?php echo translate_text('SUIVEZ-NOUS SUR', 'FOLLOW US ON'); ?> :</i></h5>
        <ul class="social justify-content-center">
            <li><a href="https://www.facebook.com/BioP%C3%A2tes-Nonna-Lina-112552890202274/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/biopatesnonnalina/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>

        <p><?php echo translate_text('BIOPÂTES NONNA LINA', 'BIOPATTES NONNA LINA'); ?> © 2019 <br>
        <span><?php echo translate_text('Tous droits résérvés', 'All rights reserved'); ?></span></p>

        <a href="https://nwmcanada.com/" class="nowm-logo" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo-nwm.png" /></a>
        
      </div>

      <div class="col-md-4 col-sm-4 footer-logo wow zoomIn slow">
        <a href="<?php echo translate_text(site_url(), site_url().'/about-us/');?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo-footer.png" /></a>
        
      </div>
      <div class="col-md-4 col-sm-4 footer-menu">
      <?php
          wp_nav_menu(
              array(
              'theme_location' => 'secondary',
              'menu_class' => 'secondary-menu',
              )
          );
      ?>
      </div>
    </div>
    
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

  </div>
</footer>
<!--Foote End-->
                                    
<script src="<?php bloginfo( 'stylesheet_directory' );?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' );?>/js/wow.min.js"></script>
<script src="<?php echo bloginfo( 'stylesheet_directory' );?>/js/custom.js"></script>
<script>
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null,    // optional scroll container selector, otherwise use window,
    resetAnimation: true,     // reset animation on end (default is true)
  }
);
wow.init();  
</script>



<?php wp_footer(); ?>

</body>
</html>
