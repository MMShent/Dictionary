<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseTerm extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('term');
        $this->hasColumn('word', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '100',
             ));
        $this->hasColumn('authorName', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '100',
             ));
        $this->hasColumn('authorEmail', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('definition', 'string', 10000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '10000',
             ));
        $this->hasColumn('example', 'string', 10000, array(
             'type' => 'string',
             'length' => '10000',
             ));
        $this->hasColumn('likes', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('verified', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '1',
             ));
        $this->hasColumn('approved', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => '1',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('quote_identifier', true);
        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('TermHasTags', array(
             'local' => 'id',
             'foreign' => 'term_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}