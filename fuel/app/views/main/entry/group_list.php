<tr id="select_group">
	<td>
		<?php echo Form::label('グループ', 'group_id', array('class'=>'control-label')); ?>
	</td>
	<td>
		<?php echo Form::select('group_id', null, $group_data, array('class' => 'span12')); ?>
	</td>
</tr>