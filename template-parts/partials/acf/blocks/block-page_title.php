<?php
    $default = array(
        "layout"                => get_sub_field( 'layout' ),
        "title"                 => get_sub_field( 'title' ) ?: get_the_title(),
        "title_tag"             => get_sub_field( 'title_tag' ),
        "blurb"                 => get_sub_field( 'blurb' ),
        "button"                => get_sub_field( 'button' ),
        "bg"                    => get_sub_field( 'background' )
    );
    
    $args = wp_parse_args( $args, $default );
    $bg = $args['bg'];
?>

<div class="block-page-title d-flex flex-column text-white py-5 position-relative block-bg-image border-bottom" data-delay="0.1">
    <?php if($bg) {?>
        <?php echo wp_get_attachment_image($bg, 'full', "", ["class" => "bg-image object-fit-cover w-100 h-100 position-absolute top-0 start-0"]) ?>
    <?php } else { ?> 
        <img src="<?php echo get_template_directory_uri() . '/css/icons/default-banner.jpg'; ?>" class="bg-image object-fit-cover w-100 h-100 position-absolute top-0 start-0">
    <?php } ?>
    <div class="container my-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 bg-gradient p-5 rounded-2">
                <?php
                    echo '<'. $args['title_tag'] . ' class="section-title mb-3">';
                    echo $args['title'];
                    echo '</'. $args['title_tag'] . '>';
                ?>
                <div class="header-blurb"><?php echo $args['blurb'] ?></div>
                <?php
                    $button = $args['button'];
                    if($button){
                ?>
                    <a href="<?php echo $button['url']; ?>" class="btn"><?php echo $button['title']; ?></a>
                <?php } ?>
            </div>
            <div class="col-lg-6 justify-content-center justify-content-lg-end d-flex">
                
            </div>
        </div>
    </div>
</div> 