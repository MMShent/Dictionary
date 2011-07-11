<?php

/**
 * term actions.
 *
 * @package    wiki
 * @subpackage term
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class termActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->term_list = Doctrine::getTable('Term')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TermForm();
    $this->terms = Doctrine::getTable('Term')->getTerms4Slider();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TermForm();

    $this->processForm($request, $this->form);
    $this->terms = Doctrine::getTable('Term')->getTerms4Slider();
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($term = Doctrine::getTable('Term')->find(array($request->getParameter('id'))), sprintf('Object term does not exist (%s).', $request->getParameter('id')));
    $this->form = new TermForm($term);
    $this->terms = Doctrine::getTable('Term')->getTerms4Slider();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($term = Doctrine::getTable('Term')->find(array($request->getParameter('id'))), sprintf('Object term does not exist (%s).', $request->getParameter('id')));
    $this->form = new TermForm($term);

    $this->processForm($request, $this->form);
    $this->terms = Doctrine::getTable('Term')->getTerms4Slider();
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($term = Doctrine::getTable('Term')->find(array($request->getParameter('id'))), sprintf('Object term does not exist (%s).', $request->getParameter('id')));
    $term->delete();

    $this->redirect('term/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {

    $params = $request->getParameter($form->getName());
    $params['likes'] = $form->getObject()->isNew() ? 0 : $form->getObject()->getLikes();
    $params['verified'] = 1;
    $params['approved'] = 1;
    
    $form->bind($params);

    if ($form->isValid())
    {
      $term = $form->save();

      $this->redirect('term/edit?id='.$term->getId());
    }
  }

  public function executeImport(sfWebRequest $request)
  {
      $file = sfConfig::get('sf_root_dir').'/doc/terms.csv';
      $data = file_get_contents($file);

      $all = explode("\r\n", $data);
      foreach ($all as $item)
      {
          $parts = explode('","', $item);
          $parts[0] = trim(substr($parts[0], 1));
          $parts[1] = trim(substr($parts[1], 0, strlen($parts[1])-1));

          $term = new Term();
          $term->setWord($parts[0]);
          $term->setDefinition($parts[1]);
          $term->setAuthorName('author');
          $term->setAuthorEmail('info@skdtac.com');
          $term->setApproved(true);
          $term->save();

          myUser::p($term->getId());
      }

      myUser::pd('Import completed.');
  }

  public function executeApproveList(sfWebRequest $request)
  {
    $this->terms = Doctrine::getTable('Term')
              ->createQuery('t')
              ->where('t.approved = ?', false)
              ->execute();

    $this->terms4Slider = Doctrine::getTable('Term')->getTerms4Slider();
  }

  public function executeApprove(sfWebRequest $request)
  {
    $term = Doctrine::getTable('Term')->find($request->getParameter('id'));
    $term->setApproved(1);
    $term->save();
    
    $this->redirect('@approveList');
  }

  public function executeDecline(sfWebRequest $request)
  {
    $term = Doctrine::getTable('Term')->find($request->getParameter('id'));
    $term->setApproved(-1);
    $term->save();

    $this->redirect('@approveList');
  }
}
