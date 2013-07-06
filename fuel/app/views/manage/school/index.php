<h3>登録高校情報</h3>
<br>
<?php if ($schools): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>登録ID</th>
			<th>学校名</th>
			<th>公式HP</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($schools as $school): ?>
	<tr>
		<td><?php echo $school->id; ?></td>
		<td><?php echo $school->school_name; ?></td>
		<td><?php echo $school->school_url; ?></td>
		<td>
			<?php echo Html::anchor('index/manage/school/view/'.$school->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
			<?php echo Html::anchor('index/manage/school/edit/'.$school->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
			<?php echo Html::anchor('index/manage/school/delete/'.$school->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>
		</td>
	</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>現在参加高校は登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('index/manage/school/create', '新規登録', array('class' => 'btn btn-success')); ?>

</p>
