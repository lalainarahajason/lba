
<?php
    $attributs  = get_field('attributs');
    $texte      = get_field('texte');
    $id         =  "btn-" . mt_rand(1000,9999);
    $type       = get_field('type');
    $aligner    = get_field('aligner');
?>

<style>
    .btn { border-radius:0; }
    .btn span { position:relative; z-index:2; }
    .btn:before { z-index: 1; }
    <?php echo "#" . $id; ?>  {
        <?php if($type === 'fill-color'): ?>
            background-color: #e4f302;
            color:#000;
        <?php endif; ?>
        <?php if($type === 'border-color'): ?>
            border: 1px solid black;
        <?php endif; ?>
   
}
</style>
<div class="btn-wrapper btn-contact-type <?php if($aligner === 'center'): ?>text-center w-100<?php endif; ?><?php if($aligner === 'right'): ?>text-right w-100<?php endif; ?> d-inline-block">
    <a id="<?php echo $id; ?>" href="<?php echo $attributs['url']; ?>" target="<?php $attributs['target'] ?>" class="<?php echo $type; ?> position-relative btn btn-lg font-weight-600"><span><?php echo $texte; ?></span></a>
</div>

