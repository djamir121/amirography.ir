<div class="tabs">
<a class="active" rel="tabe-1"><?php echo get_option('qaleb_spec_title_tab1'); ?></a>
<a rel="tabe-2"><?php echo get_option('qaleb_spec_title_tab2'); ?></a>
<a rel="tabe-3"><?php echo get_option('qaleb_spec_title_tab3'); ?></a>
<a rel="tabe-4"><?php echo get_option('qaleb_spec_title_tab4'); ?></a>
<div class="clear"></div>
</div>


<div class="tabcontents">


<div id="tabe-1" class="tab">
<ul>
<?php query_posts('cat=' . get_option('qaleb_spec_cattab1') . '&showposts=2'); ?>
<?php while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(150,150) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<div class="excerpt-tab"><p><?php the_excerpt(); ?></p></div>
<br style="clear: both;">
</a></li>
<?php endwhile; ?><?php wp_reset_query(); ?>	
</ul>
</div>


<div id="tabe-2" class="tab">
<ul>
<?php query_posts('cat=' . get_option('qaleb_spec_cattab2') . '&showposts=2'); ?>
<?php while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(150,150) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<div class="excerpt-tab"><p><?php the_excerpt(); ?></p></div>
<br style="clear: both;">
</a></li>
<?php endwhile; ?><?php wp_reset_query(); ?>	
</ul>
</div>



<div id="tabe-3" class="tab">
<ul>
<?php query_posts('cat=' . get_option('qaleb_spec_cattab3') . '&showposts=2'); ?>
<?php while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(150,150) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<div class="excerpt-tab"><p><?php the_excerpt(); ?></p></div>
<br style="clear: both;">
</a></li>
<?php endwhile; ?><?php wp_reset_query(); ?>	
</ul>
</div>

<div id="tabe-4" class="tab">
<ul>
<?php query_posts('cat=' . get_option('qaleb_spec_cattab4') . '&showposts=2'); ?>
<?php while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(150,150) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<div class="excerpt-tab"><p><?php the_excerpt(); ?></p></div>
<br style="clear: both;">
</a></li>
<?php endwhile; ?><?php wp_reset_query(); ?>	
</ul>
</div>

</div>