function MultiAttrList(menuid) {
    this.menuid = menuid;
    this.id = "";
    this.attachment = [];
    //表单
    this.editor = null;
    this.title = null;
    this.uploadFile = null;
    this.viewFile = null;
    //搜索
    this.searchTitle = null;
    this.searchBegin = null;
    this.searchEnd = null;
    //弹框和列表
    this.list = null;
    this.dialog = null;
    this.init();
}
MultiAttrList.prototype = {
    createTable: function () {
        var _this = this;
        this.list.datagrid({
            striped: true,
            idField: 'id',
            pagination: true,
            sortName: 'createtime',
            sortOrder:'desc',
            fitColumns: true,
            url: global._prefix + "/manage/news/initData",
            queryParams: {menuid: _this.menuid},
            frozenColumns: [
                [
                    {
                        field: "ck",
                        checkbox: true
                    }
                ]
            ],
            columns: [
                [
                    {
                        field: 'title',
                        title: '标题',
                        width: 200,
                        sortable: true
                    },
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
                $(this).datagrid("clearSelections");
            },
            onClickRow: function (rowIndex) {
                $(this).datagrid("unselectRow", rowIndex);
            }
        });
    },
    reloadList: function () {
        this.list.datagrid("load", {
            title: $.trim(this.searchTitle.val()),
            begin: this.searchBegin.val(),
            end: this.searchEnd.val(),
            menuid: this.menuid
        });
    },
    createDialog: function () {
        var _this = this;
        this.dialog.dialog({
            title: "",
            width: 900,
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
                        var attachmentIDs = [];
                        for (var i = 0; i < _this.attachment.length; i++) {
                            attachmentIDs.push(_this.attachment[i].attachmentID);
                        }
                        var postData = {
                            menuid: _this.menuid,
                            id:  _this.id,
                            title: title,
                            attachmentIDs: attachmentIDs.toString(),
                            content: _this.editor.getContent()
                        }
                        $.post(global._prefix + "/manage/news/addOrEditMultiAttrList", postData, function (res) {
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
    mDel: function () {
        var _this = this;
        var rows = this.list.datagrid("getSelections");
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
        this.dialog.dialog("open");
    },
    edit: function () {
        this.clear();
        var _this = this;
        var selectedNode = this.list.datagrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要编辑的项");
            return;
        }
        this.id=selectedNode.id;
        this.title.val(selectedNode.title);
        _this.editor.setContent(selectedNode.content,false);
        $.post(global._prefix + "/manage/uploadify/getMultiAttachment", {newsid: selectedNode.id}, function (res) {
            res = eval("(" + res + ")");
            if (res.type === "1") {
                for (var i = 0; i < res.attachment.length; i++) {
                    _this.additionAttachment(res.attachment[i]);
                }
            }
        });
        this.dialog.window("open");
    },
    clear: function () {
        this.id = "";
        this.title.val("")
        this.viewFile.html("");
        this.editor.setContent("", false);
        this.attachment = [];
    },
    upload: function () {
        var _this = this;
        this.uploadFile.uploadify({
            'swf': global._prefix + '/scripts/uploadify/uploadify.swf?val=' + Math.random(),
            'uploader': global._prefix + '/manage/Uploadify/multiUpload',
            'folder': global._prefix + '/files/multiAttr/',
            'cancelImg': global._prefix + '/scripts/uploadify/uploadify-cancel.png',
            'fileTypeExts': '*',
            'fileDesc': '*',
            'removeTimeout': 0.1,
            'buttonClass': 'browser',
            'fileSizeLimit': 1024 * 1024 * 2000, //2G
            'multi': true,
            'buttonText': '浏览文件',
            'onUploadSuccess': function (fileObj, data, response) {
                var msg = eval("(" + data + ")");

                if (msg.type === "1") {
                    _this.additionAttachment({attachmentID: msg.attachmentID, attachmentName: msg.attachmentName, attachmentPath: msg.attachmentPath});
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
        this.title = $("#multiAttrListTitle" + this.menuid);

        this.uploadFile = $('#file_upload' + this.menuid);

        this.searchTitle = $("#title" + this.menuid);
        this.searchBegin = $("#begin" + this.menuid);
        this.searchEnd = $("#end" + this.menuid);
        this.list = $("#list" + this.menuid);
        this.dialog = $('#multiAttrListWin' + this.menuid);
        this.viewFile = $('#multiAttrPath' + this.menuid);

        this.createTable();
        this.createDialog();
        this.upload();
        this.editor = UE.getEditor('multiAttrListContent' + this.menuid);
    },
    additionAttachment: function (attr) {
        var _this = this;
        _this.attachment.push({attachmentID: attr.attachmentID, attachmentPath: attr.attachmentPath, attachmentName: attr.attachmentName})
        var dv = $("<div></div>");
        var spanName = $("<span>" + attr.attachmentName + "</span>");
        var aDel = $('<a href="javascript:void(0)" delattr="' + attr.attachmentID + '"><img src="'+global._prefix+'/themes/images/no.png"></a>');
        aDel.click(function () {
            var that = this;
            $.post(global._prefix + "/manage/uploadify/delete", {attachmentID: $(this).attr("delattr"), callback: Math.random()}, function (res) {
                res = eval("(" + res + ")");
                if (res.type === "1") {
                    $(that).parent().remove();
                    for (var j = 0; j < _this.attachment.length; j++) {
                        if (_this.attachment[j].attachmentID == $(that).attr("delattr")) {
                            _this.attachment.splice(j, 1);
                        }
                    }
                }
                else {
                    $.messager.alert("提示框", res.errMessage);
                }
            })
        })
        dv.append(spanName);
        dv.append(aDel)
        _this.viewFile.append(dv);
    }

}
