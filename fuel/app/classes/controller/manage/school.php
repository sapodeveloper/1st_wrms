<?php

class Controller_Manage_School extends Controller_Manage
{	
	public function action_index()
	{
		$data['schools'] = Model_Create_School::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(登録高校管理画面)');
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('school/index', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('index/manage/school');

		if ( ! $data['school'] = Model_Create_School::find($id))
		{
			Session::set_flash('error', 'Could not find school #'.$id);
			Response::redirect('school');
		}

		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(登録高校詳細)');
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('school/view', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Create_School::validate('create');
			
			if ($val->run())
			{
				$school = Model_Create_School::forge(array(
					'school_name' => Input::post('school_name'),
					'school_url' => Input::post('school_url'),
					'condition' => 1,
				));

				if ($school and $school->save())
				{
					Session::set_flash('success', 'Added school #'.$school->id.'.');

					Response::redirect('index/manage/school');
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
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('school/create');
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_edit($id = null)
	{
		$view=View::forge('layout/manage');
		is_null($id) and Response::redirect('index/manage/school');

		if ( ! $school = Model_Create_School::find($id))
		{
			Session::set_flash('error', '指定されたidの高校は存在しません');
			Response::redirect('index/manage/school');
		}

		$val = Model_Create_School::validate('edit');

		if ($val->run())
		{
			$school->school_name = Input::post('school_name');
			$school->school_url = Input::post('school_url');

			if ($school->save())
			{
				Session::set_flash('success', '更新成功');
				Response::redirect('index/manage/school');
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
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('school/edit');
 		$view->footer=View::forge('layout/footer');
 		return $view;

	}
}
