<html>
  <head></head>
  <body>
    <h3 style="text-align: center;">Comming soon ..</h3>
  </body>
</html>
<?php

die();

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
