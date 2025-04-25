<?php
    $default = array(
        "layout"                => get_sub_field( 'layout' ),
        "section_alignment"     => get_sub_field( 'section_alignment' ),
        "title"                 => get_sub_field( 'title' ) ?: get_the_title(),
        "title_tag"             => get_sub_field( 'title_tag' ),
        "sub_title"             => get_sub_field( 'sub_title' ),
        "button_group"          => get_sub_field( 'button_group' )
    );
    
    $args = wp_parse_args( $args, $default );
?>

<div class="block-page-title d-flex flex-column" data-delay="0.1">
    <div class="row">
        <div class="col-lg-5 p-5 bg-secondary title-container">
            <?php if (function_exists('woocommerce_breadcrumb')) {
				woocommerce_breadcrumb();
			}else {
                get_template_part( 'template-parts/partials/header/breadcrumbs' );
            }?>
            <h1 class="section-title"><?php echo $args['title']; ?></h1>
            <div class="subtitle"><?php echo $args['sub_title']; ?></div>
        </div>
        <div class="col-lg-7 p-0">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                  } else {
                    ?><img src="<?php bloginfo('template_directory'); ?>/img/default-featured.jpg" alt="<?php the_title(); ?>" /><?php
                }
            ?>
        </div>
    </div>
</div> 