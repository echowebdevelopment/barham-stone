<?php

$default = array(
    "select_feed" => get_sub_field( 'select_feed' )
);

$args = wp_parse_args( $args, $default );

$args = [
    'post_type' => 'material',
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ?: 1,
    'tax_query'      => [
        [
            'taxonomy' => 'material-type', // change to your actual taxonomy name
            'field'    => 'slug',
            'terms'    => $args['select_feed'], // change to your desired term slug
        ],
    ],
];
$materials_query = new WP_Query($args);
?>
<div class="block-materials py-5 px-2" data-delay="0.1">
    <div class="container">
        <?php
        if ($materials_query->have_posts()) : ?>
            <div class="row materials-list">
                <?php while ($materials_query->have_posts()) : $materials_query->the_post(); ?>
                    <div class="col-lg-4 col-md-6 material-item position-relative">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'large', array(
                                'class' => 'bg-image object-fit-cover w-100 h-100 position-absolute top-0 start-0'
                            ) );
                        }
                    ?>
                        <div class="material-content">
                            <h3><?php the_title(); ?></h3>
                            <div><?php the_field('description'); ?></div>
                            <?php if ($file = get_field('file_upload')): ?>
                                <a href="<?php echo esc_url($file['url']); ?>" download class="btn">
                                    Download <?php echo esc_html($file['filename']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php understrap_pagination(['query' => $materials_query]); ?>
            </div>

        <?php else : ?>
            <p>No materials found.</p>
        <?php endif;

        wp_reset_postdata();
        ?>
    </div>
</div>