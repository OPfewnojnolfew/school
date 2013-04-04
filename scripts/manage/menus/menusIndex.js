function reloadTree(){
	$("#tree").treegrid("reload");
}
$(function(){
    $("#tree").treegrid({
        title: '菜单管理',
        nowrap: false,
        collapsible: true,
        url: global._prefix+"/manage/menus/initData",
        idField: 'id',
        treeField: 'name',
        singleSelect: true,
        fitColumns: true,
        //height: 450,
        loadMsg: "数据加载中，请稍后...",
        //queryParams: { name: ($("#Name").val()).trim(), begin: $("#BeginTime").val(), end: $("#EndTime").val() },
        frozenColumns: [[
                    {field:"ck",checkbox:true },
                    { field: "name", title: "", width: 160 }
				]],
        columns: [[
                    { field: "type", title: "类型", width: 150,
                    	formatter:function(value){
                    		switch(value){
                    			case "1":
                    				return "简介";
                    			case "2":
                    				return "一般列表";
                                case "4":
                                    return "链接列表";
                    			case "3":
                    				return "图片列表";
                    			case "5":
                    				return "附件列表";
                                case "6":
                                    return "主从列表";
                                case "7":
                                    return "视频列表";
                    			default:
                    				return "";
                    		}
                    	}
                    },
                    { field: "createTime", title: "创建时间", width: 180 }
                ]],
        onLoadSuccess:function(){
            $("#tree").treegrid("unselectAll");
        }
    });
    $("#win").window({
    	closed:true
    })
    $("#addRoot").click(function(){
    	clear();
    	$("#win").window("open");
    	$("#hdnID").val("0");
    	$("#hdnIsAdd").val("1");
    })
    $("#addChild").click(function(){
    	clear();
    	var selectedNode=$("#tree").treegrid("getSelected");
    	if(selectedNode===null){
    		$.messager.alert("提示框","请选择要增添的父级");
    		return;
    	}
    	$("#win").window("open");
    	$("#hdnID").val(selectedNode.id);
    	$("#hdnIsAdd").val("1");
    })
    $("#edit").click(function(){
    	clear();
    	var selectedNode=$("#tree").treegrid("getSelected");
    	if(selectedNode===null){
    		$.messager.alert("提示框","请选择要编辑的项");
    		return;
    	}
    	$("#win").window("open");
    	$("#hdnID").val(selectedNode.id);
    	$("#name").val(selectedNode.name);
    	$("#menuType").val(selectedNode.type);
    	$("#hdnIsAdd").val("0");
    });
    $("#btnSure").click(function(){
    	$.post(global._prefix+"/manage/menus/addOrEdit",{name:$("#name").val(),type:$("#menuType").val(),id:$("#hdnID").val(),isAdd:$("#hdnIsAdd").val()},function(){
    		$("#win").window("close");
    		reloadTree();
    	})
    })
    $("#btnClose").click(function(){
    	clear();
    	$("#win").window("close");
    })
    $("#del").click(function(){
    	var selectedNode=$("#tree").treegrid("getSelected");
    	if(selectedNode===null){
    		$.messager.alert("提示框","请选择要编辑的项");
    		return;
    	}
    	$.messager.confirm("提示框","该菜单下的数据可能会被删除！确定删除吗？",function(r){
    		if(r){
    			$.post(global._prefix+"/manage/menus/del",{id:selectedNode.id},function(res){
                    var res=eval("("+res+")");
                    if(res.type==="1"){
    	    		$("#win").window("close");
    	    		reloadTree();
                    }else{
                        $.messager.alert("提示框",res.errorMessage);
                    }
    	    	})
    		}
    	})
    })
})
function clear(){
	$("#hdnIsAdd").val("0");//1新增，0编辑
	$("#hdnID").val("");
	$("#name").val("");
	$("#menuType").val("");
}