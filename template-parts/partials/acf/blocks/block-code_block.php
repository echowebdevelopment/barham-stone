<?php
    $default = array(
        "code"                => get_sub_field( 'texthtml' ),
    );
    
    $args = wp_parse_args( $args, $default );
?>

<?php echo $args['code'] ?>