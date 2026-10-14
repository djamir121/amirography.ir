<?php

add_action('init','of_options');
define('Options_Name', '<span style="color:#7DB046;font: 13px IRANSansWeb;">تنظیمات پوسته</span> ');

if (!function_exists('of_options')) {
function of_options(){

	$themedir = get_template_directory_uri();
	$prefix = 'qaleb_';

//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');

$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
	$tt_pages[$tt_page->ID] = $tt_page->post_title; 
}
$select_a_page = array("select_a_page" => "برگه ای را انتخاب کنید:");
$wp_pages = $select_a_page + $tt_pages;


$tt_posts = array();
$tt_posts_obj = get_posts('numberposts=30');    
foreach ($tt_posts_obj as $tt_post) {
	$tt_posts[$tt_post->ID] = $tt_post->post_title; 
}
$select_a_post = array("select_a_post" => "نوشته ای را انتخاب کنید:");
$wp_posts = $select_a_post + $tt_posts;

$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
	$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;
}
$select_a_cat = array('selec_a_category'=>'دسته ای را انتخاب کنید:');
$wp_categories = $select_a_cat + $tt_categories;


//Folder Paths for "type" => "images"
$sampleurl =  get_template_directory_uri() . '/admin/images/sample-layouts/';
$options = array(); //


//================================================ setting

$options[] = array( 
	"name" => 'هدر',
	"type" => "heading",
	"slug" => 'ie_setting'
);
$options[] = array( 
	"name" => 'اخطار',
	"desc" => "",
	"id" => $prefix.'info',
	"std" => "
	<p class='ie_info'>
<img src='".$themedir."/admin/images/error.png'>
<br>
<span>
در طراحی و کدنویسی این قالب زحمات زیادی کشیده شده است پس آن را قانونی خریداری کنید . <br>
در صورتی که از بسته نصبی استفاده نموده اید ایمیل شناسه کاربری و بخش تنظیمات همگانی را تغییر دهید . <br>
در غیر اینصورت احتمال هک سایت شما وجود خواهد داشت. . <br>
</span>
</p>

	",
	"type" => "info"
);
$options[] = array( 
	"name" => 'لوگو',
	"desc" => "حداکثر ارتفاع این تصویر بایستی 100 پیکسل باشد و عرض آن از 230 پیکسل تجاوز نکند",
	"id" => $prefix.'logo',
	"std" => $themedir.'/images/logo1.png',
	"type" => "image_upload"
);

$options[] = array( 
	"name" => 'فاوآیکون',
	"desc" => 'از این قسمت می توانید آیکون سایت خود را آپلود نمایید ، این آیکون می تواند با فرمت png یا gif و یا فرمت رایج آیکون یعنی ico باشد .',
	"id" => $prefix.'favicon',
	"std" => $themedir.'/images/favicon.png',
	"type" => "image_upload"
);

$options[] = array( 
	"name" => 'کلمات کلیدی',
	"desc" => "برای جداسازی از ( , ) در حالت صفحه کلید انگلیسی استفاده کنید",
	"id" => $prefix.'keywords',
	"std" => "خبر، سیاسی، اجتماعی و ... ",
	"type" => "textarea"
);

$options[] = array(
	"name" => 'منوی بالای هدر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."top_menu1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'شبکه های اجتماعی هدر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."top_social1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'منوی جستجوی هدر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."top_search1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'ساعت و تاریخ بالا',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."top_date1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	 "name" => 'اخبار ویژه',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."newsbar1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	        "desc" => 'یک دسته برای نمایش در نوار اخبار ویژه انتخاب کنید',
	        "id" => $prefix."spec_catnewsbar",
	        "std" => "1",
	        "type" => "select",
	        "options" => $wp_categories
);
$options[] = array( 
	        "desc" => 'تعداد',
	        "id" => $prefix."spec_countnewsbar",
	        "std" => "4",
	        "type" => "text"
);
$options[] = array(
	"name" => 'نقشه سایت',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."breadcrumb",
	"std" => "false",
	"type" => "checkbox"
);
//====================================================

