<?php

/**
 * Slot form base class.
 *
 * @package    form
 * @subpackage slot
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseSlotForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInput(),
      'position' => new sfWidgetFormInput(),
      'title'    => new sfWidgetFormInput(),
      'content'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorDoctrineChoice(array('model' => 'Slot', 'column' => 'id', 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255)),
      'position' => new sfValidatorString(array('max_length' => 100)),
      'title'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'  => new sfValidatorString(array('max_length' => 100000, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slot[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slot';
  }

}
