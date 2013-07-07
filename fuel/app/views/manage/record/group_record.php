<h3><?php echo $group_name->group_name; ?>のレコード一覧</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>レコードID</td>
			<td>X軸</td>
			<td>Y軸</td>
			<td>判定</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($group_records as $group_record): ?>
			<tr>
				<td><?php echo $group_record->id; ?></td>
				<td><?php echo $group_record->x_distance; ?>m</td>
				<td><?php echo $group_record->y_distance; ?>m</td>
				<td><?php echo $group_record->condition; ?></td>
				<td></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