$options[] = array( 
	"name" => 'رنگ قالب',
	"type" => "heading",
	"slug" => 'ie_color'
);

$options[] = array(
            "name" =>'رنگ بدنه',
			"desc" =>'انتخاب رنگ',
			"id" => $prefix.'mwp_color_picker_body',
			"std" => "",
			"type" => "color"
			);
$options[] = array(
            "name" =>'رنگ دوم بدنه',
			"desc" =>'این رنگ نسبت به رنگ پیشین غلیظ تر است',
			"id" => $prefix.'mwp_color_picker_body-2',
			"std" => "",
			"type" => "color"
			);
$options[] = array(
            "name" =>'رنگ مگامنو',
			"desc" =>'بهتر است از رنگ مشکی استفاده کنید.',
			"id" => $prefix.'mwp_color_picker_mega',
			"std" => "",
			"type" => "color"
			);
			
			
$options[] = array(
            "name" =>'رنگ متن درحالتی که موس روی آن قرار می گیرد',
			"desc" =>'انتخاب رنگ',
			"id" => $prefix.'mwp_color_picker_txt',
			"std" => "",
			"type" => "color"
			);
$options[] = array(
            "name" =>'رنگ عناوین اصلی در باکس ها',
			"desc" =>'انتخاب رنگ',
			"id" => $prefix.'mwp_color_picker_txte_1',
			"std" => "",
			"type" => "color"
			);
			
$options[] = array(
            "name" =>'رنگ متن زمانی که توسط کاربر علامتگذاری می شود',
			"desc" =>'انتخاب رنگ',
			"id" => $prefix.'mwp_color_picker_select',
			"std" => "",
			"type" => "color"
			);			

$options[] = array( 
        	"name" => 'پس زمینه',
	        "desc" => "برای سایت خود پس زمینه دلخواه بارگذاری کنید.",
	        "id" => $prefix.'background',
	        "std" => $themedir.'/images/pattern-1.jpg',
	        "type" => "image_upload"
);	
//====================================================

$options[] = array( 
	"name" => 'اسلایدر',
	"type" => "heading",
	"slug" => 'ie_slider'
);

$options[] = array(
	"name" => 'اسلایدر اصلی',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."slider-main1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'یک دسته برای این اسلایدر انتخاب کنید',
	"id" => $prefix."spec_catslider-main",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countslider-main",
	"std" => "5",
	"type" => "text"
);
$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "2 عدد بنر زیر اسلایدر اصلی قرار دارد. در صورتی که در این بخش فعال نمایید جهت درج بنر خود به قسمت ابزارک ها سایدبار مربوطه مراجعه کنید.",
	"type" => "info");
$options[] = array(
	"name" => 'تبلیغات زیر اسلایدر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."slider-ads1",
	"std" => "false",
	"type" => "checkbox"
);	


$options[] = array(
	"name" => 'اسلایدر اسکرول',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."slider-scroll1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'عنوان ',
	"id" => $prefix."spec_title_slider-scroll",
	"std" => "مطالب تصویری",
	"type" => "text"
);
$options[] = array( 
	"desc" => 'یک دسته برای این اسلایدر انتخاب کنید',
	"id" => $prefix."spec_catslider-scroll",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countslider-scroll",
	"std" => "8",
	"type" => "text"
);
$options[] = array(
	"name" => 'اسلایدر ثابت انتهای سایت',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."top1",
	"std" => "false",
	"type" => "checkbox"
);	
$options[] = array( 
	"desc" => 'عنوان ',
	"id" => $prefix."spec_title_top",
	"std" => "بالاتر از خبر",
	"type" => "text"
);
$options[] = array( 
	"desc" => 'یک دسته برای این اسلایدر انتخاب کنید',
	"id" => $prefix."spec_cattop",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_counttop",
	"std" => "5",
	"type" => "text"
);

//====================================================

$options[] = array( 
	"name" => 'تب مطالب',
	"type" => "heading",
	"slug" => 'ie_tab'
);
$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این تب در بالای سایت و کنار اسلایدر قرار دارد",
	"type" => "info");
	
