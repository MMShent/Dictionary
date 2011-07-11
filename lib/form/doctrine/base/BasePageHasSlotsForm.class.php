<?php

/**
 * PageHasSlots form base class.
 *
 * @package    form
 * @subpackage page_has_slots
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasePageHasSlotsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'page_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Page', 'add_empty' => false)),
      'slot_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Slot', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => 'PageHasSlots', 'column' => 'id', 'required' => false)),
      'page_id' => new sfValidatorDoctrineChoice(array('model' => 'Page')),
      'slot_id' => new sfValidatorDoctrineChoice(array('model' => 'Slot')),
    ));

    $this->widgetSchema->setNameFormat('page_has_slots[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageHasSlots';
  }

}
