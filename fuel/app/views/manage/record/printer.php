<html>
<head>
	<title>参加賞状</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<style type="text/css">
		body{
			background-image: url("../../../assets/img/bg.png");
			background-repeat:no-repeat;
			background-size: auto 100%;
			margin: 15px 10px 50px 20px;
		}

		#cup_name{
			width: 1000px;
			position: absolute;
			top: 20px;
			left: 510px;
			font-size: 70px;
		}

		#commendation{
			width: 1800px;
			position: absolute;
			top: 320px;
			left: 100px;
			font-size: 55px;
		}

		#detail{
			background-color: rgba(50,200,180,0.5);
			border-radius: 15px;
			width: 990px;
			position: absolute;
			top: 620px;
			left: 90px;
			font-size: 60px;
		}

		#memberlist{
			background-color: #B0E0E6; 
			border-radius: 15px;
			width: 980px;
			position: absolute;
			top: 1000px;
			left: 90px;
			font-size: 50px;
			border:10px solid #008080;
		}

		#record{
			color: #ff3333;
			text-align: center; 
			font-size: 120px;
		}

		#date{
			position: absolute;
			top: 2200px;
			left: 140px;
			font-size: 50px;
			color: white;
		}
	</style>
</head>
<body>
	<div id="cup_name">
		<?php echo $record->event->event_name; ?>
	</div>
	<div id="commendation">
		&nbsp;貴殿型は、2013年度水ロケット大会で<br/>以下の結果を得られたことを証明します。
	</div>
	<div id="memberlist">
		メンバー : <?php echo $record->group->group_member1; ?>&nbsp;
		<?php echo $record->group->group_member2; ?>&nbsp;
		<?php echo $record->group->group_member3; ?>&nbsp;
		<?php echo $record->group->group_member4; ?>&nbsp;
		<?php echo $record->group->group_member5; ?>
	</div>
	<div id="detail">
		<?php echo $record->group->school->school_name; ?>&nbsp;<br><?php echo $record->group->group_name; ?>
		<br>
		<div id="record">
			<?php echo $record->y_distance; ?>メートル
		</div>	
	</div>
	<div id="date">
		<?php echo date("Y年m月d日", strtotime($record->event->event_date)); ?>
	</div>
</body>

</html>