<div class="tabs-sid">
<a class="active-sid" rel="last">آخرین اخبار</a>
<a rel="random">اخبار تصادفی</a>
<a rel="best">محبوبترین ها</a>

<div class="clear"></div>
</div>
<div class="tabcontents">
<div id="last" class="tab-sid">
<ul>
<?php
$args = array( 'numberposts' =>10, 'orderby' => 'last' );
$rand_posts = get_posts( $args );
foreach( $rand_posts as $post ) : ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(50,50) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<br style="clear: both;">
</a></li>
<?php endforeach; ?>
</ul>
</div>
<div id="random" class="tab-sid">
<ul>
<?php
$args = array( 'numberposts' =>10, 'orderby' => 'rand' );
$rand_posts = get_posts( $args );
foreach( $rand_posts as $post ) : ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(50,150) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<br style="clear: both;">
</a></li>
<?php endforeach; ?>
</ul>
</div>
<div id="best" class="tab-sid">
<ul>
<?php query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&showposts=10');if (have_posts()) : while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(50,150) ); } ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
<br style="clear: both;">
</a></li>
<?php endwhile; endif; wp_reset_query();?>
</ul>
</div>
</div>