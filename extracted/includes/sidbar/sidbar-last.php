<div class="box">
<div class="boxe_title-1">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_sidbar-6'); ?></strong></h2>
</div>
<?php query_posts('cat=' . get_option('qaleb_spec_catsidbar-6') . '&showposts=' . get_option('qaleb_spec_countsidbar-6')); ?>
<?php while (have_posts()) : the_post(); ?>   
<div class="box-txt">
 
<div class="detile-box-txt">
<?php $post_meta = get_post_meta($post->ID, 'custom_download',true); if (!empty($post_meta)) { ?>
<div class="detil">
<p><i class="fa fa-download" aria-hidden="true"></i></p>
</div>
<?php } ?>

<?php $post_meta = get_post_meta($post->ID, 'custom_volume-up',true); if (!empty($post_meta)) { ?><div class="detil">
<p><i class="fa fa-volume-up" aria-hidden="true"></i></p></div>
<?php } ?>

<?php $post_meta = get_post_meta($post->ID, 'custom_picture',true); if (!empty($post_meta)) { ?><div class="detil">
<p><i class="fa fa-picture-o" aria-hidden="true"></i></p></div>
<?php } ?>
<?php $post_meta = get_post_meta($post->ID, 'custom_film',true); if (!empty($post_meta)) { ?><div class="detil">
<p><i class="fa fa-film" aria-hidden="true"></i></p></div>
<?php } ?>
</div>

<div class="title-box-txt">
<a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
</div>
</div>              
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>