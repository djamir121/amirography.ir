
<div class="yglastpost-block">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(230,150) ); } ?></a>
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
<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php the_time('d M Y'); ?><br>
<i class="fa fa-eye-slash" aria-hidden="true"></i>&nbsp;<?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?>
</div>
<div class="yglastpost-title">
<h4><?php the_title(); ?></h4>
</div>
</div>
<div class="clear"></div>
</div>