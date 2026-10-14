<div class="display-none"><?php $sample_checkbox = get_option('qaleb_sidbar-top1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_sidbar-top1');if ($sample_checkbox == "true") {?></div> 
<div class="banner_sidbar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('بنر تبلیغاتی سایدبار وسط بالای تب گالری') ) : ?><?php endif; ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_slider-small1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_slider-small1');if ($sample_checkbox == "true") {?></div> 
<div class="main-3-middle-detail">
<?php get_template_part('includes/sidbar/slider-small'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_sidbar-bottom1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_sidbar-bottom1');if ($sample_checkbox == "true") {?></div> 
<div class="banner_sidbar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('بنر تبلیغاتی سایدبار وسط پایین تب گالری') ) : ?><?php endif; ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_false-tabe');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_false-tabe');if ($sample_checkbox == "true") {?></div>
<div class="main-3-middle-detail">
<?php get_template_part('includes/sidbar/tabe'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>



<div class="display-none"><?php $sample_checkbox = get_option('qaleb_sidbar-note1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_sidbar-note1');if ($sample_checkbox == "true") {?></div>
<div class="main-3-middle-detail-3">
<?php get_template_part('includes/sidbar/sidbar-note'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="display-none"><?php $sample_checkbox = get_option('qaleb_sidbar-sidbar-last1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_sidbar-last1');if ($sample_checkbox == "true") {?></div>
<div class="main-3-middle-detail-3">
<?php get_template_part('includes/sidbar/sidbar-last'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div id="sidebar-right">
<div class="sidebar-right">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('ابزارک راست') ) : ?><?php endif; ?>
</div>
</div>

