<?php

class Model_Group extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'school_id',
		'group_name',
		'group_member1',
		'group_member2',
		'group_member3',
		'group_member4',
		'group_member5',
		'condition',
		'created_at',
		'updated_at',
		'records',
		'event_id',
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
	protected static $_table_name = 'groups';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('school_id',     'School Id',    'valid_string[numeric]');
		$val->add_field('group_name',    'Group Name',   'max_length[255]');
		$val->add_field('group_member1', 'Group Name 1', 'max_length[255]');
		$val->add_field('group_member2', 'Group Name 2', 'max_length[255]');
		$val->add_field('group_member3', 'Group Name 3', 'max_length[255]');
		$val->add_field('group_member4', 'Group Name 4', 'max_length[255]');
		$val->add_field('group_member5', 'Group Name 5', 'max_length[255]');
		$val->add_field('condition',     'Condition',    'valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
    	'school' => array(
    		'model_to' => 'Model_School',
    		'key_from' => 'school_id',
    		'key_to' => 'id',
    		'cascade_save' => false,
    		'cascade_delete' => false
    	),
    	'event' => array(
    		'model_to' => 'Model_Event',
    		'key_from' => 'event_id',
    		'key_to' => 'id',
    		'cascade_save' => false,
    		'cascade_delete' => false
    	)
  	);


}
