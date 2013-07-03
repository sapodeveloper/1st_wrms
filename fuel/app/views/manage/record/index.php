<h3>記録管理</h3>
<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">全レコード一覧</a></li>
		<li><a href="#tab2" data-toggle="tab">空レコード一覧</a></li>
		<li><a href="#tab3" data-toggle="tab">レコードなしグループ</a></li>
		<li><a href="#tab4" data-toggle="tab">レコード検索</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<?php echo render('manage/record/_all_record'); ?>
		</div>
		<div class="tab-pane" id="tab2">
			<?php echo render('manage/record/_null_record'); ?>
		</div>
		<div class="tab-pane" id="tab3">
			<?php echo render('manage/record/group_null_record'); ?>
		</div>
		<div class="tab-pane" id="tab4">
		  <p>Howdy, I'm in Section 2.</p>
		</div>
	</div>
</div>