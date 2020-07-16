<?php get_header();?>

<!--Banner Start-->
<section class="prod-banner">
	<?php the_post_thumbnail('full'); ?>
	<h1 class="heading-1 wow fadeInDown  vertical-center d-f lex align-item s-center">
		<?php the_title();?>
	</h1>
</section>
<!--Banner End-->

<!--Main Content Start-->
<section class="main">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 wow  zoomIn slow">

			<?php while ( have_posts() ) : the_post(); ?>
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