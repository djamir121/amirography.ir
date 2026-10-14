<div id="list_1">    
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_blok12'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_catblok12'); ?>" title="">آرشیو »</a>
</div>
<?php query_posts('cat=' . get_option('qaleb_spec_catblok12') . '&showposts=' . get_option('qaleb_spec_countblok12')); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="boxe_10">
<div class="boxe_10-images"><a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(210,140) ); } ?></a></div>
<div class="boxe_10-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
<div class="boxe_10-excerpt"><a><?php the_excerpt(); ?></a></div>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
