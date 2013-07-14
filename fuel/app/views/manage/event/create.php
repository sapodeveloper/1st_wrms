<h3>新規イベント登録</h3>
<br>
<?php echo Form::open(array("action" => "manage/event/create", "class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('イベント名', 'event_name', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('event_name', Input::post('event_name', isset($event) ? $event->event_name : ''), array('class' => 'span4', 'placeholder'=>'イベント名')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('実施日', 'event_date', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('event_date', Input::post('event_date', isset($event) ? $event->event_date : ''), array('type' => 'date' ,'class' => 'span4', 'placeholder'=>'日付')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
<p><?php echo Html::anchor('manage/event', '戻る'); ?></p>
