<?php $value = get_post_meta( $post->ID, 'filetype_field', true );
if ( 'default' == $value || '' == $value ) { ?>
<?php get_template_part('page/single-default'); ?>
<?php } ?>

<?php if ( 'video' == $value ) { ?>
<?php get_template_part('page/single-video'); ?>
<?php } ?>

<?php if ( 'volume' == $value ) { ?>
<?php get_template_part('page/single-volume'); ?>
<?php } ?>

<?php if ( 'images' == $value ) { ?>
<?php get_template_part('page/single-camera'); ?>
<?php } ?>

<?php if ( 'newspaper' == $value ) { ?>
<?php get_template_part('page/single-newspaper'); ?>
<?php } ?>

<?php if ( 'spical' == $value ) { ?>
<?php get_template_part('page/single-spical'); ?>
<?php } ?>

<?php if ( 'frown' == $value ) { ?>
<?php get_template_part('page/single-frown'); ?>
<?php } ?>
