var editor;
KindEditor.ready(function(K) {
	editor = K.create('#content');
});
$(function() {
	$("a[mark=editSave]").click(function() {
		$.post("/php/manage/news/addOrEdit", {
			id : $("#hdnId").val(),
			title : $("#title").val(),
			content : editor.html(),
			copyWriter : $("#copyWriter").val()
		}, function(res) {
			if(res==="1"){
				history.go(-1);
			}
		})
	})
	$("a[mark=addSave]").click(function() {
		$.post("/php/manage/news/addOrEdit", {
			title : $("#title").val(),
			content : editor.html(),
			copyWriter : $("#copyWriter").val()
		}, function(res) {
			if(res==="1"){
				history.go(-1);
			}
		})
	})
})
