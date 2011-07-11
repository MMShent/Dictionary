<script type="text/javascript">
function mycarousel_initCallback(carousel) {
  if(1)
  {
    jQuery(document).ready(function(){
     carousel.scroll(0);
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
<ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
    <?php
     if($terms)
        {
          foreach($terms as $key=>$term)
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
            
            echo '<p>'.link_to($term->getWord(), '@term?term='.$term->getSlug()).'</p>';

            // If last
            if($key == count($terms)-1 && $key%28 != 0)
            {
              echo '</li>';
            }
          }
        }
    ?>
</ul>