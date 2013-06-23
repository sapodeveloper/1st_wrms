<?php

class Controller_Manage_Group extends Controller_Manage
{	
	public function action_index()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(グループ管理画面)');
 		$view->header=View::forge('layout/manage_header');
 		$view->side_menu=View::forge('manage/side_menu');
 		$view->content=View::forge('manage/index');
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}