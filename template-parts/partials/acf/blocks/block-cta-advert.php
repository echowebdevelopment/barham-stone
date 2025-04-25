<?php
    $default = array(
        "layout"                => get_sub_field( 'layout' ),
        "section_alignment"     => get_sub_field( 'section_alignment' ),
        "title"                 => get_sub_field( 'title' ) ?: get_the_title(),
        "title_tag"             => get_sub_field( 'title_tag' ),
        "blurb"                 => get_sub_field( 'blurb' ),
        "button"                => get_sub_field( 'button' ),
        "bg"                    => get_sub_field( 'background' )
    );
    
    $args = wp_parse_args( $args, $default );
    $bg = $args['bg'];
?>

<div class="block-cta-advert d-flex flex-column" data-delay="0.1">
    <?php echo wp_get_attachment_image($bg, 'full') ?>
    <div class="row g-5">
        <div class="col-lg-8">
            <?php
                echo '<'. $args['title_tag'] . ' class="section-title mb-3">';
                echo $args['title'];
                echo '</'. $args['title_tag'] . '>';
            ?>
            <?php echo $args['blurb'] ?>
        </div>
        <div class="col-lg-4">
            <?php
                $button = $args['button'];
                if($button){
            ?>
                <a href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
            <?php } ?>
        </div>
    </div>
</div> 