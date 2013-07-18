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
		if (Input::method() == 'POST')
		{
			$event_data = Model_Event::find('first', array('where' => array('condition' => 1)));
			$event_id = $event_data->id;
			if(Input::post('school_id')== "9999"){
				$school = Model_School::forge(array(
					'school_name' => Input::post('school_name'),
					'school_url' => '',
					'condition' => 1,
				));
				$school and $school->save();
				$school_id = $school->id;
			}else{
				$school_id = Input::post('school_id');
			}
			
			
			$val = Model_Group::validate('create');
			if ($val->run())
			{
				$group = Model_Group::forge(array(
					'school_id' => $school_id,
					'group_name' => Input::post('group_name'),
					'group_member1' => Input::post('group_member1'),
					'group_member2' => Input::post('group_member2'),
					'group_member3' => Input::post('group_member3'),
					'group_member4' => Input::post('group_member4'),
					'group_member5' => Input::post('group_member5'),
					'condition' => 1,
					'records' => 0,
					'event_id' => $event_id,
				));

				if ($group and $group->save())
				{
					$wgl = Model_Entry::forge(array(
						'group_id' => $group->id,
						'condition' => 1,
						'decline_condition' => 0,
					));

					if ($wgl and $wgl->save())
					{
						Session::set_flash('success', 'エントリーを受け付けました');
						Response::redirect('manage/entry');
					}
					else
					{
						Session::set_flash('error', 'エントリーに失敗しました。お近くのスタッフまでお願いします。');
					}
					Session::set_flash('success', '新規グループを作成しエントリーしました！');

					Response::redirect('');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$school_data = Model_School::find('all');
		$data['school_data'][0] = '----------高校を選択してください----------';
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;
		$data['school_data'][9999]='この中に高校が登録されてない場合はこちらを選択';
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(エントリー管理画面)');
 		$view->content=View::forge('manage/entry/irregular_entry',$data);
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

	public function action_NewSchool()
	{
		$view=View::forge('main/new_school');
 		return $view;
	}
}