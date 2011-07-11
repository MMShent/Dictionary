<?php

/**
 * Page form base class.
 *
 * @package    form
 * @subpackage page
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'template_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Template', 'add_empty' => false)),
      'name'        => new sfWidgetFormInput(),
      'title'       => new sfWidgetFormInput(),
      'url'         => new sfWidgetFormInput(),
      'content'     => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'template_id' => new sfValidatorDoctrineChoice(array('model' => 'Template')),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'     => new sfValidatorString(array('max_length' => 100000, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Page', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

}
