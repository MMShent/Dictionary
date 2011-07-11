<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php if (!include_slot('title')){ ?>
      <title>Tactiacldictionary.com</title>
    <?php } ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <script type="text/javascript">
      var scriptName = '<?php echo $sf_user->getScriptName()?>';
    </script>
  </head>
  <body>
      <div id="container">
        <?php include_partial('global/header')?>

        <div id="leftBar" class="rounded">
            <?php if (!include_slot('leftBar')){ ?>
              Left nav bar
            <?php } ?>
        </div>

        <div id="main" class="rounded"><?php echo $sf_content ?></div>

        <div id="rightBar" class="rounded">
            <?php if (!include_slot('rightBar')){ ?>
              Right Add space
            <?php } ?>
        </div>

        <div class="clear"></div>

        <?php include_partial('global/footer')?>
      </div>
  </body>
</html>
