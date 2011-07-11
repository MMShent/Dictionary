<?php

/**
 * TermHasTags form base class.
 *
 * @package    form
 * @subpackage term_has_tags
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseTermHasTagsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'term_id' => new sfWidgetFormInputHidden(),
      'tag_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'term_id' => new sfValidatorDoctrineChoice(array('model' => 'TermHasTags', 'column' => 'term_id', 'required' => false)),
      'tag_id'  => new sfValidatorDoctrineChoice(array('model' => 'TermHasTags', 'column' => 'tag_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('term_has_tags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TermHasTags';
  }

}
