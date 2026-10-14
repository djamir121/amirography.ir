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
<div class="single-content-date">
<div class="ico">&nbsp;&nbsp;

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_calendar');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_calendar');if ($sample_checkbox == "true") {?></div> 
<span class="ico"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('d M Y'); ?></span> 
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

<article id="post">

<div class="single-content-txt"><div class="single-content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
<?php setPostViews(get_the_ID()); ?>
<?php the_content(); ?>
<?php edit_post_link('ویرایش', '<p class="single-edit">', '</p>'); ?>
<?php endwhile; else : ?><?php endif; ?>
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

</article>
</div>
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
<div class="main-4">
<?php get_template_part('includes/slider-scroll'); ?>
</div>
</div>
</div>
<?php get_footer(); ?>