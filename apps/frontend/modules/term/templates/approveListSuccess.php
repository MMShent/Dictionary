
<?php if($terms) { foreach($terms as $key=>$term) { $sf_user->setCulture('en_US');?>

<div class="approveItem">
  <div class="word"><?php echo $term->getWord()?></div>
  <div class="definition"><?php echo $term->getDefinition() ?></div>
  <div class="author"><?php echo $term->getAuthorName().' - '.$term->getAuthorEmail()?></div>
  <div class="createdAt"><?php echo format_date($term->getCreatedAt(), 'D')?></div>
  <div class="actions">
    <?php echo link_to('Approve', '@approveTerm?id='.$term->getId(), array('class' => 'rounded btn'))?>
    &nbsp;&nbsp;
    <?php echo link_to('Decline', '@declineTerm?id='.$term->getId(), array('class' => 'rounded btn'))?>
  </div>
</div>

<?php } } ?>

<script type="text/javascript">

jQuery(document).ready(function() {

    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 1
    });
});
</script>

<?php slot('leftBar') ?>
  <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
      <?php
        if($terms4Slider)
        {
          foreach($terms4Slider as $key=>$item)
          {
            if($key%28 == 0) { echo '</li>'; }
            if($key%28 == 0 || $key == 0) { echo '<li>'; }

            echo '<p>'.link_to($item->getWord(), '@term?term='.$item->getSlug()).'</p>';
          }
        }
      ?>
  </ul>
<?php end_slot() ?>