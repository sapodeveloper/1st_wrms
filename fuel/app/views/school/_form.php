<?php echo Form::open(array("action" => "index/manage/school/create", "class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('学校名', 'school_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('school_name', Input::post('school_name', isset($school) ? $school->school_name : ''), array('class' => 'span4', 'placeholder'=>'学校名')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('公式HP', 'school_url', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('school_url', Input::post('school_url', isset($school) ? $school->school_url : ''), array('class' => 'span4', 'placeholder'=>'http://')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>