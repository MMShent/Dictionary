<?php slot('rightBar') ?>
    <div>
        SOME ADDS GOES HERE ...
    </div>
<?php end_slot() ?>


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
        if($terms)
        {
          foreach($terms as $key=>$term)
          {
            if($key%28 == 0) { echo '</li>'; }
            if($key%28 == 0 || $key == 0) { echo '<li>'; }

            echo '<p>'.link_to($term->getWord(), '@term?term='.$term->getWord()).'</p>';
          }
        }
      ?>
  </ul>
<?php end_slot() ?>
