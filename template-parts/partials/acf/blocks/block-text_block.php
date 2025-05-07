<?php
    $default = array(
        "left_content"      => get_sub_field( 'left_content' ),
        "right_content"     => get_sub_field( 'right_content' ),
    );
    
    $args = wp_parse_args( $args, $default );
    $content_right = $args['right_content'];
    $content_left = $args['left_content'];

?>

<div class="block-text d-flex flex-column py-5 px-2" data-delay="0.1">
    <div class="container">
        <div class="row align-items-center g-5">
        <div class="<?php if($content_right['content'] == 'blank-block'){ echo 'col-md-12'; }elseif($content_right['content'] == 'gallery-block'){ echo 'col-lg-5'; }else{ echo 'col-lg-6';} ?>">
            <?php 
                if($content_left['content'] == 'text-block') {
                    $text_block = $content_left['text_block'];
                    if($text_block['title']){
                        echo '<'. $text_block['title_tag'] . ' class="section-title">';
                        echo $text_block['title'];
                        echo '</'. $text_block['title_tag'] . '>';
                    }
                    if($text_block['blurb_text']){
                        echo $text_block['blurb_text'];
                    }
                    if($text_block['button']){
                        $button_block = $text_block['button'];
                        echo '<a href="' .$button_block['url']. '" class="btn mt-3">';
                        echo $button_block['title'];
                        echo '</a>';
                    }
                }
                if($content_left['content'] == 'image-block') {
                    $image = $content_left['image'];
                    echo wp_get_attachment_image($image, 'full');
                }
                if($content_left['content'] == 'gallery-block') {
                    $images = $content_left['gallery'];
                    
                    if( $images ){?>
                        <ul class="gallery-content">
                            <?php foreach( $images as $image_id ): ?>
                                <li>
                                    <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php
                    }

                }
                if($content_left['content'] == 'video-block') {
                    
                    $iframe = $content_left['video'];

                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];
                    // Add extra parameters to src and replace HTML.
                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $iframe);

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"';
                    $iframe = '<video ' . $attributes . ' style="width:100%" id="myvideo"><source src="' . $src . '"  type="video/mp4"></video><div class="controls"><button id="play-pause"></button></div>';
                    if( $content_left['video'] ) {
                        echo  do_shortcode('<div class="video-container">'.$iframe.'</div>');
                    }
                    ?>
                    <script>
                        const video = document.getElementById('myvideo');
                        const playPauseButton = document.getElementById('play-pause');

                        playPauseButton.addEventListener('click', function() {
                            if (video.paused) {
                                video.play();
                                video.classList.add('playing');
                                playPauseButton.textContent = 'Pause';
                                playPauseButton.classList.add('hide');
                            } else {
                                video.pause();
                                playPauseButton.textContent = '';
                                playPauseButton.classList.remove('hide');
                                video.classList.remove('playing');
                            }
                        });
                    </script>
                    <?php
                }
                if($content_left['content'] == 'quote-block') {
                    $quote_block = $content_left['quote'];
                    echo '<div class="quote-block"><div class="quote-block__wrapper">';
                    if($quote_block['quote_text']){
                        echo '<div class="quote_text">' . $quote_block['quote_text'] . '</div>';
                    }
                    if($quote_block['rating']){
                        echo '<ul class="review-rating review-rating-'. $quote_block['rating'] .'">
                                        <li><span class="icon-star_empty"></span></li>
                                        <li><span class="icon-star_empty"></span></li>
                                        <li><span class="icon-star_empty"></span></li>
                                        <li><span class="icon-star_empty"></span></li>
                                        <li><span class="icon-star_empty"></span></li>
                                    </ul>';
                        $rating = $quote_block['rating'];
                        ?>
                            <script>
                                    $rating = '.review-rating-<?php echo $rating ?> li:nth-child(n+1):nth-child(-n+<?php echo $rating ?>) span';

                                    jQuery($rating).addClass('icon-review-star');
                                    jQuery($rating).removeClass('icon-star_empty');
                                </script>
                        <?php
                    }
                    if($quote_block['name']){
                        echo '<ul class="quote_name"><li>'. $quote_block['name'] . '</li><li>' . $quote_block['job_title'] .  '</li></ul>';
                    }
                    echo '</div></div>';
                }
            ?>
        </div>
                    <div class="<?php if($content_right['content'] == 'gallery-block'){ echo 'col-lg-7'; } else { echo 'col-lg-6'; } ?>">
                        <?php 
                        if($content_right['content'] == 'text-block') {
                            $text_block = $content_right['text_block'];
                            if($text_block['title']){
                                echo '<'. $text_block['title_tag'] . ' class="section-title">';
                                echo $text_block['title'];
                                echo '</'. $text_block['title_tag'] . '>';
                            }
                            if($text_block['blurb_text']){
                                echo $text_block['blurb_text'];
                            }
                            if($text_block['button']){
                                $button_block = $text_block['button'];
                                echo '<a href="' .$button_block['url']. '" class="btn mt-3">';
                                echo $button_block['title'];
                                echo '</a>';
                            }
                        }
                        if($content_right['content'] == 'image-block') {
                            $image = $content_right['image'];
                            echo wp_get_attachment_image($image, 'full');
                        }
                        if($content_right['content'] == 'gallery-block') {
                            $images = $content_right['gallery'];
                            
                            if( $images ){?>
                                <ul class="gallery-content">
                                    <?php foreach( $images as $image_id ): ?>
                                        <li>
                                            <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php
                            }

                        }
                        if($content_right['content'] == 'video-block') {
                            
                            $iframe = $content_right['video'];

                            // Use preg_match to find iframe src.
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];
                            // Add extra parameters to src and replace HTML.
                            $params = array(
                                'controls'  => 0,
                                'hd'        => 1,
                                'autohide'  => 1
                            );
                            $new_src = add_query_arg($params, $src);
                            $iframe = str_replace($src, $new_src, $iframe);

                            // Add extra attributes to iframe HTML.
                            $attributes = 'frameborder="0"';
                            $iframe = '<video ' . $attributes . ' style="width:100%" id="myvideo"><source src="' . $src . '"  type="video/mp4"></video><div class="controls"><button id="play-pause"></button></div>';
                            if( $content_right['video'] ) {
                                echo  do_shortcode('<div class="video-container">'.$iframe.'</div>');
                            }
                            ?>
                            <script>
                                const video = document.getElementById('myvideo');
                                const playPauseButton = document.getElementById('play-pause');

                                playPauseButton.addEventListener('click', function() {
                                    if (video.paused) {
                                        video.play();
                                        video.classList.add('playing');
                                        playPauseButton.textContent = 'Pause';
                                        playPauseButton.classList.add('hide');
                                    } else {
                                        video.pause();
                                        playPauseButton.textContent = '';
                                        playPauseButton.classList.remove('hide');
                                        video.classList.remove('playing');
                                    }
                                });
                            </script>
                            <?php
                        }
                        if($content_right['content'] == 'quote-block') {
                            $quote_block = $content_right['quote'];
                            echo '<div class="quote-block"><div class="quote-block__wrapper">';
                            if($quote_block['quote_text']){
                                echo '<div class="quote_text">' . $quote_block['quote_text'] . '</div>';
                            }
                            if($quote_block['rating']){
                                echo '<ul class="review-rating review-rating-'. $quote_block['rating'] .'">
                                                <li><span class="icon-star_empty"></span></li>
                                                <li><span class="icon-star_empty"></span></li>
                                                <li><span class="icon-star_empty"></span></li>
                                                <li><span class="icon-star_empty"></span></li>
                                                <li><span class="icon-star_empty"></span></li>
                                            </ul>';
                                $rating = $quote_block['rating'];
                                ?>
                                    <script>
                                            $rating = '.review-rating-<?php echo $rating ?> li:nth-child(n+1):nth-child(-n+<?php echo $rating ?>) span';

                                            jQuery($rating).addClass('icon-review-star');
                                            jQuery($rating).removeClass('icon-star_empty');
                                        </script>
                                <?php
                            }
                            if($quote_block['name']){
                                echo '<ul class="quote_name"><li>'. $quote_block['name'] . '</li><li>' . $quote_block['job_title'] .  '</li></ul>';
                            }
                            echo '</div></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> 

    