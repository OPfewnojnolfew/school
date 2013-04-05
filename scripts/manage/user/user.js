function User() {
    //表单
    this.userName = null;
    this.nickName = null;
    this.password = null;
    //弹框和列表
    this.list = null;
    this.dialog = null;
    this.init();

}
User.prototype = {
    createTable: function () {
        var _this = this;
        this.list.datagrid({
            striped: true,
            idField: 'account_id',
            pagination: true,
            sortName: 'regist_time',
            fitColumns: true,
            url: global._prefix + "/manage/user/userlist",
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
                    {field: 'username', title: '用户名', width: 200},
                    {field: 'nickname', title: '昵称', width: 50},
                    {field: 'login_time', title: '最近登录时间', width: 50},
                    {field: 'login_ip', title: 'IP', width: 50},
                    {field: 'logincount', title: '登录次数', width: 50}
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
        this.list.datagrid("load");
    },
    createDialog: function () {
        var _this = this;
        this.dialog.dialog({
            title: "",
            width: 400,
            height: 250,
            modal: true,
            resizable: true,
            minimizable: true,
            maximizable: true,
            inline: true,
            closed: true,
            buttons: [
                {
                    text: '确定',
                    handler: function () {
                        var userName = $.trim(_this.userName.val());
                        if (userName === "") {
                            $.messager.alert("提示框", "用户名不能为空", "", function () {
                                _this.userName.focus();
                            });
                            return;
                        }
                        var password = $.trim(_this.password.val());
                        if (password === "") {
                            $.messager.alert("提示框", "密码不能为空", "", function () {
                                _this.password.focus();
                            });
                            return;
                        }
                        var postData = {
                            userName: userName,
                            nickName: $.trim(_this.nickName.val()),
                            password: password
                        }
                        $.post(global._prefix + "/manage/user/addUser", postData, function (res) {
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
            if(rows[i].username=="admin"){
                $.messager.alert("提示框","不能删除超级管理员");
                return;
            }
            deleteIds.push("'" + rows[i].account_id + "'");
        }
        if (deleteIds == false) {
            return;
        }
        $.messager.confirm("提示框", "确定删除吗", function (r) {
            if (r) {
                $.post(global._prefix + "/manage/user/deleteUsers", {ids: deleteIds.toString()}, function (res) {
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
//    edit: function () {
//        var selectedNode = this.list.datagrid("getSelected");
//        if (selectedNode === null) {
//            $.messager.alert("提示框", "请选择要编辑的项");
//            return;
//        }
//        this.id = selectedNode.account_id;
//        this.userName.val(selectedNode.username);
//        this.userName.attr("readonly", "readonly");
//        this.nickName.val(selectedNode.nickname);
//        this.dialog.dialog("open");
//    },
    clear: function () {
        this.userName.val("");
        this.userName.removeAttr("readonly");
        this.nickName.val("");
        this.password.val("");
    },
    init: function () {
        this.userName = $("#userUserName");
        this.nickName = $("#userNickName");
        this.password = $("#userPassword");
        this.list = $("#userList");
        this.dialog = $('#userWin');
        this.createTable();
        this.createDialog();
    }
}