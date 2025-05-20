<?php

$default = array(
    "select_feed"   => get_sub_field( 'select_feed' ),
    "title"         => get_sub_field( 'title' )
);

$args = wp_parse_args( $args, $default );
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'partner',
    'posts_per_page' => -1,
    'paged' => $paged,
    'orderby'   => 'meta_value',
    'order' => 'ASC',
    'tax_query'      => [
        [
            'taxonomy' => 'product', // change to your actual taxonomy name
            'field'    => 'slug',
            'terms'    => $args['select_feed'], // change to your desired term slug
        ],
    ],
];
$materials_query = new WP_Query($args);
?>
<div class="block-materials py-5 px-2" data-delay="0.1">
    <div class="container mb-3">
        <h3 class="section-title"><?php echo get_sub_field( 'title' ) ?: 'Partners'; ?></h3>
    </div>
    <div class="container">
        <?php
        if ($materials_query->have_posts()) : ?>
            <div class="row materials-list">
                <?php while ($materials_query->have_posts()) : $materials_query->the_post(); ?>
                    <div class="col-lg-3 col-md-4 p-2">
                        <div class="material-item position-relative">
                             <?php $bg = get_field('logo'); ?>
                             <?php if($bg) { ?>
                                <?php echo wp_get_attachment_image($bg, 'full', "", ["class" => "bg-image object-fit-contain object-fit-center position-absolute top-0 start-0","alt"=>"some"]) ?>
                            <?php } ?>
                                <div class="material-content">
                                    <h4 class="section-title"><?php the_title(); ?></h4>
                                    <div><?php the_field('description'); ?></div>
                                    <?php $website = get_field('url'); ?>
                                        <a href="<?php echo $website['url']; ?>" class="btn-small" target="_blank">Website <i class="icon-arrow-right2"></i></a>
                                    
                                </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            

                <?php wp_reset_postdata(); ?>
            </div>

            

        <?php else : ?>
            <p>No Partners found.</p>
        <?php endif;

        ?>
    </div>
</div>