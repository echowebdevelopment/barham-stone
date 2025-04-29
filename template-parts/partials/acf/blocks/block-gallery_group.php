<?php
    $default = array(
        "gallery_group" => get_sub_field( 'gallery_group' ),
    );
    
    $args = wp_parse_args( $args, $default );
?>

<div class="block-gallery-group d-flex flex-column position-relative" data-delay="0.1">
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
                            $title = get_sub_field('title');
                            $blurb = get_sub_field('blurb');
                            $gallery = get_sub_field('photo_gallery'); // returns array of image data
                        ?>
                        <div class="tab-pane fade show py-5" id="nav-<?php echo esc_html($title); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_html($title); ?>-tab">
                          <?php if ($blurb): ?>
                            <div class="blurb px-5 pb-5">
                              <h5><?php echo wp_kses_post($blurb); ?></h5>
                            </div>
                          <?php endif; ?>
                          <div class="gallery-group">
                            <?php if ($gallery): ?>
                                <div class="photo-gallery">
                                    <?php foreach ($gallery as $image): ?>
                                        <figure>
                                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php if (!empty($image['title'])): ?>
                                                <figcaption><?php echo esc_html($image['title']); ?></figcaption>
                                            <?php endif; ?>
                                        </figure>
                                    <?php endforeach; ?>
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

