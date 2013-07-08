<?php

class Controller_Record extends Controller
{
	public function action_index()
	{
 		$view=View::forge('layout/record');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('record/index');
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}
