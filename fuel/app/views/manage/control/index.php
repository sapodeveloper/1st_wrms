<h3>打ち上げ管制管理</h3>
<h4>打ち上げ中リスト</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>リストID</td>
			<td>学校名</td>
			<td>グループ名</td>
			<td>フェーズ</td>
			<td>次フェーズ</td>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($launches as $launch): ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $launch->group->school->school_name; ?></td>
				<td><?php echo $launch->group->group_name; ?></td>
				<td>スタンバイ</td>
				<td><?php echo Html::anchor('index/manage/control/complete/'.$launch->id, '完了フェーズ', array('class' => 'btn btn-success')); ?></td>
			</tr>
		<?php $count++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<h4>打ち上げスタンバイリスト</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>リストID</td>
			<td>学校名</td>
			<td>グループ名</td>
			<td>フェーズ</td>
			<td>次フェーズ</td>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($standbys as $standby): ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $standby->group->school->school_name; ?></td>
				<td><?php echo $standby->group->group_name; ?></td>
				<td>スタンバイ</td>
				<td><?php echo Html::anchor('index/manage/control/launch/'.$standby->id, '打ち上げフェーズ', array('class' => 'btn btn-success')); ?></td>
			</tr>
		<?php $count++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<h4>ロケット作成グループリスト</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>リストID</td>
			<td>学校名</td>
			<td>グループ名</td>
			<td>フェーズ</td>
			<td>次フェーズ</td>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($entries as $entry): ?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $entry->group->school->school_name; ?></td>
				<td><?php echo $entry->group->group_name; ?></td>
				<td>ロケット作成中</td>
				<td><?php echo Html::anchor('index/manage/control/standby/'.$entry->id, 'スタンバイフェーズ', array('class' => 'btn btn-success')); ?></td>
			</tr>
		<?php $count++; ?>
		<?php endforeach; ?>
		
	</tbody>
</table>
