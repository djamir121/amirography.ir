<?php get_header(); ?>
<div class="index-photo">
<div class="main">
<div class="yglastpost-content">
<article id="post">
<div class="media-title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong>:: <?php the_archive_title(); ?></strong></h2>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part('loop-media'); ?>
<?php endwhile; endif; ?>
<div class="pagination"><?php qaleb_pagination(); ?></div>
</article>
</div>
</div></div>
<?php get_footer(); ?>