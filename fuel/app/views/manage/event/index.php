<h3>イベント管理</h3>
<h4>現在のイベント設定</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>イベント名</td>
			<td>実施日</td>
			<td>レコード数</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
		<?php if($now_event): ?>
			<?php foreach ($now_event as $ne): ?>
				<tr>
					<td><?php echo $ne->event_name; ?></td>
					<td><?php echo $ne->event_date; ?></td>
					<td></td>
					<td></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="4">現在、設定されているイベントはありません。</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>
<p>
	<?php echo Html::anchor('manage/event/create', '新規登録', array('class' => 'btn btn-success')); ?>
</p>
<h4>イベント一覧</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>イベント名</td>
			<td>実施日</td>
			<td>レコード数</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
		<?php if($events): ?>
			<?php foreach($events as $event): ?>
				<tr>
					<td><?php echo $event->event_name; ?></td>
					<td><?php echo $event->event_date; ?></td>
					<td></td>
					<td></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
		<tr>
			<td colspan="4">現在、登録されているイベントはありません。</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>