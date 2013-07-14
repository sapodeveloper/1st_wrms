<script type="text/javascript">
	$(document).ready(function () {
    $("#index-tabs").ajaxTab();
});
</script>
<h3>イベント管理</h3>
<p>
	<?php echo Html::anchor('manage/event/create', '新規イベント登録', array('class' => 'btn btn-large btn-success')); ?>
</p>
<div>
    <ul id="index-tabs" class="nav nav-tabs">
        <li><a href="/wrms/manage/event/NowEvent" data-toggle="tab">開催設定イベント</a></li>
        <li><a href="/wrms/manage/event/AllEvent" data-toggle="tab">全イベント</a></li>
        <li><a href="/wrms/manage/event/HideEvent" data-toggle="tab">非表示イベント</a></li>
    </ul>
</div>