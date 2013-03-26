function LinkList(menuid){
    this.menuid=menuid;
    this.init();
}
LinkList.prototype={
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
                field : 'linkurl',
                title : '链接地址',
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
        $('#linkListWin'+this.menuid).dialog({
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
                        menuid:$("#linkListMenuid"+_this.menuid).val(),
                        id:$("#linkListId"+_this.menuid).val(),
                        title:$("#linkListTitle"+_this.menuid).val(),
                        linkurl:$("#linkListUrl"+_this.menuid).val()
                    }
                    $.post(global._prefix+"/manage/news/addOrEditLinkList",postData,function(res){
                        res=eval("("+res+")");
                        if(res.type==="1"){
                            _this.reloadList();
                            $("#linkListWin"+_this.menuid).window("close");
                        }else{
                            $.messager.alert("提示框",res.errorMessage);
                        }
                    })
                }},
                {
                    text : '取消',
                    handler : function() {
                        _this.clear();
                        $("#linkListWin"+_this.menuid).window("close");
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
        $("#linkListMenuid"+this.menuid).val(this.menuid);
        $("#linkListWin"+this.menuid).dialog("open");
    },
    edit:function (){
        var selectedNode=$("#list"+this.menuid).datagrid("getSelected");
        if(selectedNode===null){
            $.messager.alert("提示框","请选择要编辑的项");
            return;
        }
        $("#linkListId"+this.menuid).val(selectedNode.id);
        $("#linkListTitle"+this.menuid).val(selectedNode.title);
        $("#linkListUrl"+this.menuid).val(selectedNode.linkurl);
        $("#linkListWin"+this.menuid).window("open");
    },
    clear:function(){
        $("#linkListMenuid"+this.menuid).val("");
        $("#linkListId"+this.menuid).val("");
        $("#linkListTitle"+this.menuid).val("");
        $("#linkListUrl"+this.menuid).val("");
    },
    init:function(){
        this.createTable();
        this.createDialog();
    }
}