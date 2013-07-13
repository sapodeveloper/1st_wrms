<!DOCTYPE HTML>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
		<?php echo Asset::js('bootstrap.js'); ?>
		<?php echo Asset::css('bootstrap.css'); ?>
		<meta charset="utf-8">
		<title>水ロケット管理システム</title>
		<style type="text/css">
		    body {
		    	padding-top: 50px;
		    	padding-bottom: 40px;
		    }

		    #btn {
		      margin-top: -2.6px;
		      margin-left: 10px;
		      padding: 1px 5px;
		    }
		</style>
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
	 	<div class="navbar-inner">
			<div class="container-fluid">
	    		<div class="brand"><?php echo $title; ?></div>
		    	<div class="nav-collapse collapse">
		    		<p class="navbar-text pull-right">
        				<?php echo Html::anchor('/session/logout', 'ログアウト'); ?>
        			</p>
		    	</div>
	    	</div>
	  	</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
	    	<div class="span12">
	     		<div class="well">
					<div class="container-fluid">
  						<div class="row-fluid">
							<div class="span2">
								<ui class="nav nav-list">
									<li><?php echo Html::anchor('/manage', '管理トップ'); ?></li>
									<li><?php echo Html::anchor('/manage/school', '登録高校管理'); ?></li>
									<li><?php echo Html::anchor('/manage/group', 'グループ管理'); ?></li>
									<li><?php echo Html::anchor('/manage/event', 'イベント管理'); ?></li>
									<li><?php echo Html::anchor('/manage/phase', 'フェーズ管理'); ?></li>
									<li><?php echo Html::anchor('/manage/control', '発射管制管理'); ?></li>
									<li><?php echo Html::anchor('/manage/record/EntryRecord', 'レコード登録'); ?></li>
									<li><?php echo Html::anchor('/manage/record', '記録管理'); ?></li>
								</ui>
							</div>
							<div class="span10">
								<?php if (Session::get_flash('success')): ?>
									<div class="alert alert-success">
										<strong>Success</strong>
										<p>
										<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
										</p>
									</div>
								<?php endif; ?>
								<?php if (Session::get_flash('error')): ?>
									<div class="alert alert-error">
										<strong>Error</strong>
										<p>
										<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
										</p>
									</div>
								<?php endif; ?>
								<?php echo $content; ?>				
							</div>
	 					</div>
					</div>
					<hr>
					<footer>
						<p align="center">
				  			&copy; ISMCサポートセンター 2013 All Rights Reserved
				  		</p>
						<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
							<p>
								<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
								<small>Version: <?php echo e(Fuel::VERSION); ?></small>
							</p>
				  	</footer>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>