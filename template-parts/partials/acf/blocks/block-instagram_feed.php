
<?php
    $default = array(
        "shortcode"                    => get_sub_field( 'shortcode' )
    );
    
    $args = wp_parse_args( $args, $default );
?>

<div class="block-instagram" data-delay="0.1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h2>Follow us on Instagram</h2>
            </div>
            <div class="col-lg-12">
                <?php echo do_shortcode(''. $args['shortcode'] .''); ?>
            </div>
        </div>
    </div>
</div> 