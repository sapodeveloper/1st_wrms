<?php

class Model_EntryLists extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'group_id',
		'condition',
		'decline_condition',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);
	protected static $_table_name = 'entry_lists';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('group_id','Group Id','required|valid_string[is_numeric]');
		$val->add_field('condition','Condition','valid_string[numeric]');
		$val->add_field('decline_condition','DeclineCondition','valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
		'group' => array(
			'model_to' => 'Model_Group',
			'key_from' => 'group_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false
		)
	);
	
}