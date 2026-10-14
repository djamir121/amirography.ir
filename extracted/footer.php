<?php wp_footer();?>
<div id="footer">
<div class="main-footer">
<div class="menu-bottom">
<?php wp_nav_menu( array( 'theme_location' => 'topnav', 'container' =>'nav', 'menu_class' =>'topnav' ) ); ?>
</div>
</div>
<div class="copyright">
<div class="logo-footer"></div>
<div class="logo-contain">
<p id="">تمامی حقوق مطالب برای <a target="_blank" href="<?php bloginfo('url'); ?>">"<?php bloginfo('name'); ?>"</a>محفوظ است و هرگونه کپی برداری بدون ذکر منبع ممنوع می باشد.</p>
<p id="">طبق ماده 12 فصل سوم قانون جرائم رایانه ای کپی برداری از قالب و محتوا پیگرد قانونی خواهد داشت.</p>
<!-------------- عدم حذف کپی رایت نشانه شخصیت شما به جهت احترام به حقوق طراح می باشد ------------------>
<p id="">طراحی و اجرا : <a href="http://www.wp-qaleb.ir"> کلکسیون طراحی</a></p>
<!-------------- عدم حذف کپی رایت نشانه شخصیت شما به جهت احترام به حقوق طراح می باشد ------------------>
</div>
</div>
</div>

<div class="top">
<div class="top-before">
<div class="top-nav"></div>
<div class="top-search">
<ul class="social-fo">	
<li><div class="home"><a href="<?php bloginfo('home') ?>"></a></div></li>									
<li><div class="rss"><a href="<?php bloginfo('rss2_url'); ?>"></a></div></li>
<div class="display-none"><?php $sample_checkbox = get_option('qaleb_twitter1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_twitter1');if ($sample_checkbox == "true") {?></div> 
<li><div class="twitter"><a href="<?php echo get_option('qaleb_twitter'); ?>"></a></div></li>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_facebook1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_facebook1');if ($sample_checkbox == "true") {?></div> 
<li><div class="facebook"><a href="<?php echo get_option('qaleb_facebook'); ?>"></a></div></li>	
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
		
<div class="display-none"><?php $sample_checkbox = get_option('qaleb_Instagram1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_Instagram1');if ($sample_checkbox == "true") {?></div> 		
<li><div class="Instagram"><a href="<?php echo get_option('qaleb_Instagram'); ?>"></a></div></li>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_aparat1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_aparat1');if ($sample_checkbox == "true") {?></div> 								
<li><div class="aparat"><a href="<?php echo get_option('qaleb_aparat'); ?>"></a></div></li>	
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_telegram1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_telegram1');if ($sample_checkbox == "true") {?></div> 								
<li><div class="telegram"><a href="<?php echo get_option('qaleb_telegram'); ?>"></a></div></li>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</ul>
</div>
<div class="top-socail">
</div>
<a href="#top"><div class="up" id="back-to-top"><i class="fa fa-chevron-up fa-2x uper"></i></div></a>
</div>

</div>                                                                                                                                                                                                                                                                                                                                                                                                                                        <a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="قالب وردپرس">قالب وردپرس</a><a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="دانلود رایگان قالب وردپرس">دانلود رایگان قالب وردپرس</a><a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="پوسته خبری ایرانی">پوسته خبری ایرانی</a><a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="قالب مجله خبری">قالب مجله خبری</a><a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="طراحی قالب وردپرس">طراحی سایت</a><a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="پوسته وردپرس">پوسته وردپرس</a><a style="display:none" rel="follow"  href="http://wp-qaleb.ir/" title="کلکسیون طراحی">کلکسیون طراحی</a> 
</body>
</html>