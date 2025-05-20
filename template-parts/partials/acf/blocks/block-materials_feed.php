<?php

$default = array(
    "select_feed"   => get_sub_field( 'select_feed' ),
    "title"         => get_sub_field( 'title' )
);

$args = wp_parse_args( $args, $default );
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'material',
    'posts_per_page' => 9,
    'paged' => $paged,
    'orderby'   => 'meta_value',
    'order' => 'ASC',
    'tax_query'      => [
        [
            'taxonomy' => 'material-type', // change to your actual taxonomy name
            'field'    => 'slug',
            'terms'    => $args['select_feed'], // change to your desired term slug
        ],
    ],
];
$materials_query = new WP_Query($args);
echo $materials_query->max_num_pages;
?>
<div class="block-materials py-5 px-2" data-delay="0.1">
    <div class="container mb-3">
        <h3 class="section-title"><?php echo get_sub_field( 'title' ) ?: 'Materials'; ?></h3>
    </div>
    <div class="container">
        <?php
        if ($materials_query->have_posts()) : ?>
            <div class="row materials-list">
                <?php while ($materials_query->have_posts()) : $materials_query->the_post(); ?>
                    <div class="col-lg-4 col-md-6 p-2">
                        <div class="material-item position-relative">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'large', array(
                                        'class' => 'bg-image object-fit-cover w-100 h-100 position-absolute top-0 start-0'
                                    ) );
                                }
                            ?>
                                <div class="material-content">
                                    <h4 class="section-title"><?php the_title(); ?></h4>
                                    <div><?php the_field('description'); ?></div>
                                    <?php if ($file = get_field('file_upload')): ?>
                                        <a href="<?php echo esc_url($file['url']); ?>" class="btn-small">
                                            View PDF
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="btn-small">Gallery <i class="icon-arrow-right2"></i></a>
                                </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                 <!-- UnderStrap Pagination -->
                    <div class="pagination-wrapper">
                        <?php understrap_pagination(); ?>
                    </div>

                <?php wp_reset_postdata(); ?>
            </div>

            

        <?php else : ?>
            <p>No materials found.</p>
        <?php endif;

        ?>
    </div>
</div>