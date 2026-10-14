<?php
/*
* Last Post
*
* @since News
*/
class last_post extends WP_Widget {

function last_post() {
$widget_ops = array(
'classname' => 'last-post',
'description' => 'آخرین نوشته های سایت شما همراه با عکس',
);
parent::__construct( 'last_post', 'ابزارک اختصاصی قالب خبری مهر', $widget_ops );
}

function widget( $args, $instance ) {
$widget_title = apply_filters( 'widget_title', $instance['widget_title'] );
$post_num = apply_filters( 'post_num', $instance['post_num'] );
$post_cat = apply_filters( 'post_cat', $instance['post_cat'] );
$limit_title = apply_filters( 'limit_title', $instance['limit_title'] );
echo $args['before_widget'];
if( !empty($widget_title) ) {
echo $args['before_title'];
echo $widget_title;
echo $args['after_title'];
}
?>

<div class="last-post">
<?php
$catquery = new WP_Query('cat=' . $post_cat . '&posts_per_page=' . $post_num .'');
if( $catquery->have_posts() ) :
while( $catquery->have_posts() ) : $catquery->the_post();
?>


<li>
<div class="last-post-box">
<div class="last-post-box-image"><a href="<?php the_permalink() ?>" rel="bookmark"><?php if(has_post_thumbnail()) {echo get_the_post_thumbnail($post->ID, array(50,50) ); } ?></a></div> 
<div class="last-post-box-txt"><a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a></div> 
</div> 
</li>



<?php
endwhile;
wp_reset_postdata();
endif;
?>
</div>
<?php
echo $args['after_widget'];
}

function update( $new_instance, $old_instance ) {
$instance = array();
$instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
$instance['post_num'] = ( ! empty( $new_instance['post_num'] ) ) ? strip_tags( $new_instance['post_num'] ) : '';
$instance['post_cat'] = ( ! empty( $new_instance['post_cat'] ) ) ? strip_tags( $new_instance['post_cat'] ) : '';
$instance['limit_title'] = ( ! empty( $new_instance['limit_title'] ) ) ? $new_instance['limit_title'] : '';
return $instance;
}

function form( $instance ) {
if ( isset( $instance[ 'widget_title' ] ) ) {
$widget_title = $instance[ 'widget_title' ];
} else {
$widget_title = 'نوشته های تازه';
}

if ( isset( $instance[ 'post_num' ] ) ) {
$post_num = $instance[ 'post_num' ];
} else {
$post_num = '5';
}

if ( isset( $instance[ 'limit_title' ] ) ) {
$limit_title = $instance[ 'limit_title' ];
}
?>
<p>
<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>">نام:</label>
<input name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" class="widefat">
</p>
<p>
<label for="<?php echo $this->get_field_id( 'post_cat' ); ?>">دسته بندی:</label>
<select name="<?php echo $this->get_field_name( 'post_cat' ); ?>" id="<?php echo $this->get_field_id( 'post_cat' ); ?>" class="widefat">
<option value='0' <?php selected( $instance['post_cat'], "0" ); ?>>همه مطالب</option>
<?php foreach(get_categories( array('hide_empty' => 0) ) as $cat) { ?>
<option <?php selected( $instance['post_cat'], $cat->cat_ID ); ?> value="<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></option>
<?php } ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'post_num' ); ?>">تعداد نوشته‌هایی که نمایش داده می‌شود:</label>
<input name="<?php echo $this->get_field_name( 'post_num' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $post_num ); ?>" size="3" id="<?php echo $this->get_field_id( 'post_num' ); ?>" class="tiny-text">
</p>
<p>
<input type="checkbox" name="<?php echo $this->get_field_name( 'limit_title' ); ?>" id="<?php echo $this->get_field_id( 'limit_title' ); ?>" class="checkbox" <?php checked( $limit_title, "on" ); ?>>
<label for="<?php echo $this->get_field_id( 'limit_title' ); ?>">محدود سازی عنوان جهت نمایش بهتر</label>
</p>
<?php
}
}

function qaleb_last_post_widget() {
register_widget( 'last_post' );
}

add_action( 'widgets_init', 'qaleb_last_post_widget' );
?>