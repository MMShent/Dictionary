<div class="itemColumn">

  <?php if($terms) { foreach($terms as $term) { ?>
    <div class="letterItem"><?php echo link_to($term->getWord(), url_for('@term?term='.$term->getSlug()))?></div>

  <?php } } ?>
</div>
