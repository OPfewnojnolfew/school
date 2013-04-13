function MasterSlaveList(menuid) {
    this.menuid = menuid;
    this.id = "";
    this.pid = "";

    this.title = null;
    this.editor = null;
    this.uploadImage = null;
    this.viewImage = null;

    this.attachmentPath = "";
    this.attachmentID = "";
    this.attachmentName = "";

    this.treeList = null;
    this.dialog = null;
    this.init();

}
MasterSlaveList.prototype = {
    createTable: function () {
        var _this = this;
        this.treeList.treegrid({
            striped: true,
            idField: 'id',
            treeField: 'title',
            pagination: true,
            sortName: 'createtime',
            sortOrder: 'desc',
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
                $(this).treegrid("clearSelections");
            },
            onClickRow: function (rowIndex) {
                $(this).treegrid("unselectRow", rowIndex);
            }
        });
    },
    reloadList: function () {
        this.createTable();
    },
    createDialog: function () {
        var _this = this;
        this.dialog.dialog({
            title: "",
            width: 950,
            height: 550,
            modal: true,
            resizable: true,
            maximizable: true,
            inline: true,
            closed: true,
            buttons: [
                {
                    text: '确定',
                    handler: function () {
                        var title = $.trim(_this.title.val());
                        if (title === "") {
                            $.messager.alert("提示框", "标题不能为空", "", function () {
                                _this.title.focus();
                            });
                            return;
                        }
                        var postData = {
                            pid: _this.pid,
                            menuid: _this.menuid,
                            id: _this.id,
                            title: title,
                            attachmentID: _this.attachmentID,
                            content: _this.editor.getContent()
                        }
                        $.post(global._prefix + "/manage/news/addOrEditMasterSlaveList", postData, function (res) {
                            res = eval("(" + res + ")");
                            if (res.type === "1") {
                                _this.reloadList();
                                _this.dialog.window("close");
                            } else {
                                $.messager.alert("提示框", res.errorMessage);
                            }
                        })
                    }},
                {
                    text: '取消',
                    handler: function () {
                        _this.clear();
                        _this.dialog.window("close");
                    }
                }
            ]
        });
    },
    //需要修改，若删除父级
    mDel: function () {
        var _this = this;
        var rows = _this.treeList.treegrid("getSelections");
        var deleteIds = [];
        for (var i = 0; i < rows.length; i++) {
            console.log(_this.treeList.treegrid("getChildren", rows[i].id));
            if (_this.treeList.treegrid("getChildren", rows[i].id).length > 0) {
                $.messager.alert("提示框", "请先删除子元素");
                return;
            }
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
        this.dialog.dialog("open");
    },
    addNext: function () {
        var selectedNode = this.treeList.treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要增添的上级");
            return;
        }
        this.clear();
        this.pid = selectedNode.id;
        this.dialog.dialog("open");
    },
    edit: function () {
        this.clear();
        var _this = this;
        var selectedNode = this.treeList.treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要编辑的项");
            return;
        }
        this.pid = selectedNode.pid;
        this.id = selectedNode.id;
        this.title.val(selectedNode.title);
        this.editor.setContent(selectedNode.content, false);
        if (selectedNode.attachmentID !== null) {
            this.attachmentPath = selectedNode.attachmentPath ? selectedNode.attachmentPath : "";
            this.attachmentID = selectedNode.attachmentID ? selectedNode.attachmentID : "";
            this.attachmentName = selectedNode.attachmentName ? selectedNode.attachmentName : "";
            this.viewImage.html("<img src='" + global._prefix + "/" + selectedNode.attachmentPath + "' alt='" + selectedNode.attachmentName + "'>");
        }
        this.dialog.window("open");
    },
    clear: function () {
        this.id = "";
        this.pid = "";
        this.title.val("");
        this.viewImage.html("");
        this.editor.setContent("", false);
        this.attachmentPath = "";
        this.attachmentID = "";
        this.attachmentName = "";
    },
    upload: function () {
        var _this = this;
        this.uploadImage.uploadify({
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
                    _this.viewImage.html("<img src='" + global._prefix + "/" + msg.attachmentPath + "' alt='" + msg.attachmentName + "'>");
                } else {
                    $.messager.alert("提示框", msg.errMessage);
                }
            },
            'auto': true,
            'onSelect': function (fileObj) {
                var maxSize = 1024 * 1024 * 2000;
                if (fileObj.size > maxSize) {
                    $.messager.alert("提示框", "上传文件不能超过2G");
                    $(this).uploadify('cancel');
                    return false;
                }
                if (fileObj.type.toUpperCase() === ".EXE") {
                    $.messager.alert("提示框", "为了安全，不能上传exe文件");
                    $(this).uploadify('cancel');
                    return false;
                }
            }
        });
    },
    init: function () {
        this.title = $("#masterSlaveListTitle" + this.menuid);

        this.uploadImage = $('#file_upload' + this.menuid);
        this.viewImage = $('#masterSlavePath' + this.menuid);

        this.treeList = $("#treelist" + this.menuid);
        this.dialog = $('#masterSlaveListWin' + this.menuid);

        this.createTable();
        this.createDialog();
        this.upload();
        this.editor = UE.getEditor('masterSlaveListContent' + this.menuid);
    }
}
