<?php
    $default = array(
        "title"                 => get_sub_field( 'title' ) ?: get_the_title(),
        "title_tag"             => get_sub_field( 'title_tag' ),
        "sub_title"             => get_sub_field( 'sub_title' ),
        "form"                  => get_sub_field( 'form' ),
    );
    
    $args = wp_parse_args( $args, $default );
?>

<div class="block-cta d-flex flex-column" data-delay="0.1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php
                    echo '<'. $args['title_tag'] . ' class="section-title mb-3">';
                    echo $args['title'];
                    echo '</'. $args['title_tag'] . '>';
                ?>
                <?php echo $args['sub_title']; ?>
            </div>
            <div class="col-lg-12">
            </div>
            <div class="col-lg-12">
                <?php echo do_shortcode('[contact-form-7 id="'. $args['form'] .'"]'); ?>
            </div>
        </div>
    </div>
</div> 