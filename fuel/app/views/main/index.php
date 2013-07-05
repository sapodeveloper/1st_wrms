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
    	<div class="span9">
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
    	<div class="span3">
    		<h2>現在エントリー状況</h2>
    		<table class="table table-bordered">
				<thead>
					<tr>
						<td>待ち順位</td>
						<td>グループ名</td>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
    	</div>
    </div>
</div>
