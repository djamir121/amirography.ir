<div class="box">
<div class="boxe_title-1">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_sidbar-5'); ?></strong></h2>
</div>
<?php query_posts('cat=' . get_option('qaleb_spec_catsidbar-5') . '&showposts=' . get_option('qaleb_spec_countsidbar-5')); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="anavin"><a> نویسنده : <?php $post_meta = get_post_meta($post->ID, 'custom_description',true); if (!empty($post_meta)) { ?><?php echo $post_meta; ?><?php } ?></a></div>   
<div class="box1"> 
<?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(50,50) ); } ?>
<a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
</div>              
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>