<?php
/*
  Template Name: Home Page
*/
?>
<?php get_header();?>

<?php 
// Home Page ID
  $home_fr = 34;
  $home_en = 100;
?>

<!--Banner Start-->
<section class="banner">
<?php the_post_thumbnail('full'); ?>
  <div class="banner-text">
    <h1 class="heading-1 wow fadeInDown"><?php echo get_field('banner_text', translate_text($home_fr, $home_en) );?></h1>
    <a href="<?php echo get_field('banner_u', translate_text($home_fr, $home_en) );?>" class="readmore wow fadeInUp"><?php echo translate_text('EN SAVOIR PLUS', 'READ MORE'); ?></a>
  </div>
</section>
<!--Banner End-->

<!--Main Content Start-->
<section class="main home">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 wow  zoomIn slow">
            <!-- <h2 class="heading-2 heading"><span>À PROPOS test</span></h2> -->
            <!-- <p>Votre horaire chargé ne sera plus jamais un obstacle à votre plaisir culinaire.</p> -->
          <?php

            $q_about = new WP_Query( 'pagename=home' );
  
            while ( $q_about->have_posts() ) : $q_about->the_post();

              the_content();
  
            endwhile;
            wp_reset_postdata();
          ?>          
          </div> <!-- About Us Section End -->

        </div>
    </div>
</section>
<!--Main Content End-->

<!--Products Start-->
<section class="products" id="products">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 wow fadeInRight">
            <h2 class="heading-2 heading"><span><?php echo translate_text('PRODUITS', 'PRODUCTS'); ?></span></h2>
          </div>
        </div>
    </div>

    <div class="container-fluid px-0">
      <?php

      $args = array(
        'post_type' => 'product',
        'order' => 'ASC',
        	'tax_query' => array(
          array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'NOT IN'
          ),  
        ),
              );
      $loop = new WP_Query( $args );
      $count = 1;
      if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post(); 
          //wc_get_template_part( 'content', 'product' );
      ?>
    	  <div class="row no-gutters mb-4">
        	<div class="col-md-12 product  wow <?php if($count % 2 == 0){echo "fadeInLeft";}else{echo "fadeInRight";} ?> slow">
            <?php //the_post_thumbnail('full');?>
            <img src="<?php the_field('product_image_for_home_page'); ?>" />

            <div class="col-md-5 prod-summary">
              <h3 class="heading-3"><?php the_title();?></h3>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink();?>" class="readmore"><?php echo translate_text('EN SAVOIR PLUS', 'READ MORE'); ?> </a>
            </div>
          </div>
        </div> <!--Row end-->
      <?php 
      $count++;
        endwhile;
      } else {
        echo __( 'No products found' );
      }
      wp_reset_postdata();
    ?>

   </div>

  </section>
<!--Products End-->

<!--Mission Start-->
<section class="mission">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow slideInUp slow">
        <!-- <h3>Mission:</h3>
        <p>Biopates Nonna Lina a à cœur le bien-être de ses clients ainsi que le bien-être/p> -->
        <?php the_field('mission_vision', translate_text($home_fr, $home_en));?>
      </div>
    </div>
  </div>

</section>
<!--Mission End-->

<section class="prod-bottom">
  <div class="container">
  <?php 
    $args_featured = array(
        'post_type' => 'product',
        'posts_per_page' => 1,
        'order' => 'ASC',
        	'tax_query' => array(
          array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN'
          ),  
        ),
    );     
      $the_query = new WP_Query( $args_featured );
      while ( $the_query->have_posts() ) : $the_query->the_post();
  ?>

    <div class="row">

      <div class="col-md-12">
          <h2 class="heading-2 heading wow jackInTheBox"><span><?php the_title(); ?></span></h2>
      </div>
    </div>

    <div class="row d-flex align-items-center">
      <div class="col-md-6 order-md-1 order-sm-2 order-2 wow fadeInLeft slow">
        <?php //the_field('short_description'); ?>
        <?php the_excerpt(); ?>

        <a href="<?php the_permalink();?>" class="readmore"><?php echo translate_text('EN SAVOIR PLUS', 'READ MORE'); ?></a>
      </div>

      <div class="col-md-6 order-md-2 order-sm-1 order-1 text-right wow zoomIn slow">
        <?php //the_post_thumbnail('full'); ?> 
        <img src="<?php the_field('product_image_for_home_page'); ?>" />
      </div>
    </div>
  <?php 
    endwhile;
    wp_reset_postdata();
  ?>
  </div>

</section>

<?php get_footer();?>