$(function(){
    $("#tree").treegrid({
        title: '菜单管理',
        nowrap: false,
        animate: true,
        collapsible: true,
        url: "/school/index.php/manage/menus/initData",
        idField: 'id',
        treeField: 'name',
        singleSelect: false,
        height: 450,
        loadMsg: "数据加载中，请稍后...",
        //queryParams: { name: ($("#Name").val()).trim(), begin: $("#BeginTime").val(), end: $("#EndTime").val() },
        frozenColumns: [[
                    {field:"ck",checkbox:true, width:100},
                    { field: "name", title: "", width: 270 }
				]],
        columns: [[
                    { field: "type", title: "类型", width: 150 },
                    { field: "createTime", title: "创建时间", width: 180 }
                ]],
        onClickRow: function (row) {
            $("#tree").treegrid("unselect", row.id);
        }
    });
    $("#win").window({
    	closed:true
    })
    $("#add").click(function(){
    	$("#win").window("open");
    })
    $("#edit").click(function(){
    	var selectedNode=$("#tree").treegrid("getSelected");
    	if(selectedNode===null){
    		$.messager.alert("提示框","请选择要编辑的项");
    		return;
    	}
    	$("#win").window("open");
    })
})