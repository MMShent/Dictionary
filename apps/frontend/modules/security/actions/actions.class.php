<?php

/**
 * security actions.
 *
 * @package    wiki
 * @subpackage security
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class securityActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request)
  {
    $this->terms = Doctrine::getTable('Term')->getTerms4Slider();
  }

  public function executeSignin(sfWebRequest $request)
  {
    $userParams = $request->getParameter('user');
    $user = $this->getUser();

    if($userParams['login'] == 'admin' && $userParams['pass'] == 'nqma5')
    {
      $user->setAuthenticated(true);
      $user->setAttribute('lang', 'bg');
      $this->redirect('@approveList');
    }else
    {
      $message = array('type' => 'error', 'text' => 'Wrong credentials!');
      $user->setAttribute('message', $message);
      $this->redirect('security/login');
    }
  }

  public function executeSignout(sfWebRequest $request)
  {
    $this->getUser()->setAuthenticated(false);
    $this->redirect('@homepage');
  }

}
