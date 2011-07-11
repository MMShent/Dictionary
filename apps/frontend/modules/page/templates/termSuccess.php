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

    <div class="share">
      <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_preferred_1"></a>
        <a class="addthis_button_preferred_2"></a>
        <a class="addthis_button_preferred_3"></a>
        <a class="addthis_button_preferred_4"></a>
        <a class="addthis_button_compact"></a>
        <a class="addthis_counter addthis_bubble_style"></a>
      </div>
      <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4de4e47e2a6f67a3"></script>
    </div>
    <div class="likes">
        <iframe frameborder="0" scrolling="no" allowtransparency="true" style="border: medium none; overflow: hidden; width: 450px; height: 25px;" src="http://www.facebook.com/plugins/like.php?href=<?php echo $sf_request->getUri().'/id/'.$term->getId();?>&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=25"></iframe>
    </div>
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
    jQuery(document).ready(function() {
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
            if($key%28 == 0) { echo '</li>'; }
            if($key%28 == 0 || $key == 0) { echo '<li>'; }

            $isSelected = $term->getWord() == $word ? ' class="selected"' : '';
            echo '<p'.$isSelected.'>'.link_to($term->getWord(), '@term?term='.$term->getWord()).'</p>';
          }
        }
      ?>
  </ul>
<?php end_slot() ?>