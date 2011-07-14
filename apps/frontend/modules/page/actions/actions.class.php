<?php

/**
 * page actions.
 *
 * @package    wiki
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class pageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }

  public function executeTerm(sfWebRequest $request)
  {
      $this->word = $term = $request->getParameter('term');
      $this->allTerms = Doctrine::getTable('Term')->getTerms4Slider();
      $this->slide = Doctrine::getTable('Term')->getSlideFromWord($term);

      $terms = Doctrine::getTable('Term')->getTerm($term);
      if($terms)
      {
        ini_set("max_execution_time", 0);
        ini_set("memory_limit", "10000M");

        $likes = array();
        $urls = array();
        foreach($terms as $term)
        {
          $url = 'http://api.facebook.com/restserver.php?method=links.getStats&urls='.$request->getUri().'/id/'.$term->getId();
          $user_agent = "My Awesome API Client v1.0";
          ob_start();
          passthru("wget -U '{$user_agent}' -q -O - '{$url}'");
          $response = ob_get_contents();
          ob_end_clean();
          $xml = simplexml_load_string($response);
          if($xml instanceof SimpleXMLElement)
          {
            $realLikes = (int)$xml->link_stat[0]->like_count;
            $term->setLikes($realLikes);
            $term->save();
          } 
        }
      }
      $this->terms = Doctrine::getTable('Term')->getTerm($request->getParameter('term'));

      
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TermForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TermForm();

    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $params = $request->getParameter($form->getName());
    $params['likes'] = $form->getObject()->isNew() ? 0 : $form->getObject()->getLikes();
    $params['approved'] = 0;
    $params['verified'] = 0;

    $form->bind($params);

    if ($form->isValid())
    {
      $form->save();
      $this->getUser()->setFlash('new', 'To publish your term or edit it again you need to check your mail now and use the links in it!');

      $data[0] = $form->getObject()->getAuthorEmail();
      $data[1] = $form->getObject()->getId();
      Tools::sendVerificationEmail($data);
    }
  }

  protected function processVerifiedForm(sfWebRequest $request, sfForm $form)
  {
    $params = $request->getParameter($form->getName());
    $params['likes'] = $form->getObject()->getLikes();
    $params['approved'] = 0;
    $params['verified'] = 1;

    $form->bind($params);

    if ($form->isValid())
    {
      $form->save();
      $this->getUser()->setFlash('new', 'We will review your submition shortly. Thank you!');

      $data[0] = $form->getObject()->getAuthorEmail();
      $data[1] = $form->getObject()->getId();
      Tools::sendInformationEmail();
    }
  }

  public function executeChar(sfWebRequest $request)
  {

    $char = $request->getParameter('char');

    if($char != '0')
    {
      $this->terms = Doctrine::getTable('Term')
              ->createQuery('t')
              ->select('distinct(t.word) as word, t.slug as slug')
              ->where('t.word LIKE ?', $char.'%')
              ->addWhere('t.approved = ?', true)
              ->orderBy('t.word asc')
              ->execute();
    }else
    {
      $this->terms = Doctrine::getTable('Term')
              ->createQuery('t')
              ->select('distinct(t.word) as word, t.slug as slug')
              ->where('SUBSTRING(t.word, 1, 1) = 5')
              ->addWhere('t.approved = ?', true)
              ->orderBy('t.word asc')
              ->execute();
    }

    $this->setLayout('bigLayout');
  }

  public function executeVerify(sfWebRequest $request)
  {
    $hash = base64_decode($request->getParameter('hash'));

    $params = explode('!!', $hash);

    $term = Doctrine::getTable('Term')->find($params[1]);
    $term->setVerified(1);
    $term->save();

    Tools::sendInformationEmail();
    $this->term = $term;
  }

  public function executeTermEdit(sfWebRequest $request)
  {
    $this->forward404Unless($request->getParameter('hash'));

    $params = explode('!!', base64_decode($request->getParameter('hash')));
    $termId = $params[1];

    $this->forward404Unless($term = Doctrine::getTable('Term')->find($termId), sprintf('Object term does not exist (%s).', $request->getParameter('id')));
    $this->form = new TermForm($term);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($term = Doctrine::getTable('Term')->find(array($request->getParameter('id'))), sprintf('Object term does not exist (%s).', $request->getParameter('id')));
    
    $this->form = new TermForm($term);

    $this->processVerifiedForm($request, $this->form);

    $this->setTemplate('termEdit');
  }

  public function executeStaticPage(sfWebRequest $request)
  {
    $this->page = $request->getParameter('page');
  }


  public function executeFeedback(sfWebRequest $request)
  {
    if($request->getParameter('feedback'))
    {
      Tools::sendFeedbackEmail($request->getParameter('feedback'));
      $this->emailSent = true;
    }
  }

  public function executeSearch(sfWebRequest $request)
  {
    $term = $request->getParameter('term');
    $this->terms = Doctrine::getTable('Term')
              ->createQuery('t')
              ->select('distinct(t.word) as word, t.slug as slug')
              ->where('t.word LIKE ?', $term.'%')
              ->addWhere('t.approved = ?', true)
              ->orderBy('t.word asc')
              ->execute();
  }

  public function executeDown(sfWebRequest $request)
  {
     Doctrine::getTable('Term')->down();
  }

  public function executeUp(sfWebRequest $request)
  {
    Doctrine::getTable('Term')->up();
  }

  public function executeAds(sfWebRequest $request)
  {
    $data = $request->getParameter('ads');

    if($data)
    {
      $noErrors = true;
      if(empty($data['name']))
      {
        $this->errorMessage = 'Your name is required. Please fill the text field bellow!';
        $noErrors = false;
      } else if(empty($data['email']))
      {
        $this->errorMessage = 'Your email is required. Please fill the text field bellow!';
        $noErrors = false;
      }

      if($noErrors)
      {
        Tools::sendAdsEmail($data);
        $this->emailSent = true;
      } // if
    } // if
  } // Eof
} // Eoc
