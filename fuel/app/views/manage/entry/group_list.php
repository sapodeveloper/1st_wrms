<tr id="select_group">
	<td colspan="2">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>グループ名</td>
					<td colspan="5">メンバー</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php if($groups): ?>
				<?php foreach ($groups as $group): ?>
					<tr>
						<td><?php echo $group->group_name; ?></td>
						<td><?php echo $group->group_member1; ?></td>
						<td><?php echo $group->group_member2; ?></td>
						<td><?php echo $group->group_member3; ?></td>
						<td><?php echo $group->group_member4; ?></td>
						<td><?php echo $group->group_member5; ?></td>
						<td>
							<?php echo Html::anchor('manage/entry/entry_group/'.$group->id, 'エントリー', array('class' => 'btn btn-success')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="7">該当するグループは存在していません</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</td>
</tr>