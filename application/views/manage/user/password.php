<script type="text/javascript">
    $(function () {
        $("#oldPassword").val("");
        $("#newPassword").val("");
        $("#againNewPassword").val("");
        $("#changePasswordSave").click(function () {
            var oldPassword = $.trim($("#oldPassword").val());
            var newPassword = $.trim($("#newPassword").val());
            var againNewPassword = $.trim($("#againNewPassword").val());
            if (oldPassword === "") {
                $.messager.alert("提示框", "原密码不能为空", "", function () {
                    $("#oldPassword").focus();
                });
                return;
            }
            if (newPassword === "") {
                $.messager.alert("提示框", "新密码不能为空", "", function () {
                    $("#newPassword").focus();
                });
                return;
            }
            if (newPassword !== againNewPassword) {
                $.messager.alert("提示框", "两次输入的密码不一致", "", function () {
                    $("#againNewPassword").focus();
                });
                return;
            }
            $.post(global._prefix + "/manage/user/changePassword", {oldPassword: oldPassword, newPassword: newPassword}, function (res) {
                res = eval("(" + res + ")");
                if (res.type === "1") {
                    $("#oldPassword").val("");
                    $("#newPassword").val("");
                    $("#againNewPassword").val("");
                    $.messager.alert("提示框", "更新成功");
                } else {
                    $.messager.alert("提示框", res.errorMessage);
                }
            })
        })
    })
</script>
<div class="division">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
        <tbody>
        <tr>
            <th>
                原密码：
            </th>
            <td>
                <input type="text" id="oldPassword"
                       class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
            </td>
        </tr>
        <tr>
            <th>
                新密码：
            </th>
            <td>
                <input type="text" id="newPassword"
                       class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
            </td>
        </tr>
        <tr>
            <th>
                确认密码：
            </th>
            <td>
                <input type="text" id="againNewPassword"
                       class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div>
    <a href="javascript:void(0)" id="changePasswordSave" class="easyui-linkbutton">确定</a>
</div>