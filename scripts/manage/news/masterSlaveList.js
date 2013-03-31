function MasterSlaveList(menuid) {
    this.menuid = menuid;
    this.editor = null,
        this.attachmentPath = "",
        this.attachmentID = "",
        this.attachmentName = "",
        this.pid = "",
        this.init();

}
MasterSlaveList.prototype = {
    createTable: function () {
        var _this = this;
        $("#treelist" + this.menuid).treegrid({
            striped: true,
            idField: 'id',
            treeField: 'title',
            pagination: true,
            sortName: 'createtime',
            fitColumns: true,
            url: global._prefix + "/manage/news/initDataTree",
            queryParams: {menuid: _this.menuid},
            frozenColumns: [
                [
                    {
                        field: "ck",
                        checkbox: true
                    },
                    {   field: 'title',
                        title: '标题',
                        width: 200
                    }
                ]
            ],
            columns: [
                [
                    {
                        field: 'readcount',
                        title: '阅读次数',
                        width: 100,
                        sortable: true
                    },
                    {
                        field: "createtime",
                        title: "创建时间",
                        width: 120,
                        sortable: true
                    }
                ]
            ],
            onSortColumn: function () {
                _this.reloadList();
            },
            onLoadSuccess: function () {
                $("#treelist" + _this.menuid).treegrid("clearSelections");
            },
            onClickRow: function (rowIndex) {
                $("#treelist" + _this.menuid).treegrid("unselectRow", rowIndex);
            }
        });
    },
    reloadList: function () {
       this.createTable();
    },
    createDialog: function () {
        var _this = this;
        $('#masterSlaveListWin' + this.menuid).dialog({
            title: "",
            width: 650,
            height: 520,
            modal: true,
            resizable: true,
            maximizable: true,
            inline:true,
            closed: true,
            buttons: [
                {
                    text: '确定',
                    handler: function () {
                        var postData = {
                            pid: _this.pid,
                            menuid: _this.menuid,
                            id: $("#masterSlaveListId" + _this.menuid).val(),
                            title: $("#masterSlaveListTitle" + _this.menuid).val(),
                            attachmentID: _this.attachmentID,
                            content: _this.editor.html()
                        }
                        $.post(global._prefix + "/manage/news/addOrEditMasterSlaveList", postData, function (res) {
                            res = eval("(" + res + ")");
                            if (res.type === "1") {
                                _this.reloadList();
                                $("#masterSlaveListWin" + _this.menuid).window("close");
                            } else {
                                $.messager.alert("提示框", res.errorMessage);
                            }
                        })
                    }},
                {
                    text: '取消',
                    handler: function () {
                        _this.clear();
                        $("#masterSlaveListWin" + _this.menuid).window("close");
                    }
                }
            ]
        });
    },
    mDel: function () {
        var _this = this;
        var rows = $("#treelist" + this.menuid).treegrid("getSelections");
        var deleteIds = [];
        for (var i = 0; i < rows.length; i++) {
            deleteIds.push("'" + rows[i].id + "'");
        }
        if (deleteIds == false) {
            return;
        }
        $.messager.confirm("提示框", "确定删除吗", function (r) {
            if (r) {
                $.post(global._prefix + "/manage/news/deleteNews", {ids: deleteIds.toString()}, function (res) {
                    res = eval("(" + res + ")");
                    if (res.type === "1") {
                        _this.reloadList();
                    } else {
                        $.messager.alert("提示框", res.errorMessage);
                    }
                });
            }
        })
    },
    add: function () {
        this.clear();
        this.pid = "";
        $("#masterSlavePath" + this.menuid).html("");
        $("#masterSlaveListMenuid" + this.menuid).val(this.menuid);
        $("#masterSlaveListWin" + this.menuid).dialog("open");
    },
    addNext: function () {
        var selectedNode = $("#treelist" + this.menuid).treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要增添的上级");
            return;
        }
        this.clear();
        this.pid = selectedNode.id;
        $("#masterSlavePath" + this.menuid).html("");
        $("#masterSlaveListMenuid" + this.menuid).val(this.menuid);
        $("#masterSlaveListWin" + this.menuid).dialog("open");
    },
    edit: function () {
        this.clear();
        var _this = this;
        var selectedNode = $("#treelist" + this.menuid).treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要编辑的项");
            return;
        }
        this.pid = selectedNode.pid;
        $("#masterSlavePath" + _this.menuid).html("");
