<?php

/**
 * Term form base class.
 *
 * @package    form
 * @subpackage term
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseTermForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'word'        => new sfWidgetFormInput(),
      'authorName'  => new sfWidgetFormInput(),
      'authorEmail' => new sfWidgetFormInput(),
      'definition'  => new sfWidgetFormTextarea(),
      'example'     => new sfWidgetFormTextarea(),
      'likes'       => new sfWidgetFormInput(),
      'verified'    => new sfWidgetFormInput(),
      'approved'    => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Term', 'column' => 'id', 'required' => false)),
      'word'        => new sfValidatorString(array('max_length' => 100)),
      'authorName'  => new sfValidatorString(array('max_length' => 100)),
      'authorEmail' => new sfValidatorString(array('max_length' => 255)),
      'definition'  => new sfValidatorString(array('max_length' => 10000)),
      'example'     => new sfValidatorString(array('max_length' => 10000, 'required' => false)),
      'likes'       => new sfValidatorInteger(),
      'verified'    => new sfValidatorInteger(),
      'approved'    => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('term[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Term';
  }

}
