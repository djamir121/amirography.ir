<section id="yglastpost" class="no-res-b">
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_top'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_cattop'); ?>" title="">آرشیو »</a>
</div>

<div class="clear"></div>
<div class="size">
<div class="clear"></div>
<div class="yglastpost-content">

<?php query_posts('cat=' . get_option('qaleb_spec_cattop') . '&showposts=' . get_option('qaleb_spec_counttop')); ?>
<?php while (have_posts()) : the_post(); ?>

<div class="yglastpost-block">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(220,170) ); } ?></a>
<div class="yglastpost-hover">

<?php if ( has_post_thumbnail() ) {
$img = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), "full" );
$img_link = $img[0];
?>
<div class="yglastpost-detile">
<a class="img-link" rel="lightbox" href="<?php echo $img_link; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
<a class="post-link" href="<?php the_permalink() ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
</div>
<?php } ?>

<div class="yglastpost-date">

<i class="fa fa-calendar" aria-hidden="true"></i>
<?php the_time('d M Y'); ?>
</div>

<div class="yglastpost-title">
<h4><?php the_title(); ?></h4>
</div>
</div>
</div>

<?php endwhile; ?><?php wp_reset_query(); ?>
<div class="clear"></div>
</div>
</div>
</section>