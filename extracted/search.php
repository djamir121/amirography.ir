<?php get_header(); ?>
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
<article id="post">
<div class="boxe_title">
<h2 style="font:bold 8pt Tahoma, Geneva, sans-serif;"><strong>نتایج جستجو برای : <?php the_search_query(''); ?></strong></h2>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part('loop'); ?>
<?php endwhile; endif; ?>
<div style="text-align:right; font:14px bbc-nassim-bold; padding:30px 0;">
جستجوی شما برای عبارت <span style="color:#D71920;">" <?php the_search_query(''); ?> "</span> نتیجه ای در بر نداشت <br/>
لطفا از عبارت کلی تری برای جستجو استفاده نمایید !<br/>
</div>


<div class="pagination">
<?php qaleb_pagination(); ?>
</div>
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
</div>

</div>
</div>
<?php get_footer(); ?>