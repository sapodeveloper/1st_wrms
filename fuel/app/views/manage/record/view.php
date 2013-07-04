<h3>記録詳細</h3>
<table class="table table-bordered">
	<tr>
		<td>記録ID</td>
		<td><?php echo $record->id; ?></td>
	</tr>
	<tr>
		<td>学校名</td>
		<td><?php echo $record->group->school->school_name; ?></td>
	</tr>
	<tr>
		<td>グループ名</td>
		<td><?php echo $record->group->group_name; ?></td>
	</tr>
	<tr>
		<td>飛距離</td>
		<td><?php echo $record->x_distance; ?>m</td>
	</tr>
	<tr>
		<td>X軸</td>
		<td><?php echo $record->x_distance; ?></td>
	</tr>
	<tr>
		<td>Y軸</td>
		<td><?php echo $record->y_distance; ?></td>
	</tr>
	<tr>
		<td>記録状態</td>
		<td><?php if($record->condition == 1){ echo '記録済'; }else{ echo '未記録'; } ?></td>
	</tr>
</table>