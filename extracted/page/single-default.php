<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_breadcrumb');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_breadcrumb');if ($sample_checkbox == "true") {?></div> 
<?php get_template_part('includes/breadcrumbs'); ?>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="index">
<div class="main">
<div class="twoSlider">
<div class="main-3">
<div class="main-3-right">
<div class="single">
<div class="sliderPage-1">

<div class="single-date">
<div class="single-content-date">
<div class="ico">

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_calendar');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_calendar');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('d M Y'); ?></span> 
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_comments');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_comments');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number('0', '1', '%'); ?> </span> 
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_user');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_user');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?><?php the_author_posts(); ?> مطلب</span> 
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_hacker-news');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_hacker-news');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-hacker-news" aria-hidden="true"></i> کد خبر <?php the_ID();?></span> 
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_eye');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_eye');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-eye" aria-hidden="true"></i> <?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?></span>&nbsp;&nbsp;
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_envelope');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_envelope');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo direct_email(' ایمیل ') ?></span> &nbsp;
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_print');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_print');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><?php if(function_exists('wp_print')) { print_link(); } ?></span> 
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</div>
</div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_resize');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_resize');if ($sample_checkbox == "true") {?></div> 
<div class="single-content-resize">
<p><span class="ico">سایز متن </span>&nbsp;<a id="increase-font" href="#"><i class="fa fa-plus-square" aria-hidden="true"></i></a> / <a id="decrease-font" href="#"><i class="fa fa-minus-square" aria-hidden="true"></i></a></p>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</div>

<div class="single-content">
<div class="single-content-images"><a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(250,200) ); } ?></a></div>
<div class="single-content-txte">
<div class="single-anavin"><a><?php $post_meta = get_post_meta($post->ID, 'custom_description',true); if (!empty($post_meta)) { ?><?php echo $post_meta; ?><?php } ?></a></div>
<div class="single-content-anavin"><a><?php $stitle = get_post_meta($post->ID, 'post_rutitr', true); echo $stitle; ?></a></div>
<div class="single-content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_category');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_category');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category(', ' ); ?></span> 


<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</div>
</div>
<article id="post">
<?php $post_meta = get_post_meta($post->ID, 'custom_lid',true); if (!empty($post_meta)) { ?>
<div class="single-content-lid"><a><?php the_excerpt(); ?></a></div>
<?php } wp_reset_postdata(); ?>
<div class="single-content-txt">
<div class="resize">
<?php setPostViews(get_the_ID()); ?>
<?php the_content(); ?>
<?php edit_post_link('ویرایش', '<p class="single-edit">', '</p>'); ?>
<?php endwhile; else : ?><?php endif; ?>
</div>
</div>



<div class="display-none"><?php $sample_checkbox = get_option('qaleb_shares');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_shares');if ($sample_checkbox == "true") {?></div> 
<div id="post-shares">
<?php
$qaleb_post_title = get_the_title();
$qaleb_post_link = get_the_permalink();
$twitterURL = 'https://twitter.com/intent/tweet?text='.$qaleb_post_title.'&amp;url='.$qaleb_post_link.'&amp;via=Crunchify';
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$qaleb_post_link;
$googleURL = 'https://plus.google.com/share?url='.$qaleb_post_link;
?>

<a href="<?php echo $facebookURL ?>" title="اشتراک گذاری در فیسبوک" class="item sprite fb">اشتراک گذاری در فیسبوک</a>
<a href="<?php echo $twitterURL ?>" title="اشتراک گذاری در توییتر" class="item sprite tw">اشتراک گذاری در توییتر</a>
<a href="<?php echo $googleURL ?>" title="اشتراک گذاری در گوگل پلاس" class="item sprite gp">اشتراک گذاری در گوگل پلاس</a>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<center>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_banner1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_banner1');if ($sample_checkbox == "true") {?></div> 
<div class="banner">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('بنر تبلیغاتی برگه نوشته') ) : ?><?php endif; ?>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</center>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_tags');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_tags');if ($sample_checkbox == "true") {?></div> 
<div id="post-tags">
<span>برچسب ها:</span>
<?php the_tags('',''); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


</article>
</div>
</div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_post-nav');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_post-nav');if ($sample_checkbox == "true") {?></div> 
<div class="single">
<div class="post-nav">
<?php previous_post_link( '<div class="prev"><div class="wrap">%link</div></div>', '%title' ); ?>
<?php next_post_link( '<div class="next"><div class="wrap">%link</div></div>', '%title' ); ?>
</div>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_related');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_related');if ($sample_checkbox == "true") {?></div> 
<div class="single">
<div class="related">
<div class="main-one-news-1-title-1"><a><i class="fa fa-exchange" aria-hidden="true"></i>اخبار مرتبط </a></div>
<?php
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>
<div class="texts">
<div class="icon"></div>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
<?php } wp_reset_postdata(); ?>
</div>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="single">
<a><i class="fa fa-envelope-o" aria-hidden="true"></i> دیدگاهها </a>
<?php if (comments_open()): ?><div class="single_comments"><?php comments_template(); ?></div><?php endif; ?>
</div>

</div>
<div class="sliderPage-2">
<div class="main-3-middle">
<?php get_template_part('includes/main-3-middle'); ?>
</div>
</div>
<div class="sliderPage-3">
<div class="main-3-left">
<?php get_template_part('includes/main-3-left'); ?>
</div>
</div>

</div>

</div>
</div>
<?php get_footer(); ?>