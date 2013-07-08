<?php

class Controller_Manage_School extends Controller_Manage
{	
	public function action_index()
	{
		$data['schools'] = Model_School::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(登録高校管理画面)');
 		$view->content=View::forge('manage/school/index', $data);
 		return $view;
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('manage/school');

		if ( ! $data['school'] = Model_School::find($id))
		{
			Session::set_flash('error', 'Could not find school #'.$id);
			Response::redirect('manage/school');
		}

		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(登録高校詳細)');
 		$view->content=View::forge('manage/school/view', $data);
 		return $view;

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_School::validate('create');
			
			if ($val->run())
			{
				$school = Model_School::forge(array(
					'school_name' => Input::post('school_name'),
					'school_url' => Input::post('school_url'),
					'condition' => 1,
				));

				//重複確認
				$school_count=Model_School::find('all', array('where' => array('school_name' => $school->school_name)));
				if($school_count>0){
					Session::set_flash('error', '既に該当高校が登録されています');
					Response::redirect('manage/school');
				}
				if ($school and $school->save())
				{
					Session::set_flash('success', 'Added school #'.$school->id.'.');

					Response::redirect('manage/school');
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

 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(新規高校登録画面)');
 		$view->content=View::forge('manage/school/create');
 		return $view;
	}

	public function action_edit($id = null)
	{
		$view=View::forge('layout/manage');
		is_null($id) and Response::redirect('manage/school');

		if ( ! $school = Model_School::find($id))
		{
			Session::set_flash('error', '指定されたidの高校は存在しません');
			Response::redirect('manage/school');
		}

		$val = Model_School::validate('edit');

		if ($val->run())
		{
			$school->school_name = Input::post('school_name');
			$school->school_url = Input::post('school_url');

			if ($school->save())
			{
				Session::set_flash('success', '更新成功');
				Response::redirect('manage/school');
			}
			else
			{
				Session::set_flash('error', '更新失敗');
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{
				$school->school_name = $val->validated('school_name');
				$school->school_url = $val->validated('school_url');
				Session::set_flash('error', $val->error());
			}
			$view->set_global('school', $school, false);
		}

 		$view->set_global('title','水ロケット管理システム(既存高校情報編集画面)');
 		$view->content=View::forge('manage/school/edit');
 		return $view;

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('manage/school');

		if ($school = Model_School::find($id))
		{
			$school->delete();
			Session::set_flash('success', '指定された高校情報を削除しました');
		}
		else
		{
			Session::set_flash('error', '指定された高校情報の削除に失敗しました。');
		}

		Response::redirect('manage/school');

	}


}
