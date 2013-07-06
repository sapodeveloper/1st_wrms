<!DOCTYPE HTML>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
		<?php echo Asset::js('bootstrap.js'); ?>
		<?php echo Asset::js('group_list.js'); ?>
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
	<?php echo $header; ?>
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
	<?php echo $footer; ?>
	</body>
</html>