<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BasePage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('page');
        $this->hasColumn('template_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '100',
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('content', 'string', 100000, array(
             'type' => 'string',
             'length' => '100000',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('quote_identifier', true);
        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('Template', array(
             'local' => 'template_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasMany('PageHasSlots', array(
             'local' => 'id',
             'foreign' => 'page_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}