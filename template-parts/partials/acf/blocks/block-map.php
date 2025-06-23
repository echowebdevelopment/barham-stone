<?php
    $default = array(
        "map"                => get_sub_field( 'map' ),
    );
    
    $args = wp_parse_args( $args, $default );
?>

<div class="block-map d-flex flex-column bg-black py-5 text-white position-relative" data-delay="0.1">
    <?php echo $args['map'] ?>
    <div class="container">
        <div class="block-map_nap p-4 rounded-2 bg-gradient-light text-black">
            <h4>Showroom & Workshop</h4>
            <?php echo get_field('address', 'options') ?>
            <?php $phone = get_field('phone','options'); ?>
            <p><?php if(get_field('phone','options')){ echo 'Tel: <a href="tel:'. str_replace(' ', '', $phone) .'">';echo esc_html($phone);echo '</a>'; } ?><br>
            Email: <a href="mailto:<?php echo get_field('email', 'options') ?>"><?php echo get_field('email', 'options') ?></a></p>
        </div>
    </div>
</div> 