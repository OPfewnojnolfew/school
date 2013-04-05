function NormalList(menuid){
    this.menuid=menuid;
    this.id="";
    //表单
    this.editor=null,
    this.title = null;
    //搜索
    this.searchTitle = null;
    this.searchBegin = null;
    this.searchEnd = null;
    //弹框和列表
    this.list = null;
    this.dialog = null;
    this.init();

}
NormalList.prototype={
    createTable: function (){
        var _this=this;
        this.list.datagrid({
            striped : true,
            idField : 'id',
            pagination : true,
            sortName : 'createtime',
            sortOrder:'desc',
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
                $(this).datagrid("clearSelections");
            },
            onClickRow:function(rowIndex){
                $(this).datagrid("unselectRow",rowIndex);
            }
        });
    },
    reloadList:function (){
        this.list.datagrid("load", {
            title: $.trim(this.searchTitle.val()),
            begin: this.searchBegin.val(),
            end: this.searchEnd.val(),
            menuid:this.menuid
        });
    },
    createDialog:function(){
        var _this=this;
        this.dialog.dialog({
            title:"",
            width:900,
            height:550,
            modal : true,
            resizable:true,
            minimizable:true,
            maximizable:true,
            inline:true,
            closed:true,
            buttons : [ {
                text : '确定',
                handler : function() {
                    var title=$.trim(_this.title.val());
                    if(title===""){
                        $.messager.alert("提示框","标题不能为空","",function(){
                            _this.title.focus();
                        });
                        return;
                    }
                    var postData={
                        menuid:_this.menuid,
                        id:_this.id,
                        title:title,
                        content:_this.editor.getContent()
                    }
                    $.post(global._prefix+"/manage/news/addOrEditNormalList",postData,function(res){
                        res=eval("("+res+")");
                        if(res.type==="1"){
                            _this.reloadList();
                            _this.dialog.window("close");
                        }else{
                            $.messager.alert("提示框",res.errorMessage);
                        }
                    })
                }},
                {
                    text : '取消',
                    handler : function() {
                        _this.clear();
                        _this.dialog.window("close");
                }
            } ]
        });
    },
    mDel:function (){
        var _this=this;
        var rows = this.list.datagrid("getSelections");
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
    add:function (){
        this.clear();
        this.dialog.dialog("open");
    },
    edit:function (){
        var selectedNode=this.list.datagrid("getSelected");
        if(selectedNode===null){
            $.messager.alert("提示框","请选择要编辑的项");
            return;
        }
        this.id=selectedNode.id;
        this.title.val(selectedNode.title);
        this.editor.setContent(selectedNode.content,false);
        this.dialog.window("open");
    },
    clear:function(){
        this.id="";
        this.title.val("");
        this.editor.setContent("",false);
    },
    init:function(){
        this.title = $("#normalListTitle" + this.menuid);

        this.searchTitle = $("#title" + this.menuid);
        this.searchBegin = $("#begin" + this.menuid);
        this.searchEnd = $("#end" + this.menuid);
        this.list = $("#list" + this.menuid);
        this.dialog = $('#normalListWin' + this.menuid);
        this.createTable();
        this.createDialog();
        this.editor = UE.getEditor('normalListContent'+this.menuid);
//        this.editor=  KindEditor.create("#normalListContent"+this.menuid, {
//            resizeType : 1,
//            allowPreviewEmoticons : false,
//            allowImageUpload : false,
//            items : [
//                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
//                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
//                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
//        });
    }
}