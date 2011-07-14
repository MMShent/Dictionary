<div id="footer">
    <?php if (!include_slot('footer')){ ?>
      <div class="rounded">

        FOOTER ADD

      </div>
    <?php } ?>

    <div id="footerLinks">
      Tactical Dictionary ©2011
      <a href="<?php echo url_for('@termsOfService')?>">Terms of Service</a>
      <a href="<?php echo url_for('@privacy')?>">Privacy</a>
      <a href="<?php echo url_for('@feedback')?>">Feedback</a>
      <a href="<?php echo url_for('@ads')?>">Advertise</a>
    </div>

</div>
