<?php

class Controller_Manage_Group extends Controller_Manage
{	
	public function action_index()
	{
		$data['groups'] = Model_Group::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(グループ管理画面)');
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('group/index', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Group::validate('create');
			
			if ($val->run())
			{
				$group = Model_Group::forge(array(
					'school_id' => Input::post('school_id'),
					'group_name' => Input::post('group_name'),
					'group_member1' => Input::post('group_member1'),
					'group_member2' => Input::post('group_member2'),
					'group_member3' => Input::post('group_member3'),
					'group_member4' => Input::post('group_member4'),
					'group_member5' => Input::post('group_member5'),
					'condition' => 1,
				));

				if ($group and $group->save())
				{
					Session::set_flash('success', 'Added school #'.$group->id.'.');

					Response::redirect('index/manage/group');
				}

				else
				{
					Session::set_flash('error', 'Could not save school.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		
		$school_data=Model_Create_School::find('all');
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;

 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(新規グループ登録画面)');
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('group/create',$data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}
