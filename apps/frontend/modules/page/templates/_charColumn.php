<div class="itemColumn">
  <?php if($terms) { foreach($terms as $key=>$term) { ?>

    <div class="letterItem"><?php echo link_to($term->getWord(), '@term?term='.$term->getWord())?></div>

  <?php } } ?>
</div>
