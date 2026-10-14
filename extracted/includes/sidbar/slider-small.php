<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jssor-slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>



<div class="tabs-gallery">
<a class="active-gallery" rel="tabe-gallery-1"><i class="fa fa-camera" aria-hidden="true"></i> <?php echo get_option('qaleb_spec_title_gallery1'); ?></a>
<a rel="tabe-gallery-2"><i class="fa fa-video-camera" aria-hidden="true"></i> <?php echo get_option('qaleb_spec_title_gallery2'); ?></a>
<a rel="tabe-gallery-3"><i class="fa fa-volume-up" aria-hidden="true"></i> <?php echo get_option('qaleb_spec_title_gallery3'); ?></a>
<a rel="tabe-gallery-4"><i class="fa fa-frown-o" aria-hidden="true"></i> <?php echo get_option('qaleb_spec_title_gallery4'); ?></a>
<div class="clear"></div>
</div>

<div class="tabcontents">

<div id="tabe-gallery-1" class="tab-gallery">
<ul>
<p>
<div id="daily_photo" class="widget daily-pic">
<div id="daily-photo" class="content">
<div data-u="loading" class="loading"></div>
<div data-u="slides" class="slides">
<?php query_posts('cat=' . get_option('qaleb_spec_catgallery1') . '&showposts=' . get_option('qaleb_spec_countgallery1')); ?>
<?php while (have_posts()) : the_post(); ?>
<div>
<a rel="tooltip" title="<h><?php the_title(); ?></h>" href="<?php the_permalink() ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(280,180) ); } ?></a>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
<div data-u="navigator" class="navigator">
<div data-u="prototype"></div>
</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
jssor_dailypic_starter('daily-photo');
});
</script>
</p>	
</ul>
</div>


<div id="tabe-gallery-2" class="tab-gallery">
<ul>
<p>
<div id="daily_video" class="widget daily-pic">
<div id="daily-video" class="content">
<div data-u="loading" class="loading"></div>
<div data-u="slides" class="slides">
<?php query_posts('cat=' . get_option('qaleb_spec_catgallery2') . '&showposts=' . get_option('qaleb_spec_countgallery2')); ?>
<?php while (have_posts()) : the_post(); ?>
<div>
<a rel="tooltip" title="<h><?php the_title(); ?></h>" href="<?php the_permalink() ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(280,180) ); } ?></a>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
<div data-u="navigator" class="navigator">
<div data-u="prototype"></div>
</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
jssor_dailypic_starter('daily-video');
});
</script>
</p>	
</ul>
</div>



<div id="tabe-gallery-3" class="tab-gallery">
<ul>
<p>
<div id="daily_suond" class="widget daily-pic">
<div id="daily-suond" class="content">
<div data-u="loading" class="loading"></div>
<div data-u="slides" class="slides">
<?php query_posts('cat=' . get_option('qaleb_spec_catgallery3') . '&showposts=' . get_option('qaleb_spec_countgallery3')); ?>
<?php while (have_posts()) : the_post(); ?>
<div>
<a rel="tooltip" title="<h><?php the_title(); ?></h>" href="<?php the_permalink() ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(280,180) ); } ?></a>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
<div data-u="navigator" class="navigator">
<div data-u="prototype"></div>
</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
jssor_dailypic_starter('daily-suond');
});
</script>
</p>
</ul>
</div>

<div id="tabe-gallery-4" class="tab-gallery">
<ul>
<p>
<div id="daily_grapic" class="widget daily-pic">
<div id="daily-grapic" class="content">
<div data-u="loading" class="loading"></div>
<div data-u="slides" class="slides">
<?php query_posts('cat=' . get_option('qaleb_spec_catgallery4') . '&showposts=' . get_option('qaleb_spec_countgallery4')); ?>
<?php while (have_posts()) : the_post(); ?>
<div>
<a rel="tooltip" title="<h><?php the_title(); ?></h>" href="<?php the_permalink() ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(280,180) ); } ?></a>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
<div data-u="navigator" class="navigator">
<div data-u="prototype"></div>
</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
jssor_dailypic_starter('daily-grapic');
});
</script>
</p>	
</ul>
</div>

</div>