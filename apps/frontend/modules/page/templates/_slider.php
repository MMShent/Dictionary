<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 1
    });
});

</script>
<ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
    <?php
      if($terms)
      {
        foreach($terms as $key=>$term)
        {
          if($key%28 == 0) { echo '</li>'; }
          if($key%28 == 0 || $key == 0) { echo '<li>'; }

          echo '<p>'.link_to($term->getWord(), '@term?term='.$term->getSlug()).'</p>';
        }
      }
    ?>
</ul>