<?php $user = Auth::instance(); ?>
<div class="row">
	<div class="span3">
		<h3>ログインアカウント</h3>
		<p><?php echo $user->get_screen_name() ?></p>
		<h3>現在開催中イベント</h3>
		<?php if($event): ?>
			<p><?php echo $event->event_name; ?></p>
		<?php else: ?>
			<p>現在開催イベントが設定されていません。</p>
		<?php endif; ?>
	</div>
	<div class="span4">
		<table class="table table-bordered">
			<tr>
				<td colspan="2">状況</td>
			</tr>
			<tr>
				<td>ロケット作成中</td>
				<td><?php echo $create_rokect; ?></td>
			</tr>
			<tr>
				<td>スタンバイ</td>
				<td><?php echo $standby; ?></td>
			</tr>
			<tr>
				<td>記録中</td>
				<td><?php echo $recording; ?></td>
			</tr>
			<tr>
				<td>ロケット修理中</td>
				<td><?php echo $repair_rokect; ?></td>
			</tr>
		</table>
	</div>
	<div class="span5">
		<table class="table table-bordered">
			<tr>
				<td colspan="3">記録状況</td>
			</tr>
			<tr>
				<td rowspan="3">全記録</td>
				<td>全記録数</td>
				<td><?php echo $all_records; ?>件</td>
			</tr>
			<tr>
				<td>全記録平均飛距離</td>
				<td><?php echo sprintf("%.2f", $ave_distance); ?>m</td>
			</tr>
			<tr>
				<td>全記録最高飛距離</td>
				<td><?php echo $max_distance; ?>m</td>
			</tr>
			<tr>
				<td rowspan="3">開催中イベント</td>
				<td>記録数</td>
				<td><?php echo $event_records; ?>件</td>
			</tr>
			<tr>
				<td>平均飛距離</td>
				<td><?php echo sprintf("%.2f", $event_ave_distance); ?>m</td>
			</tr>
			<tr>
				<td>最高飛距離</td>
				<td><?php echo $event_max_distance; ?>m</td>
			</tr>
		</table>
	</div>
</div>
