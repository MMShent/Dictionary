<?php
// auto-generated by sfViewConfigHandler
// date: 2011/05/31 23:34:54
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('skin.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addJavascript('jquery-1.5.2-min.js', '', array ());
  $response->addJavascript('jquery.jcarousel.js', '', array ());
  $response->addJavascript('main.js', '', array ());


