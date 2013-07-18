<script type="text/javascript">
	$(function(){
		$("#school_data").change(list)
	});
	function list() {
		var url = 'group_list/';
		url += $("#school_data").val();
		$.ajax(url, {"complete": function(xhr,status){
			$("#select_group").hide();
			window.xhr = xhr;
			$("#entry tr:first").after($(xhr.responseText));
		}});
	}
</script>
<div align="center">
	<h3>エントリー</h3>
	<br>
	<?php echo Form::open(array("action" => "manage/entry/regular_entry", "class"=>"form-horizontal")); ?>
	<div class="row">
		<div class="span2"></div>
		<div class="span8">
			<table id="entry" class="table">
				<tr>
					<td>
						<?php echo Form::label('学校名', 'school_id', array('class'=>'control-label')); ?>
					</td>
					<td><?php echo Form::select('school_id', null, $school_data, array('class' => 'span12', 'id' => 'school_data')); ?></td>
				</tr>
			</table>
		</div>
		<div class="span2"></div>	
	</div>
	
	<?php echo Form::close(); ?>
</div>