$options[] = array(
	"name" => 'تب مطالب',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."tabe1",
	"std" => "false",
	"type" => "checkbox"
);	
$options[] = array( 
	"name" => 'تب اول',
	"desc" => 'نام تب ',
	"id" => $prefix."spec_title_tab1",
	"std" => "برگزیده",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_cattab1",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array( 
	"name" => 'تب دوم',
	"desc" => 'نام تب ',
	"id" => $prefix."spec_title_tab2",
	"std" => "نقد در رسانه",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_cattab2",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array( 
	"name" => 'تب سوم',
	"desc" => 'نام تب ',
	"id" => $prefix."spec_title_tab3",
	"std" => "رسانه های مجازی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_cattab3",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array( 
	"name" => 'تب چهارم',
	"desc" => 'نام تب ',
	"id" => $prefix."spec_title_tab4",
	"std" => "مطبوعات ایران",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_cattab4",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

//====================================================

$options[] = array( 
	"name" => 'بلوک بندی',
	"type" => "heading",
	"slug" => 'ie_blok'
);


$options[] = array(
	"name" => 'بلوک وبلاگی',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blog11",
	"std" => "false",
	"type" => "checkbox"
);

$options[] = array(
	"id" => $shortname."_sample_callout2",
	"std" => "بلوک وبلاگی مطالب را به صورت عمودی از آخرین اخبار تا اولین آن به نمایش می گذارد.
	<p class='ie_info'><img src='".$themedir."/admin/images/bi.png'></p>",
	"type" => "info");
	
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blog",
	"std" => "آخرین اخبار سایت",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblog",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countblog",
	"std" => "13",
	"type" => "text"
);
$options[] = array( "name" => __('بلوک های موضوعی','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این بلوک متشکل از خبر اول به صورت تصویر بزرگ و سایر خبرها با تصویر بند انگشتی و در ردیف مجزا می باشد.
	<p class='ie_info'><img src='".$themedir."/admin/images/li.png'></p>",
	"type" => "info");

	
$options[] = array(
	"name" => 'بلوک اول',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-1",
	"std" => "false",
	"type" => "checkbox"
);		
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok1",
	"std" => "اقتصادی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok1",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array(
	"name" => 'بلوک دوم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-2",
	"std" => "false",
	"type" => "checkbox"
);	
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok2",
	"std" => "سیاسی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok2",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array(
	"name" => 'بلوک سوم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-3",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok3",
	"std" => "اجتماعی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok3",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array(
	"name" => 'بلوک چهارم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-4",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok4",
	"std" => "فرهنگی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok4",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array(
	"name" => 'بلوک پنجم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-5",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok5",
	"std" => "مذهبی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok5",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array(
	"name" => 'بلوک ششم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-6",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok6",
	"std" => "ورزشی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok6",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array( "name" => __('بلوک های موضوعی','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این بلوک متشکل از خبر اول به صورت تصویر بزرگ و سایر خبرها با تصویر بند انگشتی و در ردیف مجزا می باشد.
	<p class='ie_info'><img src='".$themedir."/admin/images/1c.png'></p>",
	"type" => "info");
	
$options[] = array(
	"name" => 'بلوک هفتم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-7",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok7",
	"std" => "گزارش",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok7",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array(
	"name" => 'بلوک هشتم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-8",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok8",
	"std" => "گزارش",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok8",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array(
	"name" => 'بلوک نهم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-9",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok9",
	"std" => "گزارش",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok9",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array(
	"name" => 'بلوک دهم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-10",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok10",
	"std" => "گزارش",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok10",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array(
	"name" => 'بلوک یازدهم',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-11",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok11",
	"std" => "گزارش",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok11",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( "name" => __('روی میز سردبیر','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این بلوک به صورت 3 ردیف می باشد. این بلوک قابلیت افزایش تعداد مطالب جهت نمایش را دارد و می توان به صورت بلوک اصلی هم از ان استفاده کرد.
	<p class='ie_info'><img src='".$themedir."/admin/images/2c.png'></p>",
	"type" => "info");
	
$options[] = array(
	"name" => 'روی میز سردبیر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-12",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok12",
	"std" => "روی میز سردبیر",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok12",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countblok12",
	"std" => "3",
	"type" => "text"
);
	
$options[] = array( "name" => __('به روایت تصویر','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این بلوک متشکل از یک تصویر بزرگ و سایر تصاویر کوچک به صورت تولتیپ می باشد.
	<p class='ie_info'><img src='".$themedir."/admin/images/pic1.png'></p>",
	"type" => "info");	
	
	
$options[] = array(
	"name" => 'به روایت تصویر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-13",
	"std" => "false",
	"type" => "checkbox"
);	
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok13",
	"std" => "به روایت تصویر",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok13",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

$options[] = array( "name" => __('کیوسک مطبوعاتی','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این بلوک متشکل از 1 تصویر بزرگ با قابلیت زوم و 2 تصویر در سمت راست است.
	<p class='ie_info'><img src='".$themedir."/admin/images/n1.png'></p>",
	"type" => "info");	
	
$options[] = array(
	"name" => 'کیوسک مطبوعاتی',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."blok-false-14",
	"std" => "false",
	"type" => "checkbox"
);		
$options[] = array( 
	"desc" => 'نام بلوک',
	"id" => $prefix."spec_title_blok14",
	"std" => "کیوسک مطبوعاتی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catblok14",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);

//====================================================

$options[] = array( 
	"name" => 'سایدبار اصلی',
	"type" => "heading",
	"slug" => 'ie_sidbar'
);

$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "2 بنر تبلیغاتی در سایدبار وسط قرار دارد. در این قسمت نمایش آن را فعال نمایید و جهت درج بنر خود از طریق ابزارک مربوطه اقدام نمایید.",
	"type" => "info");
	
$options[] = array(
	"name" => 'بنر تبلیغاتی بالای تب گالری ',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."sidbar-top1",
	"std" => "false",
	"type" => "checkbox"
);

$options[] = array(
	"name" => 'بنر تبلیغاتی پایین تب گالری ',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."sidbar-bottom1",
	"std" => "false",
	"type" => "checkbox"
);

$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این سایدبار در وسط قالب قرار دارد.<br>در این قسمت می توانید دسته تب و گالری و  سایدبار یادداشت و آخرین اخبار را تنظیم کنید",
	"type" => "info");

$options[] = array(
	"name" => 'گالری ها ',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."slider-small1",
	"std" => "false",
	"type" => "checkbox"
);
	
$options[] = array( 
	"name" => 'گالری اول',
	"desc" => 'نام گالری ',
	"id" => $prefix."spec_title_gallery1",
	"std" => "عکس",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catgallery1",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countgallery1",
	"std" => "4",
	"type" => "text"
);
$options[] = array( 
	"name" => 'گالری دوم',
	"desc" => 'نام گالری ',
	"id" => $prefix."spec_title_gallery2",
	"std" => "فیلم",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catgallery2",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countgallery2",
	"std" => "4",
	"type" => "text"
);

$options[] = array( 
	"name" => 'گالری سوم',
	"desc" => 'نام گالری ',
	"id" => $prefix."spec_title_gallery3",
	"std" => "صوت",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catgallery3",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countgallery3",
	"std" => "4",
	"type" => "text"
);

$options[] = array( 
	"name" => 'گالری چهارم',
	"desc" => 'نام گالری ',
	"id" => $prefix."spec_title_gallery4",
	"std" => "گرافیک",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته',
	"id" => $prefix."spec_catgallery4",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countgallery4",
	"std" => "4",
	"type" => "text"
);	
$options[] = array(
	"name" => 'تب آخرین اخبار / تصادفی / محبوب ',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."false-tabe",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'سایدبار یادداشت ها',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."sidbar-note1",
	"std" => "false",
	"type" => "checkbox"
);	
$options[] = array( 
	"desc" => 'در این سایدبار یادداشت ها با نام نویسنده قرار می گیرد',
	"id" => $prefix."spec_title_sidbar-5",
	"std" => "سیاسی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته دلخواه خود را انتخاب کنید',
	"id" => $prefix."spec_catsidbar-5",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countsidbar-5",
	"std" => "5",
	"type" => "text"
);
$options[] = array(
	"name" => 'سایدبار آخرین مطالب با آیکن مختص',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."sidbar-last1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
	"desc" => 'در این سایدبار آخرین اخبار به همراه آیکن های خود نمایش داده می شوند.',
	"id" => $prefix."spec_title_sidbar-6",
	"std" => "اقتصادی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته دلخواه خود را انتخاب کنید',
	"id" => $prefix."spec_catsidbar-6",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countsidbar-6",
	"std" => "5",
	"type" => "text"
);

//================================================
$options[] = array( 
	"name" => 'برگه نوشته',
	"type" => "heading",
	"slug" => 'ie_post'
);
$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "در این قسمت امکانات پیش فرض برگه نوشته فعال یا غیر فعال می گردد..",
	"type" => "info");
	
$options[] = array(
	"name" => 'تاریخ ارسال مطلب',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."calendar",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'تعداد دیدگاهها',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."comments",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'نویسنده',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."user",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'کد خبر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."hacker-news",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'تعداد بازدید',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."eye",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'ارسال خبر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."envelope",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'پرینت از خبر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."print",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'دکمه تغییر سایز',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."resize",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'دسته بندی',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."category",
	"std" => "false",
	"type" => "checkbox"
);

$options[] = array(
	"name" => 'اشتراک گذاری',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."shares",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => " در این بخش بنر را فعال و از طریق ابزارک ها اقدام به درج کد خود کنید.",
	"type" => "info");
	
$options[] = array(
	"name" => 'بنر تبلیغاتی',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."banner1",
	"std" => "false",
	"type" => "checkbox"
);

$options[] = array(
	"name" => 'برچسب ها',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."tags",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'مطلب قبل و بعد',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."post-nav",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
	"name" => 'مطالب مشابه',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."related",
	"std" => "false",
	"type" => "checkbox"
);

//====================================================

$options[] = array( 
	"name" => 'برگه رسانه',
	"type" => "heading",
	"slug" => 'ie_media'
);
$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "در قسمت برگه نوشته موضوعاتی چون عکس / فیلم / ویژه خبری اسلایدهایی وجود دارد که شما باید در این قسمت دسته ای جهت نمایش در انها انتخاب و تنظیم کنید.",
	"type" => "info");

$options[] = array( 
	"name" => 'رسانه فیلم',
	"desc" => 'نام آخرین فیلم ها',
	"id" => $prefix."spec_title_media-video",
	"std" => "ویدئو های پیشنهادی",
	"type" => "text"
);
$options[] = array( 
	"name" => 'بخش فیلم',
	"desc" => 'لطفا دسته فیلم را جهت نمایش در رسانه انتخاب نمایید.',
	"id" => $prefix."spec_catmedia-video",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countmedia-video",
	"std" => "10",
	"type" => "text"
);
$options[] = array( 
	"name" => 'رسانه گالری صوتی',
	"desc" => 'آخرین فایل های صوتی',
	"id" => $prefix."spec_title_media-volume",
	"std" => "شنیدنی",
	"type" => "text"
);
$options[] = array( 
	"name" => 'بخش فایل صوتی',
	"desc" => 'لطفا یک دسته برای نمایش در بخش صوتی انتخاب نمایید',
	"id" => $prefix."spec_catmedia-volume",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countmedia-volume",
	"std" => "10",
	"type" => "text"
);

$options[] = array( 
	"name" => 'رسانه گالری عکس',
	"desc" => 'نام آخرین عکس ها',
	"id" => $prefix."spec_title_media-photo",
	"std" => "گالری های پیشنهادی",
	"type" => "text"
);
$options[] = array( 
	"name" => 'بخش تصاویر',
	"desc" => 'لطفا یک دسته برای نمایش تصاویر انتخاب کنید',
	"id" => $prefix."spec_catmedia-photo",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countmedia-photo",
	"std" => "10",
	"type" => "text"
);

$options[] = array( 
	"name" => 'رسانه گرافیک',
	"desc" => 'آخرین کارهای گرافیکی',
	"id" => $prefix."spec_title_media-frown",
	"std" => "گرافیک",
	"type" => "text"
);
$options[] = array( 
	"name" => 'بخش گرافیک',
	"desc" => 'لطفا یک دسته برای نمایش در بخش صوتی انتخاب نمایید',
	"id" => $prefix."spec_catmedia-frown",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countmedia-frown",
	"std" => "10",
	"type" => "text"
);
$options[] = array( 
	"name" => 'روزنامه',
	"desc" => 'روزنامه های صبح کشور',
	"id" => $prefix."spec_title_media-newspaper",
	"std" => "روزنامه های صبح کشور",
	"type" => "text"
);
$options[] = array( 
	"name" => 'بخش روزنامه و مجله',
	"desc" => 'لطفا یک دسته برای نمایش در بخش روزنامه و مجله انتخاب نمایید',
	"id" => $prefix."spec_catmedia-newspaper",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countmedia-newspaper",
	"std" => "10",
	"type" => "text"
);
$options[] = array( 
	"name" => 'آموزش فعال سازی نمایش دسته مورد نظر در رسانه فیلم / عکس / صوت / روزنامه و گرافیک',
	"desc" => "",
	"id" => $prefix.'info',
	"std" => "
	<p class='ie_info'>
    <br>
   <span>
    برای اینکه بتوانید موضوعاتی از قبیل فیلم / عکس / روزنامه و ویژه خبری را در برگه مختص به خود نمایش دهید نیاز مند به دست آوردن آی دی آن دسته یا موضوع هستید.<br>
    بنابر این ابتدا به بخش تنظیمات / پیوندهای یکتا رفته و پیوند خود را روی ساده یا عددی قرار می دهید <br>
	<img src='".$themedir."/admin/images/id.png'><br>
	 سپس به بخش اول سایت رفته و روی موضوع دلخواه کلیک کنید. در کادر آدرس مرورگر در انتها یک عدد دیده می شود که آی دی دسته مورد نظر شماست <br>
	 <img src='".$themedir."/admin/images/id2.png'><br>
	 در اینجا عدد 17 آی دی دسته ماست. حال به بخش نمایش / ویرایشگرمی رویم و در ستون چپ جهت ویرایش روی فایل زیر کلیک می کنیم. (category.php) <br>
	 آی دی دسته مورد نظر خود را بر حسب موضوع در قسمت مخصوص به خود قرار میدهیم. حال اگر مجددا روی دسته یا موضوعی که آی دی ان را به دست اورده ایم خواهیم دید که در این برگه نمایش داده می شود. <br>
	 <img src='".$themedir."/admin/images/id3.png'><br>
	جهت نمایش در برگه نوشته هاهم به همین شکل عمل می کنیم با این تفاوت که آی دی را در این فایل قرار می دهید. (single.php) <br>

    </span>
    </p>

	",
	"type" => "info"
);

//================================================
$options[] = array( 
	"name" => 'ویژه خبری',
	"type" => "heading",
	"slug" => 'ie_spical'
);
$options[] = array( "name" => __('راهنما','framework_localize'),
	"desc" => "",
	"id" => $shortname."_sample_callout2",
	"std" => "این بنر تمام عرض زیر هدر قرار دارد. سعی کنید یک بنر متناسب با موضوع مورد نظر قرار بدید.",
	"type" => "info");
$options[] = array( 
	"name" => 'بنر',
	"desc" => "بنر تمام عرض با ارتفاع مناسب بارگذاری کنید.",
	"id" => $prefix.'banner',
	"std" => $themedir.'/images/banner.png',
	"type" => "image_upload"
);


$options[] = array( 
	"name" => 'عناوین پیشنهادی',
	"desc" => '',
	"id" => $prefix."spec_title_spical1",
	"std" => "عناوین پیشنهادی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته دلخواه خود را انتخاب کنید',
	"id" => $prefix."spec_catspical1",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countspical1",
	"std" => "5",
	"type" => "text"
);

$options[] = array( 
	"name" => 'سایدبار ',
	"desc" => '',
	"id" => $prefix."spec_title_spical2",
	"std" => "عناوین پیشنهادی",
	"type" => "text"
);

$options[] = array( 
	"desc" => 'دسته دلخواه خود را انتخاب کنید',
	"id" => $prefix."spec_catspical2",
	"std" => "1",
	"type" => "select",
	"options" => $wp_categories
);
$options[] = array( 
	"desc" => 'تعداد',
	"id" => $prefix."spec_countspical2",
	"std" => "5",
	"type" => "text"
);

$options[] = array(
            "name" =>'رنگ بدنه',
			"desc" =>'تغییر رنگ بدنه متناسب با مناسبت های مختلف',
			"id" => $prefix.'mwp_color_picker_index-spical',
			"std" => "",
			"type" => "color"
			);
$options[] = array(
            "name" =>'رنگ حاشیه ها',
			"desc" =>'تغییر رنگ بدنه متناسب با مناسبت های مختلف',
			"id" => $prefix.'mwp_color_picker_index-border',
			"std" => "",
			"type" => "color"
			);			
$options[] = array(
            "name" =>'رنگ متن',
			"desc" =>'تغییر رنگ متن برای بدنه تیره یا روشن',
			"id" => $prefix.'mwp_color_picker_index-txt',
			"std" => "",
			"type" => "color"
			);		

//================================================
$options[] = array( 
	"name" => 'شبکه های اجتماعی',
	"type" => "heading",
	"slug" => 'ie_social'
);							
$options[] = array( "name" => 'تنظیمات شبکه های اجتماعی',
			"desc" => "",
			"id" => $shortname."_sample_callout",
			"std" => "در این بخش آدرس شبکه ای اجتماعی خود را درج کنید .  این شبکه ها در فوتر و هدر قرار دارد.",
			"type" => "info");	

$options[] = array(
	"name" => 'تویتر',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."twitter1",
	"std" => "false",
	"type" => "checkbox"
);
			
$options[] = array( 
	"desc" => "آدرس صفحه تویتر خود را وارد کنید.",
	"id" => $prefix.'twitter',
	"std" => "http://www.twitter.com",
	"type" => "text"
);


$options[] = array(
    "name" => 'فیسبوک',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."facebook1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array( 
			"desc" => "آدرس صفحه فیسبوک خود را وارد کنید",
	        "id" => $prefix.'',
			"std" => "http://www.facebook.com",
			"type" => "text"
);


$options[] = array(
	"name" => 'اینستگرام',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."Instagram1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
			"desc" => "آدرس اینستگرام خود را وارد کنید.",
	        "id" => $prefix.'Instagram',
			"std" => "http://www.Instagram.com",
			"type" => "text"
);	

$options[] = array(
	"name" => 'تلگرام',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."telegram1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
			"desc" => "آدرس شبکه تلگرام خود را وارد کنید.",
	        "id" => $prefix.'telegram',
			"std" => "https://telegram.me/",
			"type" => "text"
);

$options[] = array(
	"name" => 'آپارات',
	"desc" => 'فعال شود؟', 
	"id" => $prefix."aparat1",
	"std" => "false",
	"type" => "checkbox"
);
$options[] = array(
			"desc" => "آدرس شبکه آپارات خود را وارد کنید.",
	        "id" => $prefix.'aparat',
			"std" => "http://www.aparat.com",
			"type" => "text"
);
//================================================
$options[] = array( 
	"name" => 'درباره ما',
	"type" => "heading",
	"slug" => 'ie_about'
);

$options[] = array( 
	"name" => 'کلکسیون طراحی',
	"desc" => "",
	"id" => $prefix.'info',
	"std" => "
	<p class='ie_info'>
<img src='".$themedir."/admin/images/wp-qaleb.png'>
<br>
<span>
این قالب توسط کلکسیون طراحی کد نویسی شده است. <br>
پشتیبانی از این قالب رایگان است . <br>
سرویس پشتیبانی ( تیکتینگ ) : wp-qaleb.ir <br>
ایمیل روابط عمومی : shaebani.67@gmail.com<br>
فقط به ایمیل های خصوصی پاسخ داده می شود. <br>
</span>
</p>

	",
	"type" => "info"
);

update_option('of_template',$options); 			  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);
return $options;
}
}
?>