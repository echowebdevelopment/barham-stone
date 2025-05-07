<div class="block-hero-banner" data-delay="0.1">
    <!-- Carousel Container -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php if ( have_rows('carousel_slides') ) : ?>
            <?php while ( have_rows('carousel_slides') ) : the_row(); 
                $bg = get_sub_field('background_image');
                $title = get_sub_field('title');
                $description = get_sub_field('blurb');
                $button = get_sub_field('button');
            ?>
                <div class="swiper-slide p-3">
                        <?php echo wp_get_attachment_image($bg, 'full') ?>
                        <div class="slide-content">
                            <?php if ( $title ) : ?><h3 class="section-title"><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ( $description ) : ?><p><?php echo mb_strimwidth($description, 0, 120, '...'); ?></p><?php endif; ?>
                            <?php if ( $button['title'] && $button['url'] ) : ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="btn"><?php echo esc_html($button['title']); ?></a>
                            <?php endif; ?>
                        </div>
                        <?php if ( $button['url'] ) : ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="cover-link"></a>
                        <?php endif; ?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

    <!-- Optional -->
    <div class="swiper-pagination"></div>
    </div>
</div> 


<!-- SwiperJS Init Script -->
<script>
  const swiper = new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
      delay: 3000, // 3 seconds
      disableOnInteraction: false,
    },
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    }
  });
</script>