<?php
    $default = array(
        "gallery_group" => get_sub_field( 'gallery_group' ),
    );
    
    $args = wp_parse_args( $args, $default );
?>

<div class="block-gallery-group d-flex flex-column position-relative py-5 px-2" data-delay="0.1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <nav class="gallery-group_nav">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <?php if (have_rows('gallery_group')): ?>
                  <?php while (have_rows('gallery_group')): the_row(); ?>
                    <?php 
                        $title = get_sub_field('title');
                    ?>
                    <button class="nav-link" id="nav-<?php echo esc_html($title) ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo esc_html($title) ?>" type="button" role="tab" aria-controls="nav-<?php echo esc_html($title) ?>"><i class="icon-arrow-down2"></i> <?php echo esc_html($title) ?></button>
                  <?php endwhile; ?>  
                <?php endif; ?>
              </div>
            </nav>
              
              <?php if (have_rows('gallery_group')): ?>
                <div class="tab-content gallery-group_tab" id="nav-tabContent">
                    <?php while (have_rows('gallery_group')): the_row(); ?>
                        <?php 
                            $g_title = get_sub_field('title');
                            $blurb = get_sub_field('blurb');
                            $gallery = get_sub_field('photo_gallery'); // returns array of image data
                        ?>
                        <div class="tab-pane fade show py-5" id="nav-<?php echo esc_html($g_title); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_html($g_title); ?>-tab">
                          <?php if ($blurb): ?>
                            <div class="blurb px-5 pb-5">
                              <h5><?php echo wp_kses_post($blurb); ?></h5>
                            </div>
                          <?php endif; ?>
                          <div class="gallery-group">
                            <?php if( have_rows('photo_gallery') ): ?>
                                <div class="photo-gallery">
                                    <?php while( have_rows('photo_gallery') ): the_row(); 
                                        $image = get_sub_field('image');
                                        $title = get_sub_field('title');
                                        $description = get_sub_field('description');
                                    ?>
                                      <div class="item">
                                            <?php if( $image ): ?>
                                              <a  href="<?php echo esc_url($image['url']); ?>" data-gallery="<?php echo esc_url($g_title); ?>" class="glightbox" data-title="<?php echo esc_html($title); ?>" data-description="<?php echo esc_html($description); ?>">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                              </a>
                                            <?php endif; ?>
                                        
                                        <figcaption>
                                            <h3 class="item_title"><?php echo esc_html($title); ?></h3>
                                            <a  href="<?php echo esc_url($image['url']); ?>" data-gallery="<?php echo esc_url($g_title); ?>" class="glightbox btn btn-icon" data-title="<?php echo esc_html($title); ?>" data-description="<?php echo esc_html($description); ?>"><i class="icon-plus"></i></a>
                                        </figcaption>
                                      </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                      </div>
                    <?php endwhile; ?>
                </div>
              </div>
            <?php endif; ?>
        </div>
    </div>
</div> 

<script>
  jQuery('.gallery-group_nav .nav-link:first-child').addClass('active');
  jQuery('.gallery-group_tab .tab-pane:first-child').addClass('active');
</script>


<link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
  const lightbox = GLightbox({
    selector: '.glightbox'
  });
</script>