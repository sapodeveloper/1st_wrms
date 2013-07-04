<h3>記録管理</h3>
<ul class="nav nav-tabs">
	<li class="active"><?php echo Html::anchor('index/manage/record/', '全レコード一覧'); ?></li>
	<li><?php echo Html::anchor('index/manage/record/NullAllRecord', '空レコード一覧'); ?></li>
	<li><?php echo Html::anchor('index/manage/record/recordNullRecord', 'レコードなしグループ'); ?></li>
	<li><?php echo Html::anchor('index/manage/record/SearchRecord', 'レコード検索'); ?></li>
</ul>
<table class="table table-bordered">
	<thead>
		<td>ID</td>
		<td>学校名</td>
		<td>グループ名</td>
		<td>飛距離</td>
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
					<?php echo Html::anchor('index/manage/record/view/'.$record->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
					<?php echo Html::anchor('index/manage/record/edit/'.$record->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
					<?php echo Html::anchor('index/manage/record/delete/'.$record->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('削除してもいいですか？')")); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
