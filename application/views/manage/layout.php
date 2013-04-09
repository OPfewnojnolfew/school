<!DOCTYPE HTML>
<html>
<title>校团委后台管理</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/manage/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/easyuithemes/icon.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/easyuithemes/gray/easyui.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/manage/common.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/manage/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>scripts/uploadify/uploadify.css">
</head>
<body class="easyui-layout">
<!--north start-->
<div data-options="region:'north',border:false" style="height:60px;background:#fff;padding:0px">
    <div class="site_title">浙江海洋学院校团委网站后台管理</div>
    <div id="sessionInfoDiv" style="position: absolute;right: 5px;top:10px;">
        [<strong></strong>]，欢迎你！您使用[<strong>123.232.103.195</strong>]IP登录！
    </div>
    <div style="position: absolute; right: 0px; bottom: 0px; ">
        <a href="javascript:void(0);" class="easyui-menubutton" onclick="userInfoFun()"
           data-options="menu:'#layout_north_zxMenu',iconCls:'icon-back'">注销</a>
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
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/news/') ?>"
                               type="nav_head" rel="">新闻列表</a></li>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/menus/') ?>"
                               type="nav_foot" rel="">新闻分类</a></li>
                    </ul>
                </li>
                <li data-options="state:'open'">
                    <span>友情链接</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/link/index') ?>"
                               type="nav_head" rel="">友情链接</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--waiceng-->
        <!--waiceng-->
        <div title="帐号中心" data-options="iconCls:'icon-mini-add'" style="padding:10px;">
            <ul class="easyui-tree" data-options="animate:true">
                <li data-options="state:'closed'">
                    <span>用户管理</span>
                    <ul>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/user/') ?>"
                               type="member_perinfo" rel="">用户列表</a></li>
                        <li><a href="javascript:viod(0);" cmshref="<?php echo base_url('/manage/user/password') ?>"
                               type="member_perinfo" rel="">密码修改</a></li>
                </li>
            </ul>
        </div>
        <!--//左侧菜单导航-->
    </div>
    <!--accordion-->

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
    <div id="tabs_index" class="easyui-tabs" fit="true" border="false">
        <div title="首页" style="overflow:hidden; ">
            <div style="padding:10px;">
                <table class="dir">
                    <tr>
                        <th width="80">项目名称</th>
                        <th width="20">结果</th>
                        <th width="220">备注</th>
                    </tr>
                    <tr>
                        <td>PHP版本</td>
                        <td bgcolor="#60BF60">通过</td>
                        <td>PHP 5.1.0或更高版本是必须的。</td>
                    </tr>
                    <tr>
                        <td>DOM扩展模块</td>
                        <td bgcolor="#60BF60">通过</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>PDO扩展模块</td>
                        <td bgcolor="#60BF60">通过</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>PDO MySQL扩展模块</td>
                        <td bgcolor="#60BF60">通过</td>
                        <td>如果使用MySQL数据库，这是必须的。</td>
                    </tr>
                    <tr>
                        <td>Memcache扩展模块</td>
                        <td bgcolor="#60BF60">通过</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>SOAP扩展模块</td>
                        <td bgcolor="#60BF60">通过</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>GD extension with<br/>
                            FreeType support
                        </td>
                        <td bgcolor="#60BF60">通过</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>

            </div>
            <style>
                .dir {
                    width: 100%;
                    border-left: #E2E2E2 solid 1px;
                    border-top: #E2E2E2 solid 1px;
                    border-collapse: collapse;
                }

                .dir caption {
                    text-align: left;
                    font-size: 14px;
                }

                .dir th {
                    background-color: #E2E2E2;
                }

                .dir td {
                    border-right: #E2E2E2 solid 1px;
                    border-bottom: #E2E2E2 solid 1px;
                    vertical-align: top;
                    padding: 2px;
                }
            </style>

        </div>
    </div>

</div>
<!--center end -->

<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
        var global = {
    _prefix : "<?php echo base_url(); ?>",
    _baseUrl:"/manage/news",
    _tabIdPrefix:"tabmemu"
    }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/easyui-lang-zh_CN.js"></script>
<script src="<?php echo base_url(); ?>scripts/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>scripts/ueditor/editor_config.js"></script>
<script type="text/javascript" charset="utf-8"
        src="<?php echo base_url(); ?>scripts/ueditor/editor_all_min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/link/friendlinkList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/single.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/masterSlaveList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/imageList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/linkList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/multiAttrList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/normalList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/news/videoList.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/manage/user/user.js"></script>
<script type="text/javascript">

    function userInfoFun() {
        location.href=global._prefix + "/manage/login/logout"
    }
    $(function () {

        $('.sider li a').click(function () {
            var classId = 'index';
            var subtitle = $(this).text();
            var url = $(this).attr('cmshref');
            var rel = $(this).attr('rel');
            //左侧直接打开弹窗sss
            if (rel == 'dialog') {
                var type = $(this).attr('type');
                //alert(type);
                openDialog(type, url, subtitle);
                return false;
            }
            //更新内容到右侧的tabs内容区
            if (!$('#tabs_' + classId).tabs('exists', subtitle)) {
                $('#tabs_' + classId).tabs('add', {
                    title: subtitle,
                    content: subtitle,
                    closable: true,
                    href: url
                });
                return false;
            } else {
                $('#tabs_' + classId).tabs('select', subtitle);
                return false;
            }
        });
    });


</script>

</body>
</html>
