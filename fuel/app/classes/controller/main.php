<?php

class Controller_Main extends Controller
{
	public function action_index()
	{
		$data['records'] = Model_Record::find('all', array('where' => array('condition' => 1), 'order_by' => array('x_distance' => 'desc'), 'limit' => 10));
 		$data['wait_group_lists'] = Model_EntryLists::find('all', array('where' => array(array('condition' => 1),'or' => array(array('condition' => 2),'or' => array(array('condition' => 3)))),'order_by' => array('condition' => 'desc')));
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/index', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_CreateGroup()
	{
		if (Input::method() == 'POST')
		{
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
				));

				if ($group and $group->save())
				{
					$wgl = Model_EntryLists::forge(array(
						'group_id' => $group->id,
						'condition' => 1,
					));

					if ($wgl and $wgl->save())
					{
						Session::set_flash('success', 'エントリーを受け付けました');
						Response::redirect('/');
					}
					else
					{
						Session::set_flash('error', 'エントリーに失敗しました。お近くのスタッフまでお願いします。');
					}
					Session::set_flash('success', '新規グループを作成しエントリーしました！');

					Response::redirect('');
				}

				else
				{
					Session::set_flash('error', 'お近くのスタッフにお声をおかけください。');
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
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/create_group',$data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_NewSchool()
	{
		$view=View::forge('main/new_school');
 		return $view;
	}


}
