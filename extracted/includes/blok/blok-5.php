<div id="list_1">    
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_blok5'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_catblok5'); ?>" title="">آرشیو »</a>
</div>
<div class="boxe_right">
<?php query_posts('cat=' . get_option('qaleb_spec_catblok5') . '&showposts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="image slideUp">
<div class="cover-video-images">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(210,140) ); } ?></a>
</div>
<span class="title">
&nbsp;&nbsp;&nbsp;&nbsp;تاریخ انتشار : <?php the_time('d M Y'); ?>
</span>
</div>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<div class="excerpt">
<?php echo get_excerpt(220); ?>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
<?php query_posts('cat=' . get_option('qaleb_spec_catblok5') . '&showposts=5&offset=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="boxe_left">
<div class="boxe_left-image">
<a href="<?php the_permalink() ?>" rel="bookmark"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(50,50) ); } ?></a>
</div>
<div class="boxe_left-txt">
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
</div>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div>