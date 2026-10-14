<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Language" content="fa">
<meta name="keywords" content="<?php echo get_option('qaleb_keywords'); ?>"/>
<link href="<?php bloginfo('template_url'); ?>/images/favicon.png" rel="shortcut icon">
<link rel="icon" href="<?php echo get_option('qaleb_favicon'); ?>"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<meta name="description" content="<?php bloginfo('description'); ?>"/>
<title>
<?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name'); }
 elseif (is_single() ) { single_post_title(); }
 elseif (is_page() ) { bloginfo('name'); echo ': '; single_post_title(); }
 else { wp_title('',true); } ?>
</title>
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>
<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/tabe.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery_easing.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slide-show.js"></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/megatpl.js'></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Upera.js"></script>
<script type="text/javascript">

$( document ).ready( function()
{
	var targets = $( '[rel~=tooltip]' ),
		target	= false,
		tooltip = false,
		title	= false;

	targets.bind( 'mouseenter', function()
	{
		target	= $( this );
		tip		= target.attr( 'title' );
		tooltip	= $( '<div id="tooltip"></div>' );

		if( !tip || tip == '' )
			return false;

		target.removeAttr( 'title' );
		tooltip.css( 'opacity', 0 )
			   .html( tip )
			   .appendTo( 'body' );

		var init_tooltip = function()
		{
			if( $( window ).width() < tooltip.outerWidth() * 1.5 )
				tooltip.css( 'max-width', $( window ).width() / 2 );
			else
				tooltip.css( 'max-width', 340 );

			var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
				pos_top	 = target.offset().top - tooltip.outerHeight() - 20;

			if( pos_left < 0 )
			{
				pos_left = target.offset().left + target.outerWidth() / 2 - 20;
				tooltip.addClass( 'left' );
			}
			else
				tooltip.removeClass( 'left' );

			if( pos_left + tooltip.outerWidth() > $( window ).width() )
			{
				pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
				tooltip.addClass( 'right' );
			}
			else
				tooltip.removeClass( 'right' );

			if( pos_top < 0 )
			{
				var pos_top	 = target.offset().top + target.outerHeight();
				tooltip.addClass( 'top' );
			}
			else
				tooltip.removeClass( 'top' );

			tooltip.css( { left: pos_left, top: pos_top } )
				   .animate( { top: '+=10', opacity: 1 }, 50 );
		};

		init_tooltip();
		$( window ).resize( init_tooltip );

		var remove_tooltip = function()
		{
			tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
			{
				$( this ).remove();
			});

			target.attr( 'title', tip );
		};

		target.bind( 'mouseleave', remove_tooltip );
		tooltip.bind( 'click', remove_tooltip );
	});
});

</script>

<?php wp_head(); ?>

</head>
<body>
<?php include TEMPLATEPATH . '/panel/color.php';?>

<div class="header">

<div class="display-none"><?php $sample_checkbox = get_option('qaleb_top_menu1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_top_menu1');if ($sample_checkbox == "true") {?></div> 
<div class="top">
<div class="top-before">
<div class="top-nav">
<?php wp_nav_menu( array( 'container_class' => 'top-menu', 'theme_location' => 'top-menu', 'fallback_cb' => 'tie_nav_fallback'  ) ); ?>
</div>

<div class="top-socail">
<div class="display-none"><?php $sample_checkbox = get_option('qaleb_top_social1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_top_social1');if ($sample_checkbox == "true") {?></div> 
<div class="social">
<?php get_template_part('social/social'); ?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</div>


<div class="top-search">
<div class="display-none"><?php $sample_checkbox = get_option('qaleb_top_search1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_top_search1');if ($sample_checkbox == "true") {?></div> 
<div class="search">
<?php include TEMPLATEPATH."/searchform.php"?>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>
</div>
</div>
</div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>


<div class="header-mildd">
<div class="header-mildd-balans">
<div class="header-mildd-logo">
<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
<img src="<?php echo get_option('qaleb_logo'); ?>" class="logo" alt="<?php bloginfo('description'); ?>" title="<?php bloginfo('name'); ?>" />
</a>
</div>

<div class="header-mildd-map">
<div class="banner">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('بنر تبلیغاتی هدر') ) : ?><?php endif; ?>
</div>

</div>

<div class="header-mildd-date">
<div class="display-none"><?php $sample_checkbox = get_option('qaleb_top_date1');echo $sample_checkbox;$sample_checkbox = get_option('qaleb_top_date1');if ($sample_checkbox == "true") {?></div> 
<div class="date">
<div class="calender-header">
<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; امروز</p>
<p><?php echo jdate ('l, j F , Y') ; ?></p>
</div>
<div class="time-header">
<p><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; ساعت</p>
<p><?php echo jdate('H:i A'); ?></p>
</div></div>
<div class="display-none"><?php echo 'it is true';  } else { echo 'it is false';} ?></div>

</div>
</div></div>

<div class="main-nav-before">
<nav id="main-nav"<?php echo $stick; ?>>
<?php $orig_post = $post; wp_nav_menu( array( 'container_class' => 'main-menu', 'theme_location' => 'primary' ,'fallback_cb' => 'tie_nav_fallback',  'walker' => new tie_mega_menu_walker()  ) ); $post = $orig_post; ?>
</nav>			
</div>
</div>
