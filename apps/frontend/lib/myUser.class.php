<?php

class myUser extends sfBasicSecurityUser
{
  public function showMessage()
  {
    $message = $this->getAttribute('message');
    $this->setAttribute('message', null);
    return $message;
  }

  public function showMessages()
  {
    $messages = $this->getAttribute('messages');

    if(isset($messages['success']))
    {
        echo '<div class="rounded success messages">';
        foreach($messages['success'] as $message)
        {
            echo $message.'<br />';
        }
        echo '</div>';
    }

    if(isset($messages['error']))
    {
        echo '<div class="rounded error messages">';
        foreach($messages['error'] as $message)
        {
            echo $message.'<br />';
        }
        echo '</div>';
    }

    self::setAttribute('messages', null);
  }

  public function getScriptName()
  {
    $config = sfContext::getInstance()->getConfiguration();

    if($config->getEnvironment() == 'dev')
    {
        $result = '/'.$config->getApplication().'_'.$config->getEnvironment().'.php';
    }else
    {
        $result = '/'.$config->getApplication().'.php';
    }

    if($config->getApplication() == 'frontend')
    {
      $result = '/index.php';
    }

    return $result;
  }

  public static function p($v)
  {
    echo '<pre>';
      print_r($v);
    echo '<pre>';
  }

  public static function pd($v)
  {
    self::p($v);
    die;
  }

  public static function v($v)
  {
    echo '<pre>';
      var_dump($v);
    echo '<pre>';
  }

  public static function vd($v)
  {
    self::v($v);
    die;
  }
}