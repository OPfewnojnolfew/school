function reloadCas() {
	$("#list").datagrid("load", {
		title : $("#title").val(),
		begin : $("#begin").val(),
		end : $("#end").val()
	});
}
function del(that){
	var id=$(that).attr("delid");
	$.post("/php/manage/Cas/deleteCas",{ids:id},function(res){
		if(res==="1"){
			reloadCas();
		}
	});
}
function edit(that){
	var id=$(that).attr("editid");
	window.open("/php/manage/Cas/edit?id="+id,"_self");
}
$(function() {
	$("#search").click(function() {
		reloadCas();
	})
	$("#list").datagrid({
		striped : true,
		idField : 'id',
		pagination : true,
		sortName : 'id',
		fitColumns : true,
		url : "/php/manage/Cas/initData/",
		frozenColumns : [ [ {
			field : "ck",
			checkbox : true
		} ] ],
		columns : [ [ {
			field : 'title',
			title : '标题',
			width : 200,
			sortable : true
		}, {
			field : "CustomerName",
			title : "客户",
			width : 120,
			sortable : true
		}, {
			field : "createTime",
			title : "创建时间",
			width : 120,
			sortable : true
		},
		{
			field:"operate",
			title:"操作",
			width:120,
			formatter:function(value,rowData,rowIndex){
				var id=rowData.id;
				var del="<a href=\"javascript:void(0)\" delid=\""+id+"\" onclick=\"del(this)\"><img src=\"/php/themes/easyuithemes/icons/cross.png\" alt=\"删除\" title=\"删除\"/></a>";
				var edit="<a href=\"javascript:void(0)\" editid=\""+id+"\" onclick=\"edit(this)\"><img src=\"/php/themes/easyuithemes/icons/pencil.png\" alt=\"编辑\" title=\"编辑\"/></a>";
				return edit+del;
			}
		}] ],
		onSortColumn : function() {
			reloadCas();
		},
		onClickRow:function(rowIndex){
			$("#list").datagrid("unselectRow",rowIndex);
		}
	});
	$("#mDel").click(function() {
		var rows = $("#list").datagrid("getSelections");
		var deleteIds = [];
		for ( var i = 0; i < rows.length; i++) {
			deleteIds.push("'" + rows[i].id + "'");
		}
		if (deleteIds == false) {
			return;
		}
		$.messager.confirm("提示框", "确定删除吗", function(r) {
			if (r) {
				$.post("/php/manage/Cas/deleteCas",{ids:deleteIds.toString()},function(res){
					if(res==="1"){
						reloadCas();
					}
				});
			}
		})
	});
});