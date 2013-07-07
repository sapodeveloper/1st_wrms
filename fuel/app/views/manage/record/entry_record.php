<h3>レコード登録可能エントリー一覧</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>学校名</td>
			<td>グループ名</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($launches as $launch): ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $launch->group->school->school_name; ?></td>
				<td><?php echo $launch->group->group_name; ?></td>
				<td>
					<?php echo Html::anchor('index/manage/record/InputRecord/'.$launch->id, '記録登録', array('class' => 'btn btn-success')); ?>
					<?php echo Html::anchor('index/manage/record/GroupRecord/'.$launch->id, 'グループ記録確認', array('class' => 'btn btn-success')); ?>
					<?php echo Html::anchor('index/manage/record/complete/'.$launch->id, '登録完了', array('class' => 'btn btn-success')); ?>
			</tr>
		<?php $count++; ?>
		<?php endforeach; ?>
	</tbody>
</table>