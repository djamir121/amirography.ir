<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/newspaper/lightbox.js"></script>
<div id="list_1">
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_blok14'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_catblok14'); ?>" title="">آرشیو »</a>
</div>
<div class="feat_right">
<?php query_posts('cat=' . get_option('qaleb_spec_catblok14') . '&showposts=2&offset=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="image slideUp">
<div class="cover-video-images">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(210,140) ); } ?></a>
</div>
<span class="title">
&nbsp;&nbsp;&nbsp;&nbsp;تاریخ انتشار : <?php the_time('d M Y'); ?>
</span>
</div>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
<?php query_posts('cat=' . get_option('qaleb_spec_catblok14') . '&showposts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="boxe_left">
<div id="feat-posts">
<div class="left">
<?php if ( has_post_thumbnail() ) {
$img = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), "full" );
$img_link = $img[0];
?>
<div class="thumb-wrap">
<div class="thumb">
<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'wt-feat-large' ); ?></a>
</div>
<div class="overlay">
<a class="img-link" rel="lightbox" href="<?php echo $img_link; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
<a class="post-link" href="<?php the_permalink() ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
</div>
</div>
<?php } ?>
<div class="post-text">
<h2>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
</div></div></div></div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div>