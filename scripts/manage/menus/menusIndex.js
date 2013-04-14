function Menu() {
    this.id = "";
    this.pid = "";

    this.name = null;
    this.type = null;

    this.treeList = null;
    this.dialog = null;
    this.init();
}
Menu.prototype = {
    createTable: function () {
        var _this = this;
        this.treeList.treegrid({
            title: '菜单管理',
            nowrap: false,
            collapsible: true,
            url: global._prefix + "/manage/menus/initData",
            idField: 'id',
            treeField: 'name',
            singleSelect: true,
            fitColumns: true,
            loadMsg: "数据加载中，请稍后...",
            frozenColumns: [
                [
                    {field: "ck", checkbox: true },
                    { field: "name", title: "", width: 250 }
                ]
            ],
            columns: [
                [
                    { field: "type", title: "类型", width: 150,
                        formatter: function (value) {
                            switch (value) {
                                case "1":
                                    return "简介";
                                case "2":
                                    return "一般列表";
//                                case "4":
//                                    return "链接列表";
                                case "3":
                                    return "图片列表";
//                                case "5":
//                                    return "附件列表";
                                case "6":
                                    return "主从列表";
//                                case "7":
//                                    return "视频列表";
                                default:
                                    return "";
                            }
                        }
                    },
                    { field: "createTime", title: "创建时间", width: 180 }
                ]
            ],
            onLoadSuccess: function () {
                $(this).treegrid("clearSelections");
            },
            onDblClickRow: function (row) {
                _this.id = row.id;
                _this.name.val(row.name);
                _this.type.combobox("setValue", row.type)
                _this.dialog.window("open");
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
            width: 550,
            height: 250,
            modal: true,
            resizable: true,
            maximizable: true,
            inline: true,
            closed: true,
            buttons: [
                {
                    text: '确定',
                    handler: function () {
                        var name = $.trim(_this.name.val());
                        if (name === "") {
                            $.messager.alert("提示框", "名称不能为空", "", function () {
                                _this.name.focus();
                            });
                            return;
                        }
                        var postData = {
                            pid: _this.pid,
                            id: _this.id,
                            name: name,
                            type: _this.type.combobox("getValue")
                        }
                        $.post(global._prefix + "/manage/menus/addOrEdit", postData, function (res) {
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
        var selectedNode = _this.treeList.treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要编辑的项");
            return;
        }
        if (_this.treeList.treegrid("getChildren", selectedNode.id).length > 0) {
            $.messager.alert("提示框", "请先删除子元素");
            return;
        }
        $.messager.confirm("提示框", "该菜单下的数据可能会被删除！确定删除吗？", function (r) {
            if (r) {
                $.post(global._prefix + "/manage/menus/del", {id: selectedNode.id}, function (res) {
                    var res = eval("(" + res + ")");
                    if (res.type === "1") {
                        _this.dialog.window("close");
                        _this.reloadList();
                    } else {
                        $.messager.alert("提示框", res.errorMessage);
                    }
                })
            }
        })
    },
    add: function () {
        this.clear();
        this.dialog.dialog("open");
    },
    addChild: function () {
        this.clear();
        var selectedNode = this.treeList.treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要增添的父级");
            return;
        }
        this.pid = selectedNode.id;
        this.dialog.window("open");
    },
    edit: function () {
        var selectedNode = this.treeList.treegrid("getSelected");
        if (selectedNode === null) {
            $.messager.alert("提示框", "请选择要编辑的项");
            return;
        }
        this.id = selectedNode.id;
        //this.pid = selectedNode._parentId;
        this.name.val(selectedNode.name);
        this.type.combobox("setValue", selectedNode.type)
        this.dialog.window("open");
    },
    clear: function () {
        this.id = "";
        this.pid = "";
        this.name.val("");
        this.type.combobox("setValue", "0")
    },
    init: function () {
        this.name = $("#menuName");
        this.type = $("#menuType");
        this.treeList = $("#menuTree");
        this.dialog = $('#menuWin');
        this.createTable();
        this.createDialog();
    }
}

//function reloadTree() {
//    $("#menuTree").treegrid("reload");
//}
//$(function () {
//    $("#menuTree").treegrid({
//        title: '菜单管理',
//        nowrap: false,
//        collapsible: true,
//        url: global._prefix + "/manage/menus/initData",
//        idField: 'id',
//        treeField: 'name',
//        singleSelect: true,
//        fitColumns: true,
//        //height: 450,
//        loadMsg: "数据加载中，请稍后...",
//        frozenColumns: [
//            [
//                {field: "ck", checkbox: true },
//                { field: "name", title: "", width: 250 }
//            ]
//        ],
//        columns: [
//            [
//                { field: "type", title: "类型", width: 150,
//                    formatter: function (value) {
//                        switch (value) {
//                            case "1":
//                                return "简介";
//                            case "2":
//                                return "一般列表";
//                            case "4":
//                                return "链接列表";
//                            case "3":
//                                return "图片列表";
//                            case "5":
//                                return "附件列表";
//                            case "6":
//                                return "主从列表";
//                            case "7":
//                                return "视频列表";
//                            default:
//                                return "";
//                        }
//                    }
//                },
//                { field: "createTime", title: "创建时间", width: 180 }
//            ]
//        ],
//        onLoadSuccess: function () {
//            $(this).treegrid("unselectAll");
//        }
//    });
////    $("#menuWin").window({
////    	closed:true
////    })
//    $("#menuAddRoot").click(function () {
//        clear();
//        $("#menuHdnID").val("0");
//        $("#menuHdnIsAdd").val("1");
//        $("#menuWin").window("open");
//    })
//    $("#menuAddChild").click(function () {
//        clear();
//        var selectedNode = $("#menuTree").treegrid("getSelected");
//        if (selectedNode === null) {
//            $.messager.alert("提示框", "请选择要增添的父级");
//            return;
//        }
//        $("#menuHdnID").val(selectedNode.id);
//        $("#menuHdnIsAdd").val("1");
//        $("#menuWin").window("open");
//
//    })
//    $("#menuEdit").click(function () {
//        clear();
//        var selectedNode = $("#menuTree").treegrid("getSelected");
//        if (selectedNode === null) {
//            $.messager.alert("提示框", "请选择要编辑的项");
//            return;
//        }
//        $("#menuHdnID").val(selectedNode.id);
//        $("#menuName").val(selectedNode.name);
//        $("#menuType").val(selectedNode.type);
//        $("#menuHdnIsAdd").val("0");
//        $("#menuWin").window("open");
//
//    });
//    $("#menuBtnSure").click(function () {
//        $.post(global._prefix + "/manage/menus/addOrEdit", {name: $("#menuName").val(), type: $("#menuType").val(), id: $("#menuHdnID").val(), isAdd: $("#menuHdnIsAdd").val()}, function () {
//            $("#menuWin").window("close");
//            reloadTree();
//        })
//    })
//    $("#menuBtnClose").click(function () {
//        clear();
//        $("#menuWin").window("close");
//    })
//    $("#menuDel").click(function () {
//        var selectedNode = $("#menuTree").treegrid("getSelected");
//        if (selectedNode === null) {
//            $.messager.alert("提示框", "请选择要编辑的项");
//            return;
//        }
//        $.messager.confirm("提示框", "该菜单下的数据可能会被删除！确定删除吗？", function (r) {
//            if (r) {
//                $.post(global._prefix + "/manage/menus/del", {id: selectedNode.id}, function (res) {
//                    var res = eval("(" + res + ")");
//                    if (res.type === "1") {
//                        $("#menuWin").window("close");
//                        reloadTree();
//                    } else {
//                        $.messager.alert("提示框", res.errorMessage);
//                    }
//                })
//            }
//        })
//    })
//})
//function clear() {
//    $("#menuHdnIsAdd").val("0");//1新增，0编辑
//    $("#menuHdnID").val("");
//    $("#menuName").val("");
//    $("#menuType").val("");
//}