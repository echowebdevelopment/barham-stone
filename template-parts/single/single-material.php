<?php
    $default = array(
        "header_title"            => get_field( 'header_title' ) ?: get_the_title(),
        "description"             => get_field( 'description' ),
        "content_title"           => get_field( 'content_title' ),
        "content"                 => get_field( 'content' ),
        "file_upload"             => get_field( 'file_upload' ),
        "gallery"                 => get_field( 'gallery' )
    );
    
    $args = wp_parse_args( $args, $default );
    $description = get_field( 'description' );
?>

<?php 
    get_template_part( 'template-parts/partials/acf/blocks/block-page_title', null,
        array( 
        "title"                 => get_sub_field( 'header_title' ) ?: get_the_title(),
        "title_tag"             => 'h1',
        "blurb"                 => $description,
    )); 
?>
<?php if($args['content_title'] || $args['content']) {?>
    <div class="block-text d-flex flex-column py-5 px-2" data-delay="0.1">
        <div class="container">
            <div class="row align-items-center gx-5">
                <div class="col-md-8">
                    <h2 class="section-title"><?php echo $args['content_title'] ?></h2>
                    <?php echo $args['content'] ?>
                </div>
                <div class="col-md-4">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $images = get_field('gallery'); ?>
<?php if ($images): ?>
    <div class="echo-block " data-delay="0.3">
        <div class="container">
            <h3 class="section-title">Gallery</h3>
            <div class="row">
                <?php
                    if ($images): ?>
                        <div class="col-md-4">
                            <?php foreach ($images as $image): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php 
    get_template_part( 'template-parts/partials/acf/blocks/block-cta_advert', null,
        array( 
        "title"                 => get_field( 'title' ) ?: get_the_title(),
        "title_tag"             => 'h3',
        "blurb"                 => 'Barham Stone specialises in the manufacture of granite and quartz worktops for kitchens and bathrooms.',
        "button"                => get_field( 'button' ),
        "bg"                    => get_field( 'background' )
    )); 
?>

<?php 
    get_template_part( 'template-parts/partials/acf/blocks/block-form_block', null,
        array( 
        "title"                 => 'Get in touch',
        "title_tag"             => 'h3',
        "sub_title"             => 'Please use the form below to contact us and a member of you team will be touch help with your query.',
        "form"                  => '5350ded',
    )); 
?>