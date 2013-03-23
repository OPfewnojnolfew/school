<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/easyuithemes/icon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/easyuithemes/gray/easyui.css" />
    <script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.easyui.min.js"></script>
</head>
<body style="height:100%;width:100%;overflow:hidden;border:none;" >
<div id="win"  title="登录" style="width:300px;height:180px;">
    <form style="padding:10px 20px 10px 40px;" autocomplete="false">
        <p>用户: <input type="text" class="easyui-validatebox"  name="username" id="username" data-options="required:true"></p>
        <p>密码: <input type="password" class="easyui-validatebox" name="password" id="password" data-options="required:true"></p>
        <div style="padding:5px;text-align:center;">
            <a href="javascript:void(0);" class="easyui-linkbutton" icon="icon-ok" id="login">登录</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" icon="icon-cancel" id="clear">清空</a>
        </div>
    </form>
</div>

</body>
<script type="text/javascript">
    var loginWin = $("#win").window();
    var loginForm = loginWin.find("form");
    loginForm.form('clear');
    $("#login").click(function(){
        $.ajax({
            url : "<?php echo base_url('manage/login/check/') ?>",
            type : "post",
            dataType : "json",
            data : {username : $("#username").val(),password:$("#password").val()},
            success : function (data) {
                if (data.errorcode==1) {
                    $.messager.alert('错误',data.message,'error');
                    return false;
                } else {
                    window.location.href = "<?echo base_url('manage/index/') ?>"
                }
            }
        })

    });
    $("#clear").click(function(){
        loginForm.form('clear');
    });
</script>
</body>
</html>