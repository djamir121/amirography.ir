<?php
/**
* @package WordPress
* @subpackage Theme_Compat
* @deprecated 3.0
*
* This file is here for Backwards compatibility with old themes and will be removed in a future version
*
*/
_deprecated_file( sprintf( __( 'Theme without %1$s' ), basename(__FILE__) ), '3.0', null, sprintf( __('Please include a %1$s template in your theme.'), basename(__FILE__) ) );
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e('این نوشته با پسورد محافظت شده است.'); ?></p>
<?php
return;
}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<h3 id="comments">دیدگاه ها (<?php comments_number(); ?>)</h3>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=beena_comment'); ?>
</ol>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e('دیدگاهها بسته است.'); ?></p>
<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
<h3>شما هم می توانید دیدگاه خود را ثبت کنید</h3>
<p>- کامل کردن گزینه های ستاره دار (*) الزامی است<br>- آدرس پست الکترونیکی شما محفوظ بوده و نمایش داده نخواهد شد</p>
<div id="cancel-comment-reply">
<small><?php cancel_comment_reply_link() ?></small>
</div>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('برای ارسال دیدگاه شما باید  <a href="%s">وارد سایت </a> شوید.'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>
<form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>
<p><?php printf(__('وارد شد با عنوان <a href="%1$s">%2$s</a>.'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('خارج می شوید'); ?>"><?php _e('خروج &raquo;'); ?></a></p>
<?php else : ?>
<div class="beena_inputs">
<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="نام و نام خانوادگی *"/>
<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="پست الکترونیکی *"/>
<input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" placeholder="وبسایت / وبلاگ"/>
</div>
<?php endif; ?>
<div class="beena_textarea"><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" placeholder="متن دیدگاه *"></textarea></div>
<p><input name="submit" type="submit" id="submit" class="jhihaat-theme" tabindex="5" value="ثبت دیدگاه" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>