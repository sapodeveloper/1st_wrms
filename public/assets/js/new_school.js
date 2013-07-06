$(function(){
	$("#school_name").change(function(){
		var school_id = $("#school_name").val();
		if(school_id == "9999"){
			var url = 'NewSchool';
			$.ajax(url, {"complete": function(xhr,status){
				window.xhr = xhr;
				$("#entry tr:first").after($(xhr.responseText));
			}});
		}else{
			$("#new_school").hide();
		}
	});
});