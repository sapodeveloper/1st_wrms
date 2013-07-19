バックアップメール
<?php
	foreach ($group_records as $gr) {
		echo 'グループ名:';
		echo $gr->group->group_name;
		echo 'レコードID:';
		echo $gr->id;
		echo 'y_distance:';
		echo $gr->y_distance;
		echo 'x_distance:';
		echo $gr->x_distance;
		echo '<br>';
	}
?>