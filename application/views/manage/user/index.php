<script type="text/javascript">
    $(function () {
        var user = new User();
        $("#userMDel").click(function () {
            user.mDel()
        });
        $("#userAdd").click(function () {
            user.add()
        });
    });

</script>
<div id="userSearchbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="userAdd">新增</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" id="userMDel">批量删除</a>
</div>
<table id="userList" toolbar="#userSearchbar"></table>
<div id="userWin" class="easyui-dialog">
    <div class="division">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
            <tbody>
            <tr>
                <th>
                    用户名：
                </th>
                <td>
                    <input type="text" id="userUserName"
                           class="easyui-validatebox easyui_form_input" style="width:240px;"
                           data-options="required:true">
                </td>
            </tr>
            <tr>
                <th>
                    昵称：
                </th>
                <td>
                    <input type="text" id="userNickName"
                           class="easyui-validatebox easyui_form_input" style="width:240px;">
                </td>
            </tr>
            <tr>
                <th>
                    密码：
                </th>
                <td>
                    <input type="password" id="userPassword"
                           class="easyui-validatebox easyui_form_input" style="width:240px;">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>