<html>
<head>
	<title>参加賞状</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<style type="text/css">
		body{
			background-image: url("../../../assets/img/bg.png");
			background-repeat:no-repeat;
			margin: 5px 10px 15px 20px;
		}

		#cup_name{
			width: 1000px;
			position: absolute;
			top: 45px;
			left: 790px;
			font-size: 90px;
		}

		#commendation{
			width: 1800px;
			position: absolute;
			top: 490px;
			left: 80px;
			font-size: 90px;
		}

		#memberlist{
			background-color: #B0E0E6; 
			border-radius: 15px;
			width: 1600px;
			position: absolute;
			top: 1700px;
			left: 100px;
			font-size: 90px;
			border:15px solid #008080;
		}

		#detail{
			background-color: rgba(50,200,180,0.5);
			border-radius: 15px;
			width: 1500px;
			position: absolute;
			top: 1100px;
			left: 150px;
			font-size: 90px;
		}

		#record{
			color: #ff3333;
			text-align: center; 
			font-size: 180px;
		}

		#date{
			position: absolute;
			top: 2455px;
			left: 190px;
			font-size: 90px;
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