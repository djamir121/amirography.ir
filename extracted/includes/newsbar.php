<div class="newsbar-2">
<div class="latest2" id="lastnews2">
<ul style="position: relative; overflow: hidden; ">
<?php query_posts('cat=' . get_option('qaleb_spec_catnewsbar') . '&showposts=' . get_option('qaleb_spec_countnewsbar')); ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?><?php wp_reset_query(); ?>
</ul>
<a class="next2">بعدی</a> <a class="prev2">قبلی</a>
 </div>
</div>