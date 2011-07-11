<?php 
  $message = $sf_user->showMessage();
  if($message) {
?>
  <div class="message rounded <?php echo $message['type']?>">
    <?php echo $message['text'] ?>
  </div>
<?php } ?>


<div id="login">

  <div class="form rounded">

    <form id="loginForm" action="<?php echo url_for('security/signin') ?>" method="post">

      <div class="item">
        <label for="user">Username:</label>
        <input type="text" id="user" name="user[login]" />
      </div>

      <div class="item">
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="user[pass]" />
      </div>
      
      <div class="item">
        <input type="submit" value="Вход" />
      </div>
      
    </form>

  </div>

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