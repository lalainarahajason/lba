<?php 
    $carousel  = get_field('bloc-carousel');
    $id        =  "bloc-video-" . mt_rand(1000,9999);
    // Check device (mobile or desktop)
    $device = new Mobile_Detect;
    
?>


<?php if($carousel) : 
    $slideNumber = 1; 
?>
    
    <div data-count="<?php echo count($carousel); ?>" class="swiper-container content-carousel disable-drag swiper-container-horizontal">
        <div class="swiper-wrapper" data-parent="swiper">
            <?php foreach($carousel as $item) : 
                $last = ($slideNumber === count($carousel)) ? 1 : 0;
                $lien = isset($item['carousel-link']) ? $item['carousel-link'] : null;
                
                ?>
                
                <div data-number="<?php echo $last; ?>" class="swiper-slide <?php echo "mask-" . $item['carousel-type']; ?>" data-label="<?php //echo $item['carousel-cursor']; ?> Projet suivant" data-type="<?php echo $item['carousel-type']; ?>" >
                    <div class="image-container position-relative overflow-hidden">
                        <?php if(isset($lien['url'])): ?>
                            <a href="<?php echo $lien['url']; ?>" class="default-link carousel-link position-absolute font-weight-500">Ici lien</a>
                        <?php endif; ?>
                        <?php 
                            if( $item['carousel-image'] && $item['carousel-type'] === 'image' ):
                        ?>
                            <div class="slide-title position-absolute p-4 p-sm-5">
                                <h3 class="title-item"><?php echo $item['carousel-title'];?></h3>
                                <small class="title-item"><?php echo $item['carousel-description'];?></small>
                            </div>
                        <?php 
                                $imageobject = $item['carousel-image'];
                                if($device->isMobile() || $device->isTablet()) {
                                    echo '<img alt="' . $imageobject['title'] . '" src="' . $imageobject['sizes']['medium'] . '" srcset="' . $imageobject['sizes']['medium_large'] .' '. $imageobject['sizes']['medium_large-width'] .'w, '. $imageobject['sizes']['medium'] .' '.  $imageobject['sizes']['medium-width'] .'w, '. $imageobject['sizes']['thumbnail'] .' '.  $imageobject['sizes']['thumbnail-width'] .'w">';
                                } else {
                                    echo '<img src=" ' .$imageobject['url']. ' " />'; 
                                }
                            endif;

                            
                        ?>
                    </div>
                    
                    <?php if($item['carousel-type'] === 'video') : ?>
                       
                        <div class="video-container position-relative overflow-hidden" data-parent="swiper" data-type="<?php echo $item['carousel-type']; ?>">
                            <div class="slide-title position-relative p-4 p-sm-5">
                                <h3><?php echo $item['carousel-title'];?></h3>
                                <small><?php echo $item['carousel-description'];?></small>
                            </div>
                            <div class="video-play position-absolute" data-action="play"></div>
                            <div class="video-pause position-absolute d-none" data-action="pause"></div>
                            <video muted loop autoplay class="position-absolute video-<?php echo $id; ?>">
                                <source src="<?php echo $item['carousel-video']; ?>" type="video/mp4">
                            </video>
                        </div>
                       
                    <?php endif; ?>
                </div>
            <?php  $slideNumber++; endforeach; ?>
        </div>
        
        
    </div>
<?php endif; ?>