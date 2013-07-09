<h3>全グループフェーズ管理</h3>
<ul class="nav nav-tabs">
	<li><?php echo Html::anchor('manage/phase/', '全グループフェーズ'); ?></li>
	<li><?php echo Html::anchor('manage/phase/NotComplete', '未完了フェーズ'); ?></li>
	<li class="active"><?php echo Html::anchor('manage/phase/Complete', '完了済エントリー'); ?></li>
	<li><?php echo Html::anchor('manage/phase/DeclineList', '辞退処理済エントリー'); ?></li>
</ul>
<?php if ($all_entry_phase): ?>
<table class="table table-bordered">
	<tr>
		<td rowspan="2">ID</td>
		<td>グループ名</td>
		<td colspan="4">フェーズ状態</td>
		<td rowspan="2">判定</td>
		<td rowspan="2" colspan="2">操作</td>
	</tr>
	<tr>
		<td>所属高校</td>
		<td>エントリー</td>
		<td>ロケット作成</td>
		<td>スタンバイ</td>
		<td>記録中</td>
	</tr>
	<?php foreach ($all_entry_phase as $aep): ?>
		<tr>
			<td rowspan="2"><?php echo $aep->id ?></td>
			<td><?php echo $aep->group->group_name; ?></td>
			<td rowspan='2' bgcolor='#dff0d8'>完了</td>
			<td rowspan='2' bgcolor='#dff0d8'>完了</td>
			<td rowspan='2' bgcolor='#dff0d8'>完了</td>
			<td rowspan='2' bgcolor='#dff0d8'>完了</td>
			<td rowspan='2' bgcolor='#dff0d8'>完了</td>
			<td>
				<?php 
					if($aep->condition > 0)
					{
						echo Html::anchor('/manage/phase/back/'.$aep->id, '前段階', array('class' => 'btn btn-warning', 'onclick' => "return confirm('よろしいですか？')"));
					}
				?>
			</td>
			<?php
				if($aep->condition == 4)
				{
					printf("<td rowspan='2'>");
					echo Html::anchor('/manage/phase/outlist/'.$aep->id, 'リスト除外', array('class' => 'btn btn-info', 'onclick' => "return confirm('このリストから除外します。よろしいですか？')"));
					printf("</td>");
				}
			?>
		</tr>
		<tr>
			<td><?php echo $aep->group->school->school_name; ?></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php else: ?>
<p>現在保存されている記録はありません。</p>

<?php endif; ?>

