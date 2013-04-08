function FriendlinkList() {
    this.id = "";
    //表单
    this.title = null;
    this.url = null;
    this.priority = null;
    this.type = null

    //搜索
    this.searchTitle = null;
    this.searchBegin = null;
    this.searchEnd = null;
    //弹框和列表
    this.list = null;
    this.dialog = null;
    //附件
    this.attachmentPath = "";

    this.uploadImage = null;
    this.viewImage = null;
    this.init();
}
FriendlinkList.prototype = {
    createTable: function () {
        var _this = this;
        this.list.datagrid({
            striped: true,
            idField: 'id',
            pagination: true,
            sortName: 'priority',
            sortOrder: "desc",
            fitColumns: true,
            url: global._prefix + "/manage/link/initData",
            columns: [
                [
                    {
                        field: "ck",
                        checkbox: true
                    },
                    {
                        field: 'imagepath',
                        formatter: function (value, rowData) {
                            if (value !== "") {
                                return "<img src='" + global._prefix + "/" + value+ "' width='50' heigt='50'>";
                            }
                            else {
                                return "";
                            }
                        }
                    },
                    {
                        field: 'name',
                        title: '名称',
                        width: 200,
                        sortable: true
                    },
                    {
                        field: 'linkurl',
                        title: '链接地址',
                        width: 100
                    },
                    { field: "type", title: "类型", width: 150,
                        formatter: function (value) {
                            if (value == "1") {
                                return "有图片链接";
                            } else {
                                return "无图片链接";
                            }
                        }
                    },
                    {
                        field: 'priority',
                        title: '优先级',
                        width: 100
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
            name: $.trim(this.searchTitle.val()),
            begin: this.searchBegin.val(),
            end: this.searchEnd.val()
        });
    },
    createDialog: function () {
        var _this = this;
        this.dialog.dialog({
            title: "",
            width: 650,
            height: 420,
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
                        var url = $.trim(_this.url.val());
                        var priority = $.trim(_this.priority.val());
                        if (title === "") {
                            $.messager.alert("提示框", "名称不能为空", "", function () {
                                _this.title.focus();
                            });
                            return;
                        }
                        if (url === "") {
                            $.messager.alert("提示框", "链接地址不能为空", "", function () {
                                _this.url.focus();
                            });
                            return;
                        }
                        if (isNaN(priority)) {
                            $.messager.alert("提示框", "排序字段只能为数字", "", function () {
                                _this.priority.focus();
                            });
                            return;
                        }
                        var postData = {
                            id: _this.id,
                            name: title,
                            linkurl: url,
                            priority: priority,
                            type:  _this.type.combobox("getValue"),
                            imagepath: _this.attachmentPath
                        }
                        $.post(global._prefix + "/manage/link/addOrEditLinkList", postData, function (res) {
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
    createType: function () {
        var _this=this;
        this.type.combobox({
            panelHeight:100,
            onSelect: function (record) {
                if (record.value == "1") {
                    _this.viewImage.parent().parent().removeAttr("style");
                } else {
                    _this.viewImage.parent().parent().css("display", "none");
                }
            }
        })
    },
    upload: function () {
        var _this = this;
        this.uploadImage.uploadify({
            'swf': global._prefix + '/scripts/uploadify/uploadify.swf?val=' + Math.random(),
            'uploader': global._prefix + '/manage/Uploadify/upload',
            'folder': global._prefix + '/files/imageorvideo/',
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
                    _this.attachmentPath = msg.attachmentPath;
                    _this.viewImage.html("<img src='" + global._prefix + "/" + msg.attachmentPath + "'>");
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
        })
        ;
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
                $.post(global._prefix + "/manage/link/deleteLinks", {ids: deleteIds.toString()}, function (res) {
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
        var selectedNode = this.list.datagrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要编辑的项");
            return;
        }
        this.id = selectedNode.id;
        this.title.val(selectedNode.name);
        this.url.val(selectedNode.linkurl);
        this.priority.val(selectedNode.priority);
        this.type.combobox("setValue",selectedNode.type);
        if (selectedNode.attachmentID !== null && this.type.combobox("getValue") == "1") {
            this.viewImage.parent().parent().removeAttr("style");
            this.attachmentPath = selectedNode.imagepath;
            this.viewImage.html("<img src='" + global._prefix + "/" + selectedNode.imagepath + "'>");
        }
        this.dialog.window("open");
    },
    clear: function () {
        this.id = "";
        this.title.val("");
        this.url.val("");
        this.priority.val("");
        this.viewImage.html("");
        this.type.combobox("setValue","0");
        this.attachmentPath = "";
        this.viewImage.parent().parent().css("display", "none");
    },
    init: function () {
        this.title = $("#friendlinkListName");
        this.url = $("#friendlinkListUrl");
        this.priority = $("#friendlinkListOrder");
        this.type = $("#friendlinkListType");

        this.searchTitle = $("#friendlinkSearchName");
        this.searchBegin = $("#friendlinkSearchBegin");
        this.searchEnd = $("#friendlinkSearchEnd");

        this.list = $("#friendlinkList");
        this.dialog = $('#friendlinkListWin');
        this.uploadImage = $('#friendLinkFileuUpload');
        this.viewImage = $('#friendLinkImagePath');
        this.createTable();
        this.createDialog();
        this.upload();
        this.createType();

    }
}