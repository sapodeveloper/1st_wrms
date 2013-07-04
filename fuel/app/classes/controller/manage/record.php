<?php

class Controller_Manage_Record extends Controller_Manage
{	
	public function action_index()
	{
		$data['records'] = Model_Record::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/all_record', $data);
 		return $view;
	}

	public function action_NullAllRecord()
	{
		$data['records'] = Model_Record::find('all', array('where' => array('condition' => 0)));
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/null_all_record', $data);
 		return $view;
	}

	public function action_GroupNullRecord()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/group_null_record');
 		return $view;
	}

	public function action_SearchRecord()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/search_record');
 		return $view;
	}

}
