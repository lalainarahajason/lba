<?php 

/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
$id        =  "bloc-services-" . mt_rand(1000,9999);
$contenu   = get_field('contenu');
$bloc      = get_field('bloc');
$video_id  = $bloc['bg-video'];
$choix     = $bloc['bg-current'];
$bg_choix  = $bloc['bg-' . $choix];

$lien      = isset($contenu['lien']['url']) ? $contenu['lien']['url'] : '#';
$title     = isset($contenu['lien']['title']) ? $contenu['lien']['title'] : 'Lebostudio agence de communication digitale';
$target    = isset($contenu['lien']['target']) ? $contenu['lien']['target'] : '';

$default_bg = "#e4f302";
$bloc_bg = $choix === 'color' ? $bg_choix : $default_bg;
?>
<style>
    <?php echo "#" . $id; ?> .bloc-services-content {
        top: 0;
        left:0;
        bottom:0;
        right:0;
        opacity:0;
        overflow:hidden;
        transition: all .5s ease-in-out;
        background-repeat:no-repeat;
        background-position:center;
        background-color: <?php echo $bloc_bg; ?>;
        <?php if($choix === 'image'): ?>
            background-image: url(<?php echo $bg_choix;?>);
        <?php endif; ?>
    }

    <?php echo "#" . $id; ?>{
        transition: all .5s ease-in-out;
        
    }

    <?php echo "#" . $id; ?>:hover .bloc-services-content {
        background-color: <?php echo $bloc['bg-color']; ?>;
        opacity:1;
    }
    
    <?php echo "#block-services"; ?>:hover h3 {
        color: <?php echo $contenu['hover-color']; ?>!important;
    }
    <?php echo "#" . $id; ?> h3:before {
       /*  background-color: black!important; */
    }
    <?php echo "#" . $id; ?>:hover h3:before {
        /* background-color: <?php echo $contenu['hover-color']; ?>!important; */
    }

    <?php echo "#" . $id; ?>  video {
        top:0%;
        left:50%;
        transform:translateX(-50%);
        height:100%;
       
    }
    @media(min-width:1000px){
        <?php echo "#" . $id; ?> {
            min-height: <?php echo $bloc['min-height']; ?>px;
        }
    }
    
</style>
<a href="<?php echo $lien; ?>" title="<?php echo $title; ?>" target="<?php echo $target; ?>" id="<?php echo $id; ?>"  <?php if( $choix === 'video') : ?> data-video="video-<?php echo $id; ?>" <?php endif; ?> <?php if( $choix === 'image') : ?> data-image="image-<?php echo $id; ?>" <?php endif; ?> <?php if( $choix === 'color') : ?> data-color="color-<?php echo $id; ?>" <?php endif; ?> 
    class="block-services mt-4 mt-sm-0 mask-link position-relative d-flex flex-wrap align-items-center cursor-pointer"
>
    <div class="py-5 px-3 px-sm-5">
        <div class="bloc-services-title">
            <h3 class="silk text-uppercase"><?php echo $contenu['principal-title']; ?></h3>
        </div>
        <div data-id="play-<?php echo $id; ?>" id="services-content-<?php echo $id; ?>" class="p-5 bloc-services-content position-absolute d-flex align-items-center">
            <?php if( $choix === 'video') : ?>
                <span class="video-play position-absolute"></span>
                <span class="video-pause position-absolute d-none"></span>
                <video id="play-<?php echo $id; ?>" preload="preload" loop="loop" muted="" class="video-<?php echo $id; ?> position-absolute">
                    <source src="<?php echo $bg_choix; ?>" type="video/mp4">
                </video>
            <?php endif; ?>
            <h3 class="position-relative text-uppercase" style="z-index:3"><?php echo $contenu['hover-title']; ?></h3>
        </div>
    </div>
</a>
