function MultiAttrList(menuid){
    this.menuid=menuid;
    this.editor=null,
    this.attachment=[],
    this.init();

}
MultiAttrList.prototype={
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
        $('#multiAttrListWin'+this.menuid).dialog({
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

                    var  attachmentIDs=[];
                    for(var i=0;i<_this.attachment.length;i++){
                        attachmentIDs.push(_this.attachment[i].attachmentID);
                    }
                    var postData={
                        menuid:$("#multiAttrListMenuid"+_this.menuid).val(),
                        id:$("#multiAttrListId"+_this.menuid).val(),
                        title:$("#multiAttrListTitle"+_this.menuid).val(),
                        attachmentIDs:attachmentIDs.toString(),
                        content:_this.editor.html()
                    }
                    $.post(global._prefix+"/manage/news/addOrEditMultiAttrList",postData,function(res){
                        res=eval("("+res+")");
                        if(res.type==="1"){
                            _this.reloadList();
                            $("#multiAttrListWin"+_this.menuid).window("close");
                        }else{
                            $.messager.alert("提示框",res.errorMessage);
                        }
                    })
                }},
                {
                    text : '取消',
                    handler : function() {
                        _this.clear();
                        $("#multiAttrListWin"+_this.menuid).window("close");
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
        $("#imageOrVideoPath"+this.menuid).html("");
        $("#multiAttrListMenuid"+this.menuid).val(this.menuid);
        $("#multiAttrListWin"+this.menuid).dialog("open");
    },
    edit:function (){
        this.clear();
        var _this=this;
        var selectedNode=$("#list"+this.menuid).datagrid("getSelected");
        if(selectedNode===null){
            $.messager.alert("提示框","请选择要编辑的项");
            return;
        }
        $("#imageOrVideoPath"+_this.menuid).html("");
        $.post(global._prefix+"/manage/uploadify/getMultiAttachment",{newsid:selectedNode.id},function(res){
            res=eval("("+res+")");
            if(res.type==="1"){
                for(var i=0;i<res.attachment.length;i++){
                    _this.additionAttachment(res.attachment[i]);
                }
            }
            $("#multiAttrListId"+_this.menuid).val(selectedNode.id);
            $("#multiAttrListTitle"+_this.menuid).val(selectedNode.title);
            _this.editor.html(selectedNode.content);
            $("#multiAttrListWin"+_this.menuid).window("open");
        });

    },
    clear:function(){
        $("#multiAttrListMenuid"+this.menuid).val("");
        $("#multiAttrListId"+this.menuid).val("");
        $("#multiAttrListTitle"+this.menuid).val("");
        this.editor.html("");
        this.attachment=[];
    },
    upload:function(){
        var _this=this;
        $('#file_upload'+this.menuid).uploadify({
            'swf':global._prefix+ '/scripts/uploadify/uploadify.swf?val=' + Math.random(),
            'uploader':global._prefix+'/manage/Uploadify/multiUpload',
            'folder': global._prefix+'/files/imageorvideo/',
            'cancelImg':global._prefix+ '/scripts/uploadify/uploadify-cancel.png',
            'fileTypeExts': '*',
            'fileDesc': '*',
            'removeTimeout' : 0.1,
            'buttonClass': 'browser',
            'fileSizeLimit': 1024 * 1024 * 2000, //2G
            'multi': true,
            'buttonText': '浏览文件',
            'onUploadSuccess': function (fileObj, data, response) {
                var msg = eval("(" + data + ")");
                _this.additionAttachment({attachmentID:msg.attachmentID,attachmentName:msg.attachmentName,attachmentPath:msg.attachmentPath});
                if(msg.type==="1"){
                    _this.attachment.push({attachmentID:msg.attachmentID,attachmentPath:msg.attachmentPath,attachmentName:msg.attachmentName});
                }else{
                     $.messager.alert("提示框",msg.errMessage);
                }
            },
            'auto': true,
            'onSelect': function (fileObj) {
                var maxSize = 1024 * 1024 * 2000;
                if (fileObj.size > maxSize) {
                    $.messager.alert("提示框", "上传文件不能超过2G");
                    $('#file_upload'+_this.menuid).uploadify('cancel');
                    return false;
                }
                if (fileObj.type.toUpperCase() === ".EXE") {
                    $.messager.alert("提示框", "为了安全，不能上传exe文件");
                    $('#file_upload'+_this.menuid).uploadify('cancel');
                    return false;
                }
            }
        });
    },
    init:function(){
        this.createTable();
        this.createDialog();
        this.editor=  KindEditor.create("#multiAttrListContent"+this.menuid, {
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
        this.upload();
    },
    additionAttachment:function(attr){
        var _this=this;
        _this.attachment.push({attachmentID:attr.attachmentID,attachmentPath:attr.attachmentPath,attachmentName:attr.attachmentName})
        var dv=$("<div></div>");
        var spanName=$("<span>"+attr.attachmentName+"</span>");
        var aDel=$('<a href="javascript:void(0)" delattr="'+attr.attachmentID+'">删除</a>');
        aDel.click(function(){
            var that=this;
            $.post(global._prefix+"/manage/uploadify/delete",{attachmentID:$(this).attr("delattr"),callback:Math.random()},function(res){
                res= eval("("+res+")");
                if(res.type==="1"){
                    $(that).parent().remove();
                    for(var j=0;j<_this.attachment.length;j++){
                        if(_this.attachment[j].attachmentID==$(that).attr("delattr")){
                            delete _this.attachment[j];
                        }
                    }
                }
                else
                {
                    $.messager.alert("提示框",res.errMessage);
                }
            })
        })
        dv.append(spanName);
        dv.append(aDel)
        $("#imageOrVideoPath"+_this.menuid).append(dv);
    }

}
