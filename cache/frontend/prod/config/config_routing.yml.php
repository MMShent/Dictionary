<?php
// auto-generated by sfRoutingConfigHandler
// date: 2011/05/31 22:26:10
return array(
'feedback' => new sfRoute('/feedback', array (
  'module' => 'page',
  'action' => 'feedback',
), array (
), array (
)),
'termsOfService' => new sfRoute('/terms-of-service', array (
  'module' => 'page',
  'action' => 'staticPage',
  'page' => 'termsOfService',
), array (
), array (
)),
'privacy' => new sfRoute('/privacy', array (
  'module' => 'page',
  'action' => 'staticPage',
  'page' => 'privacy',
), array (
), array (
)),
'aboutUs' => new sfRoute('/about-us', array (
  'module' => 'page',
  'action' => 'staticPage',
  'page' => 'aboutUs',
), array (
), array (
)),
'adminEditTerm' => new sfRoute('/term/:id/edit', array (
  'module' => 'term',
  'action' => 'edit',
), array (
), array (
)),
'login' => new sfRoute('/login', array (
  'module' => 'security',
  'action' => 'login',
), array (
), array (
)),
'termEdit' => new sfRoute('/edit/:hash', array (
  'module' => 'page',
  'action' => 'termEdit',
), array (
), array (
)),
'verify' => new sfRoute('/verify/:hash', array (
  'module' => 'page',
  'action' => 'verify',
), array (
), array (
)),
'declineTerm' => new sfRoute('/decline/:id/term', array (
  'module' => 'term',
  'action' => 'decline',
), array (
), array (
)),
'approveTerm' => new sfRoute('/approve/:id/term', array (
  'module' => 'term',
  'action' => 'approve',
), array (
), array (
)),
'approveList' => new sfRoute('/approve', array (
  'module' => 'term',
  'action' => 'approveList',
), array (
), array (
)),
'char' => new sfRoute('/char/:char', array (
  'module' => 'page',
  'action' => 'char',
), array (
), array (
)),
'term' => new sfRoute('/terms/:term', array (
  'module' => 'page',
  'action' => 'term',
), array (
), array (
)),
'homepage' => new sfRoute('/', array (
  'module' => 'page',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);
