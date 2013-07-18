<div align="center">
	<div class="row">
		<div class="span3"></div>
		<div class="span6">
			<h3><?php echo $group->group_name ?>詳細</h3>
			<table class="table table-bordered">
				<tr>
					<td width="150px">所属高校</td>
					<td><?php echo $group->school->school_name ?></td>
				</tr>
				<tr>
					<td>グループ名</td>
					<td><?php echo $group->group_name ?></td>
				</tr>
				<tr>
					<td rowspan="5">グループメンバー</td>
					<td><?php echo $group->group_member1 ?></td>
				</tr>
				<tr>
					<td><?php echo $group->group_member2 ?></td>
				</tr>
				<tr>
					<td><?php echo $group->group_member3 ?></td>
				</tr>
				<tr>
					<td><?php echo $group->group_member4 ?></td>
				</tr>
				<tr>
					<td><?php echo $group->group_member5 ?></td>
				</tr>
				<tr>
					<td>所有記録数</td>
					<td><?php echo $group->records ?></td>
				</tr>
				<tr>
					<td>所属イベント</td>
					<td><?php echo $group->event->event_name ?></td>
				</tr>
			</table>
			<p><?php echo Html::anchor('manage/group', '戻る'); ?></p>
		</div>
		<div class="span3"></div>
	</div>
</div>
