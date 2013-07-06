$(function(){
	$("#school").change(list)
});
function list() {
	var url = 'entry/GroupList/';
	url += $("#school").val();
	$.ajax(url, {"complete": function(xhr,status){
		$("#select_group").hide();
		window.xhr = xhr;
		$("#entry tr:first").after($(xhr.responseText));
	}});
}