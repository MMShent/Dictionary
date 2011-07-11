<div id="verify">
  Dear <?php echo $term->getAuthorName()?>,<br />
  you just verify the new term submition.<br />
  Now our support team will review it and approve it shortly.<br /><br />
  Thank you!
</div>

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