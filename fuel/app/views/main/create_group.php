<div align="center">
	<h3>飛び入り参加</h3>
	<br>
	<?php echo Form::open(array("action" => "main/CreateGroup", "class"=>"form-horizontal")); ?>
	<div class="row">
		<div class="span3"></div>
		<div class="span6">
			<table id="entry" class="table">
				<tr>
					<td><?php echo Form::label('学校名', 'school_id', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::select('school_id', null, $school_data, array('class' => 'span12', 'id' => 'school_name')); ?></td>
				</tr>
				<tr>
					<td><?php echo Form::label('グループ名', 'group_name', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::input('group_name', Input::post('group_name', isset($group) ? $group->group_name : ''), array('class' => 'span12', 'placeholder'=>'グループ名')); ?></td>
				</tr>
				<tr>
					<td><?php echo Form::label('チームメンバー(代表)', 'group_member1', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::input('group_member1', Input::post('group_member1', isset($group) ? $group->group_member1 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー(代表)')); ?></td>
				</tr>
				<tr>
					<td><?php echo Form::label('チームメンバー', 'group_member2', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::input('group_member2', Input::post('group_member2', isset($group) ? $group->group_member2 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?></td>
				</tr>
				<tr>
					<td><?php echo Form::label('チームメンバー', 'group_member3', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::input('group_member3', Input::post('group_member3', isset($group) ? $group->group_member3 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?></td>
				</tr>
				<tr>
					<td><?php echo Form::label('チームメンバー', 'group_member4', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::input('group_member4', Input::post('group_member4', isset($group) ? $group->group_member4 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?></td>
				</tr>
				<tr>
					<td><?php echo Form::label('チームメンバー', 'group_member5', array('class'=>'control-label')); ?></td>
					<td><?php echo Form::input('group_member5', Input::post('group_member5', isset($group) ? $group->group_member5 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?></td>
				</tr>
				<tr>
					<td colspan="2">
						<?php echo Form::submit('submit', 'エントリー', array('class' => 'btn btn-large btn-success span12')); ?>
					</td>
				</tr>
			</table>
		</div>
		<div class="span3"></div>	
	</div>
	
	<?php echo Form::close(); ?>
</div>