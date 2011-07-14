<div class="main">

   <?php
      if(isset($emailSent))
      {
        echo '<div id="mailSent">Thank you! Your feedback was submitted. We will review it shortly.</div>';
      }
    ?>

  <form id="feedbackForm" method="post" action="<?php echo url_for(@feedback) ?>">
    <h3>Feedback form</h3>
    <textarea cols="30" rows="4" name="feedback[text]"></textarea><br />
    <div class="label">Subject:</div>
    <input type="text" class="text" name="feedback[subject]" /><br />
    <div class="label">Email:</div>
    <input type="text" class="text" name="feedback[email]" /><br />
    <input type="submit" value="Submit Query" />
  </form>
  <br /><br />
 

</div>
