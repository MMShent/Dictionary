<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * PageHasSlots filter form base class.
 *
 * @package    filters
 * @subpackage PageHasSlots *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasePageHasSlotsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'page_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Page', 'add_empty' => true)),
      'slot_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Slot', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'page_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Page', 'column' => 'id')),
      'slot_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Slot', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('page_has_slots_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageHasSlots';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'page_id' => 'ForeignKey',
      'slot_id' => 'ForeignKey',
    );
  }
}