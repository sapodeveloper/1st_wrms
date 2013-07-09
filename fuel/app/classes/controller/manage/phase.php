<?php

class Controller_Manage_Phase extends Controller_Manage
{	
	public function action_index()
	{
		$data['all_entry_phase'] = Model_EntryLists::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(打ち上げ管制管理画面)');
 		$view->content=View::forge('manage/phase/index', $data);
 		return $view;
	}

	public function action_forward($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/phase');
		}
		if($wgl->condition == 7)
		{
			$wgl->condition = 2;	
		}
		else{
			$wgl->condition = $wgl->condition + 1;
		}
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/phase');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/phase');
		}
	}

	public function action_back($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/phase');
		}
		$wgl->condition = $wgl->condition - 1;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/phase');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/phase');
		}
	}

	public function action_outlist($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/phase');
		}
		$wgl->condition = 5;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/phase');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/phase');
		}
	}

	public function action_decline($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/phase');
		}
		$wgl->condition = 6;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/phase');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/phase');
		}
	}

		public function action_repair($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/phase');
		}
		$wgl->condition = 7;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/phase');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/phase');
		}
	}
}