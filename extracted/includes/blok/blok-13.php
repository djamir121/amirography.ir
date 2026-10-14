<div id="list_1">    
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_blok13'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_catblok13'); ?>" title="">آرشیو »</a>
</div>
<div class="boxe-galery_right">
<?php query_posts('cat=' . get_option('qaleb_spec_catblok13') . '&showposts=1'); ?>
<?php while (have_posts()) : the_post(); ?>


<div class="image slideUp_galery">
<div class="cover-galery-images">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(230,220) ); } ?></div>

<span class="title">
&nbsp;&nbsp;&nbsp;&nbsp;تاریخ انتشار : <?php the_time('d M Y'); ?><br>

</span>

</div>

<?php endwhile; ?><?php wp_reset_query(); ?>
</div>

<?php query_posts('cat=' . get_option('qaleb_spec_catblok13') . '&showposts=12&offset=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="boxe_galery">
<div class="boxe_galery-image">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="tooltip"><div class="boxe_galery-image"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(80,60) ); } ?></div></a>
</div>

</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div>
