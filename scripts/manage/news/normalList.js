function NormalList(menuid){
    this.menuid=menuid;
    this.editor=null,
    this.init();

}
NormalList.prototype={
    createTable: function (){
        var _this=this;
        $("#list"+this.menuid).datagrid({
            striped : true,
            idField : 'id',
            pagination : true,
            sortName : 'createtime',
            fitColumns : true,
            url : global._prefix+"/manage/news/initData",
            queryParams:{menuid:_this.menuid},
            frozenColumns : [ [ {
                field : "ck",
                checkbox : true
            } ] ],
            columns : [ [ {
                field : 'title',
                title : '标题',
                width : 200,
                sortable : true
            },
            {
                field : 'readcount',
                title : '阅读次数',
                width : 100,
                sortable : true
            },
            {
                field : "createtime",
                title : "创建时间",
                width : 120,
                sortable : true
            }]],
            onSortColumn : function() {
                _this.reloadList();
            },
            onLoadSuccess:function(){
                $("#list"+_this.menuid).datagrid("clearSelections");
            },
            onClickRow:function(rowIndex){
                $("#list"+_this.menuid).datagrid("unselectRow",rowIndex);
            }
        });
    },
    reloadList:function (){
        $("#list"+this.menuid).datagrid("load", {
            title : $("#title"+this.menuid).val(),
            begin : $("#begin"+this.menuid).val(),
            end : $("#end"+this.menuid).val(),
            menuid:this.menuid
        });
    },
    createDialog:function(){
        var _this=this;
        $('#normalListWin'+this.menuid).dialog({
            title:"",
            width:650,
            height:520,
            modal : true,
            resizable:true,
            maximizable:true,
            closed:true,
            buttons : [ {
                text : '确定',
                handler : function() {
                    var postData={
                        menuid:$("#normalListMenuid"+_this.menuid).val(),
                        id:$("#normalListId"+_this.menuid).val(),
                        title:$("#normalListTitle"+_this.menuid).val(),
                        //content:$("#normalListContent"+_this.menuid).val()
                        content:_this.editor.html()
                    }
                    $.post(global._prefix+"/manage/news/addOrEditNormalList",postData,function(res){
                        res=eval("("+res+")");
                        if(res.type==="1"){
                            _this.reloadList();
                            $("#normalListWin"+_this.menuid).window("close");
                        }else{
                            $.messager.alert("提示框",res.errorMessage);
                        }
                    })
                }},
                {
                    text : '取消',
                    handler : function() {
                        _this.clear();
                        $("#normalListWin"+_this.menuid).window("close");
                }
            } ]
        });
    },
    mDel:function (){
        var _this=this;
        var rows = $("#list"+this.menuid).datagrid("getSelections");
        var deleteIds = [];
        for ( var i = 0; i < rows.length; i++) {
            deleteIds.push("'" + rows[i].id + "'");
        }
        if (deleteIds == false) {
            return;
        }
        $.messager.confirm("提示框", "确定删除吗", function(r) {
            if (r) {
                $.post(global._prefix+"/manage/news/deleteNews",{ids:deleteIds.toString()},function(res){
                    res=eval("("+res+")");
                    if(res.type==="1"){
                        _this.reloadList();
                    }else{
                        $.messager.alert("提示框",res.errorMessage);
                    }
                });
            }
        })
    },
    add:function add(){
        this.clear();
        $("#normalListMenuid"+this.menuid).val(this.menuid);
        $("#normalListWin"+this.menuid).dialog("open");
    },
    edit:function (){
        var selectedNode=$("#list"+this.menuid).datagrid("getSelected");
        if(selectedNode===null){
            $.messager.alert("提示框","请选择要编辑的项");
            return;
        }
        $("#normalListId"+this.menuid).val(selectedNode.id);
        $("#normalListTitle"+this.menuid).val(selectedNode.title);
        //$("#normalListContent"+this.menuid).val(selectedNode.content);
        this.editor.html(selectedNode.content);
        $("#normalListWin"+this.menuid).window("open");
    },
    clear:function(){
        $("#normalListMenuid"+this.menuid).val("");
        $("#normalListId"+this.menuid).val("");
        $("#normalListTitle"+this.menuid).val("");
       // $("#normalListContent"+this.menuid).val("");
        this.editor.html("");
    },
    init:function(){
        this.createTable();
        this.createDialog();
        this.editor=  KindEditor.create("#normalListContent"+this.menuid, {
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
    }
}
//function NormalList(){
//    this.$outHtml=$('<div></div>');
//    this.$table=$('<table></table>');
//    //this.$toolbar=$('<div id="searchbar"><a href="/php/manage/news/add" class="easyui-linkbutton" iconCls="icon-add" id="add">新增</a><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" id="mDel">批量删除</a>文章标题:<input type="text" id="title"/><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" id="search">查询</a></div>');
//    this.init();
//}
//NormalList.prototype={
//    init:function(){
//        var _this=this;
//        _this.$outHtml.append(_this.$table);
//        this.$table.datagrid({
//		striped : true,
//		idField : 'id',
//		pagination : true,
//		sortName : 'createTime',
//		fitColumns : true,
//		url : global._prefix+"/manage/news/initData/",
//		frozenColumns : [ [ {
//			field : "ck",
//			checkbox : true
//		} ] ],
//		columns : [ [ {
//			field : 'title',
//			title : '标题',
//			width : 200,
//			sortable : true
//		}, {
//			field : "createTime",
//			title : "创建时间",
//			width : 120,
//			sortable : true
//		}]],
//       //toolbar:_this.$toolbar,
//		onSortColumn : function() {
//            _this.reloadTable();
//		},
//        onLoadSuccess:function(){
//            $("#tree").treegrid("unselectAll");
//        }
//	});
//    },
//    createToolBar:function(){
//        var $searchbar=$("<div></div>");
//        var $add=$('<a href="/php/manage/news/add" class="easyui-linkbutton" iconCls="icon-add" id="add">新增</a>');
//        $add.click(function(){
//
//        })
//    },
//    reloadTable:function(){
//        	$("#list").datagrid("load", {
//		    title : $("#title").val(),
//		    begin : $("#begin").val(),
//		    end : $("#end").val()
//	});
//    }
//}
//(function(){
//    function createList(menuid){
//        $("#list"+menuid).datagrid({
//            striped : true,
//            idField : 'id',
//            pagination : true,
//            sortName : 'id',
//            fitColumns : true,
//            url : global._prefix+"/manage/news/initData/",
//            frozenColumns : [ [ {
//                field : "ck",
//                checkbox : true
//            } ] ],
//            columns : [ [ {
//                field : 'title',
//                title : '标题',
//                width : 200,
//                sortable : true
//            },
////                {
////                field : "copyWriter",
////                title : "撰稿人",
////                width : 120,
////                sortable : true
////            },
//                {
//                field : "createTime",
//                title : "创建时间",
//                width : 120,
//                sortable : true
//            }]],
//            onSortColumn : function() {
//                reloadList(menuid);
//            },
//            onClickRow:function(rowIndex){
//                $("#list"+menuid).datagrid("unselectRow",rowIndex);
//            }
//        });
//    }
//    function reloadList(menuid){
//        $("#list"+menuid).datagrid("load", {
//            title : $("#title"+menuid).val(),
//            begin : $("#begin"+menuid).val(),
//            end : $("#end"+menuid).val()
//        });
//    }
//    function mDel(menuid){
//        var rows = $("#list"+menuid).datagrid("getSelections");
//        var deleteIds = [];
//        for ( var i = 0; i < rows.length; i++) {
//            deleteIds.push("'" + rows[i].id + "'");
//        }
//        if (deleteIds == false) {
//            return;
//        }
//        $.messager.confirm("提示框", "确定删除吗", function(r) {
//            if (r) {
//                $.post("/php/manage/news/deleteNews",{ids:deleteIds.toString()},function(res){
//                    if(res==="1"){
//                        reloadList("<?php echo menuid;?>")
//                    }
//                });
//            }
//        })
//    }
//    function add(){
//        clear();
//        $("#normalListWin").window("open");
//    }
//    function edit(menuid){
//        var selectedNode=$("#list"+menuid).datagrid("getSelected");
//        if(selectedNode===null){
//            $.messager.alert("提示框","请选择要编辑的项");
//            return;
//        }
//        $("#normalListId").val(selectedNode.id);
//        $("#normalListTitle").val(selectedNode.title);
//        $("#normalListContent").val(selectedNode.content);
//        $("#normalListWin").window("open");
//    }
//    function save(menuid){
//
//    }
//    function cancel(){
//        clear();
//        $("#normalListWin").window("close");
//    }
//    function clear(){
//        $("#normalListMenuid").val("");
//        $("#normalListId").val("");
//        $("#normalListTitle").val("");
//        $("#normalListContent").val("");
//    }
//
//    window.normalList.createTable=createList;
//    window.normalList.reloadList=reloadList;
//    window.normalList.mDel=mDel;
//    window.normalList.add=add;
//    window.normalList.edit=edit;
//})()
//function del(that){
//	var id=$(that).attr("delid");
//	$.post("/php/manage/news/deleteNews",{ids:id},function(res){
//		if(res==="1"){
//			reloadNews();
//		}
//	});
//}
//function edit(that){
//	var id=$(that).attr("editid");
//	window.open("/php/manage/news/edit?id="+id,"_self");
//	//window.open("/php/manage/news/addOrEdit/"+id);
//}