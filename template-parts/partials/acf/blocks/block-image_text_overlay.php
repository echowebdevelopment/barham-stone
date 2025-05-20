<?php
    $default = array(
        "layout"                => get_sub_field( 'layout' ),
        "title"                 => get_sub_field( 'title' ) ?: get_the_title(),
        "title_tag"             => get_sub_field( 'title_tag' ),
        "blurb"                 => get_sub_field( 'blurb' ),
        "button"                => get_sub_field( 'button' ),
        "bg"                    => get_sub_field( 'background' ),
        "column_count"          => get_sub_field( 'column_count' )
    );
    
    $args = wp_parse_args( $args, $default );
    $bg = $args['bg'];
    $column_count = $args['column_count'];
    if($column_count == '2') {
        $grid = 'col-xl-6 col-md-6';
    } elseif ($column_count == '4'){
        $grid = 'col-xl-3 col-md-6';
    } else {
        $grid = 'col-xl-4 col-md-6';
    }

    $layout = get_sub_field( 'layout' );
?>

<div class="block-image-text d-flex flex-column text-white position-relative block-bg-image py-5 px-2" data-delay="0.1">
    <div class="container">
        <div class="row g-3">
            <?php if ( have_rows('ito_item') ) : ?>
                <?php while ( have_rows('ito_item') ) : the_row(); 
                        $bg = get_sub_field('background_image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('blurb');
                        $button = get_sub_field('button');
                    ?>
                    <div class="<?php echo $grid; ?>">
                        <div class="ito_item position-relative">
                                <?php echo wp_get_attachment_image($bg, 'full') ?>
                                <div class="ito_item-content p-4 <?php echo $layout; ?>">
                                    <?php if ( $title ) : ?><h3 class="section-title"><?php echo esc_html($title); ?></h3><?php endif; ?>
                                    <?php if ( $description ) : ?><p><?php echo mb_strimwidth($description, 0, 100, '...'); ?></p><?php endif; ?>
                                    <?php if ( $button['title'] && $button['url'] ) : ?>
                                    <a href="<?php echo esc_url($button['url']); ?>" class="btn"><?php echo esc_html($button['title']); ?></a>
                                    <?php endif; ?>
                                </div>
                                <?php if ( $button['url'] ) : ?>
                                    <a href="<?php echo esc_url($button['url']); ?>" class="cover-link"></a>
                                <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div> 