<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Term filter form base class.
 *
 * @package    filters
 * @subpackage Term *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseTermFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'word'            => new sfWidgetFormFilterInput(),
      'authorName'      => new sfWidgetFormFilterInput(),
      'authorEmail'     => new sfWidgetFormFilterInput(),
      'definition'      => new sfWidgetFormFilterInput(),
      'example'         => new sfWidgetFormFilterInput(),
      'likes'           => new sfWidgetFormFilterInput(),
      'verified'        => new sfWidgetFormFilterInput(),
      'approved'        => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'slug'            => new sfWidgetFormFilterInput(),
      'definition_slug' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'word'            => new sfValidatorPass(array('required' => false)),
      'authorName'      => new sfValidatorPass(array('required' => false)),
      'authorEmail'     => new sfValidatorPass(array('required' => false)),
      'definition'      => new sfValidatorPass(array('required' => false)),
      'example'         => new sfValidatorPass(array('required' => false)),
      'likes'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'verified'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'approved'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'slug'            => new sfValidatorPass(array('required' => false)),
      'definition_slug' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('term_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Term';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'word'            => 'Text',
      'authorName'      => 'Text',
      'authorEmail'     => 'Text',
      'definition'      => 'Text',
      'example'         => 'Text',
      'likes'           => 'Number',
      'verified'        => 'Number',
      'approved'        => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'slug'            => 'Text',
      'definition_slug' => 'Text',
    );
  }
}