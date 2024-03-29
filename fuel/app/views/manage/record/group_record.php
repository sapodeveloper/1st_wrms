<h2><?php echo $group_name->group_name; ?>のレコード一覧</h2>
<?php if($group_records): ?>
<h3>最高記録</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>レコードID</td>
			<td>Y軸</td>
			<td>X軸</td>
			<td>測定大会</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $max_record->id; ?></td>
			<td><?php echo $max_record->y_distance; ?>m</td>
			<td><?php echo $max_record->x_distance; ?>m</td>
			<td><?php echo $max_record->event->event_name; ?></td>
			<td><?php echo Html::anchor('manage/record/print_record/'.$max_record->id, '印刷', array('class' => 'btn btn-success')); ?></td>
		</tr>
	</tbody>
</table>
<h3>全記録</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td></td>
			<td>レコードID</td>
			<td>Y軸</td>
			<td>X軸</td>
			<td>測定大会</td>
			<td>判定</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($group_records as $group_record): ?>
			<?php
				if($group_record->condition == 1)
				{
					printf("<tr bgcolor=\"#dff0d8\">");
				}
				elseif ($group_record->id == $max_record->id) {
					printf("<tr bgcolor=\"#fcf8e3\">");
				}
				elseif ($group_record->condition != 1) {
					printf("<tr bgcolor=\"#f2dede\">");
				}
			?>
			
				<td><?php echo $count; ?></td>
				<td><?php echo $group_record->id; ?></td>
				<td><?php echo $group_record->y_distance; ?>m</td>
				<td><?php echo $group_record->x_distance; ?>m</td>
				<td><?php echo $group_record->event->event_name; ?></td>
				<td>
					<?php
						if($group_record->condition == 1)
						{
							printf("有効測定");
						}
						elseif ($group_record->condition == 2) {
							printf("測定不可");
						}
						elseif ($group_record->condition == 3) {
							printf("有効測定回数外");
						}
						elseif ($group_record->condition == 4) {
							printf("例外");
						}
						elseif ($group_record->condition == 0) {
							printf("削除");
						}
					?>
				</td>
				<td>
					<?php echo Html::anchor('manage/record/edit/'.$group_record->id, '編集', array('class' => 'btn btn-success')); ?>
				</td>
			</tr>
			<?php $count++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<p>記録が存在していません。</p>
<?php endif; ?>
