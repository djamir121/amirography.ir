<div id="list_1">    
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong><?php echo get_option('qaleb_spec_title_blog'); ?></strong></h2>
<a href="<?php echo home_url(); ?>/?cat=<?php echo get_option('qaleb_spec_catblog'); ?>" title="">آرشیو »</a>
</div>
<?php query_posts('cat=' . get_option('qaleb_spec_catblog') . '&showposts=' . get_option('qaleb_spec_countblog')); ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('loop'); ?>
<?php endwhile; ?><?php wp_reset_query(); ?>
</div>
