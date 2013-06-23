<h3>登録高校情報</h3>
<br>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if ($schools): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>学校名</th>
			<th>公式HP</th>
			<th>状態</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($schools as $school): ?>		<tr>

			<td><?php echo $school->school_name; ?></td>
			<td><?php echo $school->school_url; ?></td>
			<td><?php echo $school->condition; ?></td>
			<td>
				<?php echo Html::anchor('index/school/view/'.$school->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('index/school/edit/'.$school->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('index/school/delete/'.$school->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>現在参加高校は登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('index/manage/school/create', 'Add new School', array('class' => 'btn btn-success')); ?>

</p>
