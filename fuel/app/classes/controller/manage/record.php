<?php

class Controller_Manage_Record extends Controller_Manage
{	
	public function action_index()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/index');
 		return $view;
	}
}
