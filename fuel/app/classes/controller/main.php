<?php

class Controller_Main extends Controller
{
	public function action_index()
	{
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/index');
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}
