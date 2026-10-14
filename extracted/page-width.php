<?php
/*
Template Name:برگه عریض
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="display-none"><?php $sample_checkbox = get_option('qaleb_breadcrumb');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_breadcrumb');if ($sample_checkbox == "true") {?></div> 
<?php get_template_part('includes/breadcrumbs'); ?>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
<div class="index">
<div class="main">
<div class="twoSlider">
<div class="main-6">

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
<br>
<div class="single-content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
<article id="post">
<div class="single-content-txt">
<?php setPostViews(get_the_ID()); ?>
<?php the_content(); ?>
<?php edit_post_link('ویرایش', '<p class="single-edit">', '</p>'); ?>
<?php endwhile; else : ?><?php endif; ?>
</div>

</article>
</div>

</div>
</div>
<?php get_footer(); ?>