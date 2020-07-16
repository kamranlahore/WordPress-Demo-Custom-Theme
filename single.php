<?php get_header();?>

<?php $home_page_id = get_page_by_path( 'home' )->ID;
?>

<!--Main Content Start-->
<section class="main">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 wow  zoomIn slow">
            <!-- <p>Votre horaire chargé ne sera plus jamais un obstacle à votre plaisir culinaire.</p> -->
			<?php while ( have_posts() ) : the_post(); ?>
            <h2 class="heading-2 heading"><span><?php the_title();?></span></h2>
			<?php
				the_content();

				endwhile; 
			?>        
   
          </div> 

        </div>
    </div>
</section>
<!--Main Content End-->

<?php get_footer();?>