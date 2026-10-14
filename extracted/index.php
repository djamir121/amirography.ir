<?php get_header(); ?>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_newsbar1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_newsbar1');if ($sample_checkbox == "true") {?></div> 
<?php get_template_part('includes/newsbar'); ?>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="index">
<div class="main">

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_slider-main1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_slider-main1');if ($sample_checkbox == "true") {?></div> 
<div class="main-1">
<?php get_template_part('includes/slider-main'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_tabe1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_tabe1');if ($sample_checkbox == "true") {?></div> 
<div class="main-2">
<?php get_template_part('includes/tabe'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_slider-ads1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_slider-ads1');if ($sample_checkbox == "true") {?></div> 
<div class="main-banner">
<div class="main-banner-cod"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('بنر تبلیغاتی زیر اسلایدر راست') ) : ?><?php endif; ?></div>
<div class="main-banner-cod"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('بنر تبلیغاتی زیر اسلایدر چپ') ) : ?><?php endif; ?></div>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_slider-scroll1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_slider-scroll1');if ($sample_checkbox == "true") {?></div> 
<?php get_template_part('includes/slider-scroll'); ?>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="twoSlider">
<div class="main-3">


<div class="main-3-right">
<div class="sliderPage-1">
<?php get_template_part('includes/main-3-right'); ?>
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

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_top1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_top1');if ($sample_checkbox == "true") {?></div> 
<div class="main-4">
<?php get_template_part('includes/top'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


</div></div>

<?php get_footer(); ?>