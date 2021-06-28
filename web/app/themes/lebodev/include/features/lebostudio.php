<?php 

add_image_size('categorie', 600, 9999);

// When body loaded add the circle
add_action('wp_body_open', 'lebostudio_body_open');
function lebostudio_body_open(){
    ?>
        
        <div id='circle' class='text-center'></div>
    <?php 
}

// add_filter("the_content", "lebostudio_content");
function lebostudio_content($content){
    $h1 = get_main_heading($content);
    // if(isset($h1[0])){
    //     $split = split_text($h1[0]);
    //     $join = join(" ", $split);
        
    //     return str_replace("<h1>$h1[0]</h1>", "<h1>$join</h1>", $content);
    // }
    
    return $content;
}

/**
 * Get values in a tag
 */
function get_main_heading($string)
{
    $pattern = "/<h1 class=(.*?)>(.*?)<\/h1>/";
    preg_match( '|<h[^>]+>(.*)</h[^>]+>|iU', $string, $headings );
    
    return $headings[0];
}

function split_text($string){
    
    $singleSpace = preg_replace('!\s+!', ' ', $string);
    $text = explode(" ", $singleSpace);
    $span = array_map(function($item){
        $item = "<span>$item</span>";
        return $item;
    }, $text);

    return $span;
}

/**
 * Align wide
 * active le full width gutenberg
 */
function lebostudio_setup_theme_supported_features() {

	// Format large
	add_theme_support( 'align-wide' );

}

// Local Json ACF (performance et versionning)
add_action( 'after_setup_theme', 'lebostudio_setup_theme_supported_features' );
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/include/features/acf/local-json';
    
    // return
    return $path;
    
}

/**
 * Support svg
 */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}


/**
 * LeboSwiper Shortcode
 */

 add_shortcode( 'LeboSwiper', 'LeboSwiper_CB');
 function LeboSwiper_CB(){
    global $post;
    $ID = $post->ID;
    $datas = get_field('carousel', $ID);
    $device     = new Mobile_Detect;
    $id = uniqid();
    ob_start();

    // echo "<pre>";
    // print_r($datas['carousel-items']);
    // echo "</pre>";
    
    if($datas) :
        
?>
<style type="text/css">

    .mobile-display {
        display: block
    }
    @media (max-width:1000px){
        .slide-title-lg { display: none!important }
    
    }@media (min-width:1000px){
        .mobile-display {
            display: none!important
        }
    
    }

</style>
    <div class="LeboSwiper-wrapper pt-sm-5 mt-5">
        <div class="swiper-container LeboCarousel">
            <div class="swiper-wrapper">
                <?php

                    if(isset($datas['carousel-items']) && is_array($datas['carousel-items'])) :
                        $carouselsNumber =  count($datas['carousel-items']); 
                    
                        foreach($datas['carousel-items'] as $cle=>$carousel) : ?>
                            <?php 
                                // Image if is mobile or is desktop
                                $image          = $device->isMobile() ? $carousel['image-mobile'] : $carousel['image'];
                                $orientation    = isset($image['caption']) ? $image['caption'] : null;
                                $ProjectType    = $carousel['project-type'];
                                $slideLast = ($cle === $carouselsNumber-1) ? "slide-last" : "";
                            ?>
                            <!-- SWIPER SLIDE -->

                            <div data-label="Projet suivant" class="swiper-slide ui-slide flex-wrap <?php echo $slideLast; ?> <?php echo $orientation; ?> <?php if($orientation === '') :  ?>overflow-hidden<?php endif; ?>">
                                <?php if( !$device->isMobile() ) : ?>
                                    <div data-mode="lg" class="slide-title slide-title-lg text-left position-absolute p-4 p-sm-5">
                                        <h3 class="text-left text-white mb-0"><?php echo $carousel['project-name'];?></h3>
                                        <small style="margin-top:20px; display:block; " class="text-left text-white"><?php echo sprintf('%s', str_replace('|', '<br/>', $carousel['project-description']));?></small>
                                        <?php if($carousel['project-link']): ?>
                                            
                                        <a href="<?php echo $carousel['project-link']['url']; ?>" title="<?php echo $carousel['project-link']['title']; ?>" 
                                            class="default-link pt-sm-4 d-flex align-self-end align-items-center project-link font-weight-500"><span class="mr-0"><?php echo $carousel['project-link']['title']; ?></span></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                               

                                <?php if($ProjectType === 'image') { ?>
                                    <?php 
                                        
                                        if($device->isMobile() || $device->isTablet()) {
                                            echo '<img alt="' . $image['title'] . '" src="' . $image['sizes']['medium'] . '" srcset="' . $image['sizes']['medium_large'] .' '. $image['sizes']['medium_large-width'] .'w, '. $image['sizes']['medium'] .' '.  $image['sizes']['medium-width'] .'w, '. $image['sizes']['thumbnail'] .' '.  $image['sizes']['thumbnail-width'] .'w">';
                                        } else {
                                            echo '<img src=" ' .$image['url']. ' " />'; 
                                        }
                                    ?>
                                <?php } ?>
                                <?php if($ProjectType === 'video') { ?>
                                    <div class="w-100 overflow-hidden video-wrapper">
                                        <video muted loop autoplay class="w-70 video-<?php echo $id; ?>">
                                            <source src="<?php echo $carousel['video']['url']; ?>" type="video/mp4">
                                        </video>
                                    </div>
                                    
                                <?php } ?>

                                <div class="slide-title mobile-display slide-title-mobile text-left position-relative w-100 p-4 p-sm-5">
                                        <h3 class="text-left mb-0 text-center"><?php echo $carousel['project-name'];?></h3>
                                        <?php if($carousel['project-link']): ?>
                                        <a href="<?php echo $carousel['project-link']['url']; ?>" title="<?php echo $carousel['project-link']['title']; ?>" 
                                                class="default-link project-link text-center position-relative font-weight-500"><span><?php echo $carousel['project-link']['title']; ?></span></a>
                                        <?php endif; ?>
                                    </div>
                            </div>

                           
                        <?php 
                        endforeach; 
                    endif;  ?>
            </div>
            <?php if( $device->isMobile() ) : ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php endif; ?>
            <!-- Add Pagination -->
            <div class="swiper-pagination d-none"></div>
        </div>
    </div>
    
<?php 
    endif; 
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
 }

/**
 * Remove admin bar
 * 
 */
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
