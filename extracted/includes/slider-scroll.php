<section id="gallery">
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_slider-scroll'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_catscroll'); ?>" title="">آرشیو »</a>
</div>
<div class="content">
<div id="gallery-slider">
<div u="loading" class="loading"></div>
<div u="slides" class="slides">
<?php query_posts('cat=' . get_option('qaleb_spec_catslider-scroll') . '&showposts=' . get_option('qaleb_spec_countslider-scroll')); ?>
<?php while (have_posts()) : the_post(); ?>
     
<div>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(200,170) ); } ?></a>
<h5><?php the_title(); ?></h5>
</a>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>			
</div>
<span u="arrowleft" class="arrowleft"></span>
<span u="arrowright" class="arrowright"></span>
</div>
</div>
</section> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jssor-slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/caroufredsel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
