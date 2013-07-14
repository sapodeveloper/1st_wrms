<h3>記録管理</h3>
<ul class="nav nav-tabs">
	<li class="active"><?php echo Html::anchor('manage/record/', '全レコード一覧'); ?></li>
	<li><?php echo Html::anchor('manage/record/NullAllRecord', '空レコード一覧'); ?></li>
	<li><?php echo Html::anchor('manage/record/recordNullRecord', 'レコードなしグループ'); ?></li>
	<li><?php echo Html::anchor('manage/record/SearchRecord', 'レコード検索'); ?></li>
</ul>
<?php if ($records): ?>
<table class="table table-bordered">
	<thead>
		<td>ID</td>
		<td>学校名</td>
		<td>グループ名</td>
		<td>飛距離</td>
		<td>記録状態</td>
		<td>&nbsp;</td>
	</thead>
	<tbody>
		<?php foreach ($records as $record): ?>
			<tr>
				<td><?php echo $record->id; ?></td>
				<td><?php echo $record->group->school->school_name; ?></td>
				<td><?php echo $record->group->group_name; ?></td>
				<td><?php echo $record->x_distance; ?>m</td>
				<td>
					<?php
						if($record->condition == 1)
						{
							printf("有効測定");
						}
						elseif ($record->condition == 2) {
							printf("無効測定(測定不可)");
						}
						elseif ($record->condition == 3) {
							printf("無効測定(有効測定回数外)");
						}
						elseif ($record->condition == 4) {
							printf("無効測定(例外)");
						}
					?>
				</td>
				<td>
					<?php echo Html::anchor('manage/record/view/'.$record->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
					<?php echo Html::anchor('manage/record/edit/'.$record->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
					<?php echo Html::anchor('manage/record/delete/'.$record->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('削除してもいいですか？')")); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<p>現在保存されている記録はありません。</p>

<?php endif; ?>