<style type="text/css">
	.tablet-input {
		height: 90px;
		width: 300px;
		font-size: 80px;
	}
</style>
<div class="row">
	<div class="span2"></div>
	<div class="span8">
		<h3 align="center">記録登録</h3>
		<?php echo Form::open(array("action" => "manage/record/edit/".$record->id, "class"=>"form-horizontal")); ?>
			<table class="table table-bordered">
				<tr>
					<td>エントリーID</td>
					<td><?php echo $record->id; ?></td>
				</tr>
				<tr>
					<td>学校名</td>
					<td><?php echo $record->group->school->school_name; ?></td>
				</tr>
				<tr>
					<td>グループ名</td>
					<td>
						<?php echo $record->group->group_name; ?>
						<?php echo Form::hidden('group_id', $record->group_id); ?>
					</td>
				</tr>
				<tr>
					<td>Y軸</td>
					<td>
						<?php echo Form::input('y_distance', Input::post('y_distance', $record->y_distance), array('class' => 'tablet-input')); ?>
					</td>
				</tr>
				<tr>
					<td>X軸</td>
					<td>
						<?php echo Form::input('x_distance', Input::post('x_distance', $record->x_distance), array('class' => 'tablet-input')); ?>
					</td>
				</tr>
				<tr>
					<td>測定大会</td>
					<td>
						<?php echo Form::select('event_id', $record->event_id, $event_data, array('class' => 'span4')); ?>

					</td>
				</tr>
				<tr>
					<td>レコード判定</td>
					<td><?php echo Form::select('condition', $record->condition, $decision, array('class' => 'span4')); ?></td>
				</tr>
				<tr>
					<td colspan="2">
						<?php echo Form::submit('submit', '更新', array('class' => 'btn btn-large btn-primary span12')); ?>
					</td>
				</tr>
			</table>	
		<?php echo Form::close(); ?>
	</div>
</div>