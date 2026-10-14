<?php

add_action( 'wp_enqueue_scripts', 'tie_register' ); 
function tie_register() {


    wp_register_script( 'tie-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );  

    wp_enqueue_script( 'tie-scripts' );
?>
<script type='text/javascript'>
	/* <![CDATA[ */
	var tievar = {'go_to' : '<?php _e('موضوعات ...', 'tie') ?>'};
	/* ]]> */
</script>
<?php
global $is_IE;
if( $is_IE ){ ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php }
}

?>