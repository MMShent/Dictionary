<div id="adsPage">

  <?php
    if(isset($emailSent))
    {
      echo '<div id="mailSent">Thank you! Your submittion. We will review it shortly.</div>';
    }

    if(!empty($errorMessage))
    {
      echo '<div class="errorMessage">'.$errorMessage.'</div>';
    }
  ?>

  <h3>Advertise on Tacticaldictionary.com</h3>
  <br />
  <span>If you're looking to reach this audience, we'd love to speak with you.</span>

  <form action="" method="POST">

    <table id="adsTable" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <th>Your Name<span>*</span></th>
        <td><input name="ads[name]" type="text" class="text" /></td>
      </tr>
      <tr>
        <th>Your email address<span>*</span></th>
        <td><input name="ads[email]" type="text" class="text" /></td>
      </tr>
      <tr>
        <th>Campaign budget:</th>
        <td><input name="ads[budget]" type="text" class="text" /></td>
      </tr>
      <tr>
        <th>Campaign dates:</th>
        <td><input name="ads[dates]" type="text" class="text" /></td>
      </tr>
      <tr>
        <th>Any additional information:</th>
        <td><textarea name="ads[info]"></textarea></td>
      </tr>
      <tr>
        <th>&nbsp;</th>
        <td><input type="submit" class="rounded" value="Send Request" /></td>
      </tr>
    </table>

  </form>


</div>