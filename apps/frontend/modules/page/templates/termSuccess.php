<?php if($terms) { foreach($terms as $key=>$term) { $sf_user->setCulture('en_US'); ?>

<div class="termItem">
    <div class="word">
        <span><?php echo ($key+1).'. '.$term->getWord() ?></span>
    </div>

    <div class="definition">
        <?php echo $term->getDefinition()?>
    </div>

    <div class="example">
        <?php echo $term->getExample()?>
    </div>

    <div class="relatedTerms">
      <?php
      // Related terms
      $relatedTerms = $term->getRelatedTerms();
      if(count($relatedTerms) > 0)  { ?>
        <ul>
          <?php $related = array(); ?>
          <?php foreach($relatedTerms as $relatedTerm) { if($relatedTerm->getWord() != $term->getWord() && !in_array($relatedTerm->getWord(), $related)) { ?>
            <li><?php echo link_to($relatedTerm->getWord(), '@term?term='.$relatedTerm->getSlug())?></li>
            <?php $related[] = $relatedTerm->getWord() ?>
          <?php } }?>
         </ul>
        <div class="clear"></div>
     <?php }?>
    </div>

    <div class="likes">
        <iframe frameborder="0" scrolling="no" allowtransparency="true" style="border: medium none; overflow: hidden; width: 450px; height: 25px;" src="http://www.facebook.com/plugins/like.php?href=<?php echo $sf_request->getUri().'/id/'.$term->getId();?>&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=25"></iframe>
    </div>
    <span  class='st_sharethis' displayText='share'></span>
    <script type="text/javascript">var switchTo5x=false;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher:'04c6cf4b-968f-4f4f-8310-5a7cad92f359'});</script>
    <div class="clear"></div>
    
    <div>
        <?php echo 'by '.$term->getAuthorName().' '.$term->getAuthorEmail(). ' '. format_date($term->getCreatedAt(), 'D')?>
    </div>
</div>




<?php } } ?>

<script type="text/javascript">
function mycarousel_initCallback(carousel) {
  if(<?php echo $slide ?>)
  {
    jQuery(document).ready(function(){
     carousel.scroll(<?php echo $slide ?>);
    });
  }
}

jQuery(document).ready(function() {

    jQuery('#mycarousel').jcarousel({
        vertical: true,
        initCallback: mycarousel_initCallback,
        scroll: 1
    });
});

</script>
<?php slot('leftBar') ?>
  <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
      <?php
        if($allTerms)
        {
          foreach($allTerms as $key=>$term)
          {
            // If first
            if($key == 0)
            {
              echo '<li>';
            } else
            {
              // If end
              if($key%28 == 0)
              {
                echo '</li><li>';
              }
            }

            $isSelected = $term->getSlug() == $word ? ' class="selected"' : '';
            echo '<p'.$isSelected.'>'.link_to($term->getWord(), '@term?term='.$term->getSlug()).'</p>';

            // If last
            if($key == count($allTerms)-1 && $key%28 != 0)
            {
              echo '</li>';
            }
          }
        }
      ?>
  </ul>
<?php end_slot() ?>