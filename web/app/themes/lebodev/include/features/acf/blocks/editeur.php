<?php 
    $delimiter = "-";
    $str = get_field('editeur-classique-name');
    $editeur_slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
?>
<div class="editeur-classique <?php echo $editeur_slug; ?>">
    <?php echo get_field('editeur-classique'); ?>
</div>