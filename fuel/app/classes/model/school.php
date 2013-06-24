<?php

class Model_School extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'school_name',
		'school_url',
		'condition',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'schools';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('school_name', 'School Name', 'required|max_length[255]');
		$val->add_field('school_url', 'School URL', 'max_length[255]');
		$val->add_field('condition', 'Condition', 'valid_string[numeric]');

		return $val;
	}

	protected static $_has_many = array(
        'groups' => array(
        	'key_from' => 'id',
        	'model_to' => 'Model_Group',
        	'key_to' => 'school_id',
        	'cascade_save' => FALSE,
        	'cascade_delete' => FALSE,
        )
    );

}
