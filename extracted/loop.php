<div class="archive">
<div class="archive-images"><a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(160,120) ); } ?></a></div>
<div class="archive-contain">
<div class="archive-anavin"><a><?php $stitle = get_post_meta($post->ID, 'post_rutitr', true); echo $stitle; ?></a></div>
<div class="archive-title-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
<div class="archive-excerpt"><a><?php the_excerpt(); ?></a></div>
</div>
<div class="jdate-archive"><a><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php the_time('d M Y'); ?></a></div> 
</div>