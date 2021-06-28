
<?php 
    $id         =  "bloc-colonne-" . mt_rand(1000,9999);
    $firstcol   = get_field('premiere-colonne');
    $secondcol  = get_field('deuxieme-colonne');
    $cfirstcol  = $firstcol['contenu'];
    $soustitre  = get_field('sous-titre');
    $bgcolor    = get_field('block-bg');
?>
<!-- <pre>
    <?php print_r($firstcol); ?>
</pre> -->
<style>
    <?php echo "#" . $id; ?>.main-block-content {
        background-color:<?php echo $bgcolor; ?>
    }
    <?php echo "#" . $id; ?> .first-col p {
        /* font-size: <?php echo $firstcol['font-size-desktop']; ?>px;*/
        line-height:1.2;
        font-weight:600
    }
    <?php echo "#" . $id; ?> .last-col p,
    <?php echo "#" . $id; ?> .last-col h2,
    <?php echo "#" . $id; ?> .last-col h3,
    <?php echo "#" . $id; ?> .last-col h4
    {
        color:white;
    }
    <?php echo "#" . $id; ?> .last-col h2,
    <?php echo "#" . $id; ?> .last-col h3,
    <?php echo "#" . $id; ?> .last-col h4 {
        padding-top:2em;
        padding-top: 2em;
        font-size: 30px;
        line-height: 43px;
    }
    <?php echo "#" . $id; ?> .block-link a {
        color: #e4f302;
    }
    <?php echo "#" . $id; ?> .block-link a:before {
        content: "";
        display: inline-block;
        width: 20px;
        height: 3px;
        border-radius: 20px;
        background-color: #e4f302;
        margin-right: 30px;
        vertical-align: middle;
        transition: all .3s ease-in;
    }
    <?php echo "#" . $id; ?> .block-link a:hover:before{
        margin-right:20px;
    }
</style>
<div id="<?php echo $id; ?>" class="alignfull main-block-content">
    <div class="container">
        <div class="block-colonnes d-flex flex-wrap" >
            <div class="col-12 col-sm-7 p-1 p-sm-5 first-col">
                <?php echo $cfirstcol; ?>
            </div>
            <div class="col-12 col-sm-5 pr-sm-4 pt-sm-5 last-col">
                <?php echo $secondcol; ?>
                <div class="block-link text-right mt-5"><a href="/agence-digitale-creative-responsable" class="font-weight-500 position-relative display-inline-block">Découvrir notre agence</a></div>
            </div>
        </div>
    </div>
    <h4 class="block-colonnes-author text-white text-center font-weight-300 mb-0"><?php echo $soustitre; ?></h4>
</div>
