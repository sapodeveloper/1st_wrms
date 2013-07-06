<div align="center">
	<h2>HPで登録済みの方→
		<?php echo Html::anchor('index/main/entry', 'エントリー', array('class' => 'btn  btn-large btn-success')); ?>
	</h2>
	<br>
	<h2>飛び入り参加の方→
		<?php echo Html::anchor('index/main/CreateGroup', '飛び入り参加', array('class' => 'btn  btn-large btn-warning')); ?>
	</h2>
	<br>
	<div class="row">
    	<div class="span8">
    		<h2>現在のトップ１０</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>順位</td>
						<td>学校</td>
						<td>グループ名</td>
						<td>スコア</td>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php foreach ($records as $record): ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $record->group->school->school_name; ?></td>
							<td><?php echo $record->group->group_name; ?></td>
							<td><?php echo $record->x_distance; ?>m</td>
						</tr>
					<?php $count++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
    	</div>
    	<div class="span4">
    		<h2>現在エントリー状況</h2>
    		<?php if($wait_group_lists): ?>
    		<table class="table table-bordered">
				<thead>
					<tr>
						<td>待ち順位</td>
						<td>グループ名</td>
						<td>状態</td>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					<?php foreach ($wait_group_lists as $wgl): ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $wgl->group->group_name; ?></td>
							<td>
								<?php
									if($wgl->condition == 0){
										echo "ロケット作成中";
									}elseif ($wgl->condition == 1) {
										echo "スタンバイ";
									}elseif ($wgl->condition == 2) {
										echo "発射済";
									}
								?>
							</td>
						</tr>
					<?php $count++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php else: ?>
				<h1>今すぐ飛ばせます!!</h1>
			<?php endif; ?>
    	</div>
    </div>
</div>
