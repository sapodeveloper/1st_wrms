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
					<td>
						<?php echo Html::anchor('manage/event/complete/'.$ne->id, '実施終了', array('class' => 'btn btn-success')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="4">現在、設定されているイベントはありません。</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>