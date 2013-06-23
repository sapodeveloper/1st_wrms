<h3>「<?php echo $school->school_name; ?>」詳細</h3>
<table class="table table-bordered">
	<tr>
		<td>学校名</td>
		<td><?php echo $school->school_name; ?></td>
	</tr>
	<tr>
		<td>公式HP</td>
		<td><?php echo $school->school_url; ?></td>
	</tr>
</table>
<?php echo Html::anchor('index/manage/school/edit/'.$school->id, '編集'); ?> |
<?php echo Html::anchor('index/manage/school', '戻る'); ?>