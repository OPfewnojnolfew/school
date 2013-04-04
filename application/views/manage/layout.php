<!DOCTYPE HTML>
<html>
<title>校团委后台管理</title>
<head>
    <style type="text/css">
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/manage/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/easyuithemes/icon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/easyuithemes/gray/easyui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/manage/common.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/manage/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>themes/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>scripts/uploadify/uploadify.css">
</head>
<body class="easyui-layout">
<!--north start-->
<div data-options="region:'north',border:false" style="height:60px;background:#fff;padding:0px">
    <div class="site_title">浙江海洋学院校团委网站后台管理</div>
    <div id="sessionInfoDiv" style="position: absolute;right: 5px;top:10px;">
        [<strong></strong>]，欢迎你！您使用[<strong>123.232.103.195</strong>]IP登录！
    </div>
    <div style="position: absolute; right: 0px; bottom: 0px; ">
        <a href="javascript:void(0);" class="easyui-menubutton" data-options="menu:'#layout_north_pfMenu',iconCls:'icon-ok'">更换皮肤</a> <a href="javascript:void(0);" class="easyui-menubutton" data-options="menu:'#layout_north_kzmbMenu',iconCls:'icon-help'">控制面板</a> <a href="javascript:void(0);" class="easyui-menubutton" data-options="menu:'#layout_north_zxMenu',iconCls:'icon-back'">注销</a>
    </div>
    <div id="layout_north_pfMenu" style="width: 120px; display: none;">
        <div onclick="changeTheme('default');">default</div>
        <div onclick="changeTheme('gray');">gray</div>
        <div onclick="changeTheme('metro');">metro</div>
        <div onclick="changeTheme('cupertino');">cupertino</div>
        <div onclick="changeTheme('dark-hive');">dark-hive</div>
        <div onclick="changeTheme('pepper-grinder');">pepper-grinder</div>
        <div onclick="changeTheme('sunny');">sunny</div>
    </div>
    <div id="layout_north_kzmbMenu" style="width: 100px; display: none;">
        <div onclick="userInfoFun();">个人信息</div>
        <div onclick="userInfoFun();">退出登录</div>
    </div>
    <div id="layout_north_zxMenu" style="width: 100px; display: none;">
        <div onclick="logoutFun();">锁定窗口</div>
        <div class="menu-sep"></div>
        <div onclick="logoutFun();">重新登录</div>
        <div onclick="logoutFun(true);">退出系统</div>
    </div>
</div>
<!--north end-->

<!--west start-->
<div data-options="region:'west',split:true,title:'导航菜单'" style="width:200px;">
    <div class="easyui-accordion sider" data-options="fit:true,border:false">
        <!--//左侧菜单导航-->
        <div title="基础功能" data-options="iconCls:'icon-mini-add'" style="padding:10px;">
            <ul class="easyui-tree" data-options="animate:false">
                <li data-options="state:'open'">
                    <span>新闻管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/news/')?>" type="nav_head" rel="">新闻列表</a></li>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/menus/')?>" type="nav_foot" rel="">新闻分类</a></li>                    </ul>
                </li>
            </ul>
        </div><!--waiceng-->
        <div title="客服中心" data-options="iconCls:'icon-mini-add'" style="padding:10px;">
            <ul class="easyui-tree" data-options="animate:true">
                <li data-options="state:'closed'">
                    <span>文档管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="/admin.php/News/index" type="news_list" rel="">文档列表</a></li><li><a href="javascript:viod(0);" cmshref="/admin.php/News/index" type="news_list_add" rel="">添加文档</a></li><li><a href="javascript:viod(0);" cmshref="/admin.php/News/recycle" type="news_recycle" rel="">文档回收站</a></li>                    </ul>
                </li><li data-options="state:'closed'">
                    <span>分类管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="/admin.php/NewsSort/index" type="sort_list" rel="">分类列表</a></li><li><a href="javascript:viod(0);" cmshref="/admin.php/NewsSort/add" type="newssort" rel="dialog">添加分类</a></li>                    </ul>
                </li><li data-options="state:'closed'">
                    <span>留言管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="/admin.php/Message/index" type="message_list" rel="">留言信息</a></li><li><a href="javascript:viod(0);" cmshref="/admin.php/Message/sort" type="message_setting" rel="">留言分类</a></li>                    </ul>
                </li><li data-options="state:'closed'">
                    <span>评论管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="/admin.php/Comment/index" type="comment_list" rel="">评论信息</a></li>                    </ul>
                </li><li data-options="state:'closed'">
                    <span>单页管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="/admin.php/Pages/index" type="singlepage_list" rel="">单页文档</a></li><li><a href="javascript:viod(0);" cmshref="/admin.php/Pages/sort" type="singlepage_sort" rel="">单页分类</a></li>                    </ul>
                </li><li data-options="state:'closed'">
                    <span>碎片文档</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="/admin.php/Block/index" type="block_list" rel="">碎片列表</a></li><li><a href="javascript:viod(0);" cmshref="/admin.php/Block/sort" type="block_cat" rel="">碎片分类</a></li>                    </ul>
                </li>        </ul>
        </div><!--waiceng--><div title="帐号中心" data-options="iconCls:'icon-mini-add'" style="padding:10px;">
            <ul class="easyui-tree" data-options="animate:true">
                <li data-options="state:'closed'">
                    <span>用户管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/user/')?>" type="member_perinfo" rel="">用户列表</a></li>
                </li>
            </ul>
        </div>           <!--//左侧菜单导航-->
    </div><!--accordion-->

</div>
<!--west end-->

<!--south start-->
<div data-options="region:'south',border:false" style="height:50px;background:#fff;padding:10px;">
    <div id="footer">
        Copyright &copy; 2013 by 色彩工作室.<br>
        All Rights Reserved<br>
    </div>
</div>
<!--south end-->
<!--center start -->
<div data-options="region:'center'" class="indexcenter" title="欢迎使用浙江海洋学院校团委网站后台管理">
    <div id="tabs_index" class="easyui-tabs"  fit="true" border="false"  >
        <div title="首页" style="overflow:hidden; " >
        </div>
    </div>

</div>
<!--center end -->

<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/manage/common.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/easyui-lang-zh_CN.js"></script>
<script charset="utf-8" src="<?php echo base_url();?>themes/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo base_url();?>themes/kindeditor/zh_CN.js"></script>
<script src="<?php echo base_url();?>scripts/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>scripts/ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>scripts/ueditor/editor_all_min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url();?>scripts/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/single.js"></script>
<script type="text/javascript"
        src="<?php echo base_url();?>scripts/manage/news/masterSlaveList.js"></script>
<script type="text/javascript" >

$(function(){
    $('.sider li a').click(function(){
        var classId = 'index';
        var subtitle = $(this).text();
        var url = $(this).attr('cmshref');
        var rel = $(this).attr('rel');
        //左侧直接打开弹窗sss
        if(rel=='dialog'){
            var type = $(this).attr('type');
            //alert(type);
            openDialog(type,url,subtitle);
            return false;
        }
        //更新内容到右侧的tabs内容区
        if(!$('#tabs_'+classId).tabs('exists',subtitle)){
            $('#tabs_'+classId).tabs('add',{
                title:subtitle,
                content:subtitle,
                closable:true,
                href:url
            });
            return false;
        }else{
            $('#tabs_'+classId).tabs('select',subtitle);
            return false;
        }
    });
});


</script>

</body>
</html>
