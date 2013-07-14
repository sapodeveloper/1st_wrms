<h3><?php echo $group_name->group_name; ?>のレコード一覧</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td></td>
			<td>レコードID</td>
			<td>X軸</td>
			<td>Y軸</td>
			<td>判定</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($group_records as $group_record): ?>
			<tr>
				<td><?php echo $count; ?></td>
				<td><?php echo $group_record->id; ?></td>
				<td><?php echo $group_record->x_distance; ?>m</td>
				<td><?php echo $group_record->y_distance; ?>m</td>
				<td>
					<?php
						if($group_record->condition == 1)
						{
							printf("有効測定");
						}
						elseif ($group_record->condition == 2) {
							printf("無効測定(測定不可)");
						}
						elseif ($group_record->condition == 3) {
							printf("無効測定(有効測定回数外)");
						}
					?>
				</td>
				<td></td>
			</tr>
			<?php $count++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
