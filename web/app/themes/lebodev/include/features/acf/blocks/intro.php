<?php 

/**
 * Intro Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
    $id             =  "bloc-intro-" . mt_rand(1000,9999);
    $contenu        = get_field('contenu');
    $bloc          = get_field('bloc');

    $titre      = $contenu['principal-content'];
    //$sous_titre = $contenu["secondary-content"];

    // Bloc
    $block_bg    = $bloc['bg-color'];
    $largeur_desktop = $bloc['desktop-width'];
    $min_height = $bloc['min-height-desktop'];
    $picto = $contenu['picto'] ? $contenu['picto']['url'] : null; 
?>
<style>
    .bloc-intro-content p { line-height:1.1!important; }
    .bloc-intro-content .picto { width:50px; }
    @media(min-width:1000px){
        <?php echo "#" . $id; ?> .bloc-intro-content {
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }
    }

</style>
<div id="<?php echo $id; ?>" class="p-5 <?php echo $bloc['alignment']; ?> <?php 
    if($largeur_desktop === "100") : ?>
        alignfull
    <?php endif;  ?> 
    lebostudio-bloc-intro 
    d-flex 
    align-items-center 
    justify-content-center" 
    class="p-5" style="background-color:<?php echo $block_bg; ?>; <?php if($largeur_desktop !== "100"): ?>width:<?php echo $largeur_desktop . "%"; ?><?php endif; ?>" 
>
    <div class="bloc-intro-content">
        <p>
            <?php echo $titre; ?>
        </p>
        <?php if($picto != null) :  ?>
            <img class="picto ml-auto mr-auto mt-5" src="<?php echo $picto; ?>" />
        <?php endif; ?>
    </div>
</div>