<h3>新規グループ登録</h3>
<br>
<?php echo Form::open(array("action" => "index/manage/group/create", "class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('所属学校名', 'school_id', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::select('school_id', null, $school_data, array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('グループ名', 'group_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('group_name', Input::post('group_name', isset($group) ? $group->group_name : ''), array('class' => 'span4', 'placeholder'=>'グループ名')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('チームメンバー(代表)', 'group_member1', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('group_member1', Input::post('group_member1', isset($group) ? $group->group_member1 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー(代表)')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('チームメンバー', 'group_member2', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('group_member2', Input::post('group_member2', isset($group) ? $group->group_member2 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('チームメンバー', 'group_member3', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('group_member3', Input::post('group_member3', isset($group) ? $group->group_member3 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('チームメンバー', 'group_member4', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('group_member4', Input::post('group_member4', isset($group) ? $group->group_member4 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('チームメンバー', 'group_member5', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('group_member5', Input::post('group_member5', isset($group) ? $group->group_member5 : ''), array('class' => 'span4', 'placeholder'=>'チームメンバー')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
<p><?php echo Html::anchor('index/manage/group', '戻る'); ?></p>
