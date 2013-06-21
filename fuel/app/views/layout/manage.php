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
	<?php echo $header; ?>
	<div class="container-fluid">
  		<div class="row-fluid">
			<?php echo $side_menu; ?>
			<div class="span6">
				<?php echo $content; ?>				
			</div>
	 	</div>
	</div>
	<?php echo $footer; ?>
	</body>
</html>