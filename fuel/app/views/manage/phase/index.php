<h3>全グループフェーズ管理</h3>
<table class="table table-bordered">
	<tr>
		<td rowspan="2">ID</td>
		<td>グループ名</td>
		<td colspan="4">フェーズ状態</td>
		<td rowspan="2">判定</td>
		<td rowspan="2">操作</td>
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
			<?php 
				if($aep->condition == 0) #エントリー
				{ 
					printf("<td rowspan='2'>手続き中</td><td rowspan='2'></td><td rowspan='2'></td><td rowspan='2'></td><td rowspan='2' bgcolor='#f2dede'>未完了</td>");
				}
				elseif($aep->condition == 1) #ロケット作成
				{
					printf("<td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2'>作成中</td><td rowspan='2'></td><td rowspan='2'></td><td rowspan='2' bgcolor='#f2dede'>未完了</td>");
				}
				elseif($aep->condition == 2) #打ち上げスタンバイ
				{
					printf("<td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2'>スタンバイ中</td><td rowspan='2'></td><td rowspan='2' bgcolor='#f2dede'>未完了</td>");
				}
				elseif($aep->condition == 3) #記録中
				{
					printf("<td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2'>記録中</td><td rowspan='2' bgcolor='#f2dede'>未完了</td>");
				}
				elseif($aep->condition == 4) #全フェーズ終了
				{
					printf("<td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td><td rowspan='2' bgcolor='#dff0d8'>完了</td>");
				}
			?>
			<td>
				<?php 
					if($aep->condition > 0)
					{
						echo Html::anchor('/index/manage/phase/back/'.$aep->id, '前段階', array('class' => 'btn btn-warning', 'onclick' => "return confirm('よろしいですか？')"));
					}
				?>
			</td>
		</tr>
		<tr>
			<td><?php echo $aep->group->school->school_name; ?></td>
			<td>
				<?php 
					if($aep->condition < 4)
					{
						echo Html::anchor('/index/manage/phase/forward/'.$aep->id, '次段階', array('class' => 'btn btn-success', 'onclick' => "return confirm('よろしいですか？')"));
					}
				?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>