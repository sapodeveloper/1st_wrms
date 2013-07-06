<h3>登録参加グループ情報</h3>
<br>
<?php if ($groups): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>登録ID</th>
			<th>所属高校</th>
			<th>チーム名</th>
			<th colspan="5">所属メンバー</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php echo $group->id; ?></td>
		<td><?php echo $group->school->school_name; ?></td>
		<td><?php echo $group->group_name; ?></td>
		<td><?php echo $group->group_member1; ?></td>
		<td><?php echo $group->group_member2; ?></td>
		<td><?php echo $group->group_member3; ?></td>
		<td><?php echo $group->group_member4; ?></td>
		<td><?php echo $group->group_member5; ?></td>
		<td>
			<?php echo Html::anchor('index/manage/group/view/'.$group->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
			<?php echo Html::anchor('index/manage/group/edit/'.$group->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
			<?php echo Html::anchor('index/manage/group/delete/'.$group->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('削除してもいいですか？')")); ?>
		</td>
	</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>現在参加グループは登録されていません。</p>

<?php endif; ?><p>
	<?php echo Html::anchor('index/manage/group/create', '新規登録', array('class' => 'btn btn-success')); ?>

</p>
