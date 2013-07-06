<div align="center">
	<h3>エントリー</h3>
	<br>
	<?php echo Form::open(array("action" => "index/main/entry/create", "class"=>"form-horizontal")); ?>
	<div class="row">
		<div class="span3"></div>
		<div class="span6">
			<table class="table">
				<tr>
					<td>
						<?php echo Form::label('グループ', 'group_id', array('class'=>'control-label')); ?>
					</td>
					<td>
						<?php echo Form::select('group_id', null, $group_data, array('class' => 'span12')); ?>
					</td>
					<td>
						<?php echo Form::submit('submit', 'エントリー', array('class' => 'btn btn-success')); ?>
					</td>
				</tr>
			</table>
		</div>
		<div class="span3"></div>	
	</div>
	
	<?php echo Form::close(); ?>
</div>