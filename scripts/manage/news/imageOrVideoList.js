function ImageOrVideoList(menuid){
    this.menuid=menuid;
    this.editor=null,
        this.init();

}
ImageOrVideoList.prototype={
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
        $('#imageOrVideoListWin'+this.menuid).dialog({
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
                        menuid:$("#imageOrVideoListMenuid"+_this.menuid).val(),
                        id:$("#imageOrVideoListId"+_this.menuid).val(),
                        title:$("#imageOrVideoListTitle"+_this.menuid).val(),
                        content:_this.editor.html()
                    }
                    $.post(global._prefix+"/manage/news/addOrEditImageOrVideoList",postData,function(res){
                        res=eval("("+res+")");
                        if(res.type==="1"){
                            _this.reloadList();
                            $("#imageOrVideoListWin"+_this.menuid).window("close");
                        }else{
                            $.messager.alert("提示框",res.errorMessage);
                        }
                    })
                }},
                {
                    text : '取消',
                    handler : function() {
                        _this.clear();
                        $("#imageOrVideoListWin"+_this.menuid).window("close");
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
        $("#imageOrVideoListMenuid"+this.menuid).val(this.menuid);
        $("#imageOrVideoListWin"+this.menuid).dialog("open");
    },
    edit:function (){
        var selectedNode=$("#list"+this.menuid).datagrid("getSelected");
        if(selectedNode===null){
            $.messager.alert("提示框","请选择要编辑的项");
            return;
        }
        $("#imageOrVideoListId"+this.menuid).val(selectedNode.id);
        $("#imageOrVideoListTitle"+this.menuid).val(selectedNode.title);
        this.editor.html(selectedNode.content);
        $("#imageOrVideoListWin"+this.menuid).window("open");
    },
    clear:function(){
        $("#imageOrVideoListMenuid"+this.menuid).val("");
        $("#imageOrVideoListId"+this.menuid).val("");
        $("#imageOrVideoListTitle"+this.menuid).val("");
        this.editor.html("");
    },
    upload:function(){
        var _this=this;
        $('#file_upload'+this.menuid).uploadify({
            'swf':global._prefix+ '/scripts/uploadify/uploadify.swf?val=' + Math.random(),
            'uploader':global._prefix+'/manage/Uploadify/upload',
            'folder': global._prefix+'/files/imageorvideo/',
            'cancelImg':global._prefix+ '/scripts/uploadify/uploadify-cancel.png',
            'fileTypeExts': '*',
            'fileDesc': '*',
            'debug':'true',
            'removeTimeout' : 0.1,
            'buttonClass': 'browser',
            'fileSizeLimit': 1024 * 1024 * 2000, //2G
            'multi': false,
            'buttonText': '浏览文件',
            'onUploadSuccess': function (fileObj, data, response) {
                //console.log(data);
                var msg = eval("(" + data + ")");
                $("#imageOrVideoPath"+_this.menuid).html("<span>"+msg.attachmentName+"</span>")
            },
            'auto': true,
            'onSelect': function (fileObj) {
                var maxSize = 1024 * 1024 * 2000;
                if (fileObj.size > maxSize) {
                    $.messager.alert("提示框", "上传文件不能超过2G");
                    $('#file_upload'+this.menuid).uploadifyCancel(queueId);
                    return false;
                }
                if (fileObj.type.toUpperCase() === ".EXE") {
                    $.messager.alert("提示框", "为了安全，不能上传exe文件");
                    $('#file_upload'+this.menuid).uploadifyCancel(queueId);
                    return false;
                }
            }
        });
    },
    init:function(){
        this.createTable();
        this.createDialog();
        this.editor=  KindEditor.create("#imageOrVideoListContent"+this.menuid, {
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
        this.upload();
    }
}