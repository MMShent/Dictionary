<?php

//ini_set('mysql.default_socket','/tmp/mysql.sock');

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.
/*
if (!in_array(@$_SERVER['REMOTE_ADDR'], 
   array('127.0.0.1', 'dev1.mentormate.com', 'dev2.mentormate.com', '78.90.177.7', '46.249.76.133', '::1')))
{
  die('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}
*/
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
