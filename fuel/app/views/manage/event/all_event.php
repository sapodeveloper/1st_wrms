<table class="table table-bordered">
	<thead>
		<tr>
			<td>イベント名</td>
			<td>実施日</td>
			<td>レコード数</td>
			<td>状態</td>
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
					<td>
						<?php
							if($event->condition == 0)
							{
								printf("未開催");
							}
							elseif ($event->condition == 1) {
								printf("開催中");
							}
							elseif ($event->condition == 2) {
								printf("開催終了");
							}
						?>
					</td>
					<td>
						<?php echo Html::anchor('manage/event/start/'.$event->id, '実施開始', array('class' => 'btn btn-success')); ?>
						<?php echo Html::anchor('manage/event/hide/'.$event->id, '非表示', array('class' => 'btn btn-success')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
		<tr>
			<td colspan="4">現在、登録されているイベントはありません。</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>