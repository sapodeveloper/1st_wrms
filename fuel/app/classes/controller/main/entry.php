<?php

class Controller_Main_Entry extends Controller_Main
{
	public function action_index()
	{
		$school_data = Model_School::find('all');
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;
		$group_data  = Model_Group::find('all');
		foreach($group_data as $row):
			$data['group_data'][$row->id]=$row->group_name;
		endforeach;
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/entry/create', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}
