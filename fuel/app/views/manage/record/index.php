<script type="text/javascript">
	$(document).ready(function () {
    $("#index-tabs").ajaxTab();
});
</script>
<h3>記録管理</h3>
<div>
    <ul id="index-tabs" class="nav nav-tabs">
        <li><a href="/wrms/manage/record/AllRecord" data-toggle="tab">全レコード</a></li>
        <li><a href="/wrms/manage/record/ValidRecord" data-toggle="tab">有効レコード</a></li>
        <li><a href="/wrms/manage/record/NotValidRecord" data-toggle="tab">無効レコード</a></li>
        <li><a href="/wrms/manage/record/SearchRecord" data-toggle="tab">レコード検索</a></li>
    </ul>
</div>