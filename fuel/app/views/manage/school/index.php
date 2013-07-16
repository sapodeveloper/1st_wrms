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
			<?php echo Html::anchor('manage/school/view/'.$school->id, '詳細', array('class' => 'btn btn-info')); ?>
			<?php echo Html::anchor('manage/school/edit/'.$school->id, '編集', array('class' => 'btn btn-success')); ?>
			<?php echo Html::anchor('manage/school/delete/'.$school->id, '削除', array('class' => 'btn btn-danger', 'onclick' => "return confirm('削除します。よろしいですか？')")); ?>
		</td>
	</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>現在参加高校は登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('manage/school/create', '新規登録', array('class' => 'btn btn-success')); ?>

</p>
