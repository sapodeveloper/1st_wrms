<?php

class Controller_Manage_Entry extends Controller_Manage
{
	public function action_index()
	{
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(エントリー管理画面)');
 		$view->content=View::forge('manage/entry/index');
 		return $view;
	}

	public function action_regular_entry()
	{
		$school_data = Model_School::find('all');
		$data['school_data'][0] = '----------高校を選択してください----------';
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(エントリー管理画面)');
 		$view->content=View::forge('manage/entry/regular_entry', $data);
 		return $view;
	}

	public function action_irregular_entry()
	{
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(エントリー管理画面)');
 		$view->content=View::forge('manage/entry/irregular_entry');
 		return $view;
	}

	public function action_entry_group($id = null)
	{
		$entry = Model_Entry::forge(array(
			'group_id' => $id,
			'condition' => 1,
			'decline_condition' => 0,
		));
		if ($entry and $entry->save())
		{
			Session::set_flash('success', 'エントリーを受け付けました');
			Response::redirect('manage/entry');
		}
	}

	public function action_group_list($id = null)
	{
		$event_data = Model_Event::find('first', array('where' => array('condition' => 1)));
		if($event_data)
		{
			$event_id = $event_data->id;			
		}
		else
		{
			$event_id = 9999;
		}
		$data['groups']  = Model_Group::find('all', array('where' => array(array('school_id' => $id),array('event_id' => $event_id))));
 		$view=View::forge('manage/entry/group_list', $data);
 		return $view;
	}
}