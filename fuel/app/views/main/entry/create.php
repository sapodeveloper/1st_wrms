<div align="center">
	<h3>エントリー</h3>
	<br>
	<?php echo Form::open(array("action" => "main/entry/", "class"=>"form-horizontal")); ?>
	<div class="row">
		<div class="span3"></div>
		<div class="span6">
			<table id="entry" class="table">
				<tr>
					<td>
						<?php echo Form::label('学校名', 'school_id', array('class'=>'control-label')); ?>
					</td>
					<td><?php echo Form::select('school_id', null, $school_data, array('class' => 'span12', 'id' => 'school')); ?></td>
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