//        $.post(global._prefix+"/manage/uploadify/getAttachment",{newsid:selectedNode.id},function(res){
//            res=eval("("+res+")");
//            if(res.type==="1"){
//                _this.attachmentPath=res.attachmentPath;
//                _this.attachmentID=res.attachmentID;
//                _this.attachmentName=res.attachmentName;
//                $("#masterSlavePath"+_this.menuid).html("<span>"+res.attachmentName+"</span>");
//            }
        _this.attachmentPath = selectedNode.attachmentPath?selectedNode.attachmentPath:"";
        _this.attachmentID = selectedNode.attachmentID?selectedNode.attachmentID:"";
        _this.attachmentName = selectedNode.attachmentName?selectedNode.attachmentName:"";
        $("#masterSlavePath"+_this.menuid).html("<span>"+ _this.attachmentName+"</span>");
        $("#masterSlaveListId" + _this.menuid).val(selectedNode.id);
        $("#masterSlaveListTitle" + _this.menuid).val(selectedNode.title);
        _this.editor.html(selectedNode.content);
        $("#masterSlaveListWin" + _this.menuid).window("open");
//        });

    },
    clear: function () {
        $("#masterSlaveListMenuid" + this.menuid).val("");
        $("#masterSlaveListId" + this.menuid).val("");
        $("#masterSlaveListTitle" + this.menuid).val("");
        this.editor.html("");
        this.attachmentPath = "";
        this.attachmentID = "";
        this.attachmentName = "";
    },
    upload: function () {
        var _this = this;
        $('#file_upload' + this.menuid).uploadify({
            'swf': global._prefix + '/scripts/uploadify/uploadify.swf?val=' + Math.random(),
            'uploader': global._prefix + '/manage/Uploadify/upload',
            'folder': global._prefix + '/files/masterslave/',
            'cancelImg': global._prefix + '/scripts/uploadify/uploadify-cancel.png',
            'fileTypeExts': '*',
            'fileDesc': '*',
            'removeTimeout': 0.1,
            'buttonClass': 'browser',
            'fileSizeLimit': 1024 * 1024 * 2000, //2G
            'multi': false,
            'buttonText': '浏览文件',
            'onUploadSuccess': function (fileObj, data, response) {
                var msg = eval("(" + data + ")");
                if (msg.type === "1") {
                    _this.attachmentID = msg.attachmentID;
                    _this.attachmentName = msg.attachmentName;
                    _this.attachmentPath = msg.attachmentPath;
                    $("#masterSlavePath" + _this.menuid).html("<span>" + msg.attachmentName + "</span>");
                } else {
                    $.messager.alert("提示框", msg.errMessage);
                }
            },
            'auto': true,
            'onSelect': function (fileObj) {
                var maxSize = 1024 * 1024 * 2000;
                if (fileObj.size > maxSize) {
                    $.messager.alert("提示框", "上传文件不能超过2G");
                    $('#file_upload' + _this.menuid).uploadify('cancel');
                    return false;
                }
                if (fileObj.type.toUpperCase() === ".EXE") {
                    $.messager.alert("提示框", "为了安全，不能上传exe文件");
                    $('#file_upload' + _this.menuid).uploadify('cancel');
                    return false;
                }
            }
        });
    },
    init: function () {
        this.createTable();
        this.createDialog();
        this.editor = KindEditor.create("#masterSlaveListContent" + this.menuid, {
            resizeType: 1,
            allowPreviewEmoticons: false,
            allowImageUpload: false,
            items: [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
        this.upload();
    }
}
