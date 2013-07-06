<?php

class Model_WaitGroupList extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'group_id',
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
	protected static $_table_name = 'wait_group_list';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('group_id','Group Id','required|valid_string[is_numeric]');
		$val->add_field('condition','Condition','valid_string[numeric]');

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