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
				<td><?php echo $record->y_distance; ?>m</td>
				<td>
					<?php
						if($record->condition == 1)
						{
							printf("有効測定");
						}
						elseif ($record->condition == 2) {
							printf("測定不可");
						}
						elseif ($record->condition == 3) {
							printf("有効測定回数外");
						}
						elseif ($record->condition == 4) {
							printf("例外");
						}
						elseif ($record->condition == 0) {
							printf("削除");
						}
					?>
				</td>
				<td>
					<?php if(!$record->condition == 0){ ?>
					<?php echo Html::anchor('manage/record/view/'.$record->id, '詳細', array('class' => 'btn btn-info')); ?>
					<?php echo Html::anchor('manage/record/edit/'.$record->id, '編集', array('class' => 'btn btn-success')); ?>
					<?php echo Html::anchor('manage/record/delete/'.$record->id, '削除', array('class' => 'btn btn-danger', 'onclick' => "return confirm('削除します。よろしいですか？')")); ?>
					<?php } ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<p>現在保存されている記録はありません。</p>

<?php endif; ?>