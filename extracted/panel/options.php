<?php
add_action ( 'edit_category_form_fields', 'tie_category_fields');
function tie_category_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
	$cat_option = get_option('tie_cat_'.$t_id);
	
	if($sidebars){
		foreach ($sidebars as $sidebar) {
		$new_sidebars[$sidebar] = $sidebar;
		}
	}
?>
<tr class="form-field">
	<td colspan="2">

		<div class="tiepanel-item">
			<h3>تنظیمات مگا منو فهرست اصلی</h3>
			<?php
				tie_cat_options(
					array(	"name" => "",
							"id" => "cat_mega_menu",
							"cat" => $t_id ,
							"extra_text" => 'مگا منو برای این دسته فعال گردد ؟' ,
							"type" => "checkbox"));	
			?>
			
		</div>		
				
	</td>
</tr>
<?php
}

add_action ( 'edited_category', 'tie_save_extra_category_fileds');

function tie_save_extra_category_fileds( $term_id ) {
	$t_id = $term_id;
	update_option( "tie_cat_$t_id", $_POST["tie_cat"] );
}
function tie_cat_options($value){
	global $options_fonts;
?>
	<div class="option-item" id="<?php echo $value['id'] ?>-item">
		<span class="label"><?php  echo $value['name']; ?></span>
	<?php
	$cat_option = get_option('tie_cat_'.$value['cat']);
	
	switch ( $value['type'] ) {

		case 'checkbox':
			if( $cat_option[$value['id']] ){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
				<input class="on-of" type="checkbox" name="tie_cat[<?php echo $value['id']; ?>]" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />			
		<?php	
		break;
		
		case 'radio': 
		?>

		<?php 
		break;		
}
		if( isset( $value['extra_text'] ) ) : ?><span class="extra-text"><?php echo $value['extra_text'] ?></span><?php endif;
?>
</div>
			
<?php
}
?>