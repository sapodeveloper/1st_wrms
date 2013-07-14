<script type="text/javascript">
	$(document).ready(function () {
    $("#index-tabs").ajaxTab();
});
</script>
<h3>記録管理</h3>
<div>
    <ul id="index-tabs" class="nav nav-tabs">
        <li><a href="/wrms/manage/phase/AllPhase" data-toggle="tab">全グループエントリー</a></li>
        <li><a href="/wrms/manage/phase/NotComplete" data-toggle="tab">未完了エントリー</a></li>
        <li><a href="/wrms/manage/phase/Complete" data-toggle="tab">完了済みエントリー</a></li>
        <li><a href="/wrms/manage/phase/DeclineList" data-toggle="tab">事態処理済みエントリー</a></li>
        <li><a href="/wrms/manage/phase/HideList" data-toggle="tab">除外リスト</a></li>
    </ul>
</div>