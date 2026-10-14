<div class="breadcrumbs">
<section id="breadcrumbs">
    
    <div id="path">
        <span><i class="fa fa-home" aria-hidden="true"></i> مسیر شما : &nbsp;&nbsp;</span>
        <?php
        if ( is_archive() ) {
            the_archive_title( '<span>', '</span>' );
        }
        if ( is_single() ) {
            $category = get_the_category();
            $cat_id = $category[0]->cat_ID;
        ?>
            <a href="<?php echo esc_url( get_category_link($cat_id) ); ?>"><?php echo get_cat_name($cat_id); ?></a>
            <span> : <?php the_title(); ?></span>
        <?php
        }
        if ( is_page() ) {
        ?>
            <span> : <?php the_title(); ?></span>
        <?php
        }
        if ( is_search() ) {
        ?>
            <span> : جستجو برای <?php the_search_query(); ?></span>
        <?php
        }
        if ( is_404() ) {
        ?>
            <span> : خطا : 404</span>
        <?php
        }
        ?>
    </div>
</section>
  </div>