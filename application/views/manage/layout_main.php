<html>
<title>校团委后台管理</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/manage/reset.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/easyuithemes/icon.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/manage/style.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/easyuithemes/gray/easyui.css" />
<script type="text/javascript"
            src="<?php echo base_url();?>scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/manage/common.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/jquery.easyui.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/easyui-lang-zh_CN.js"></script>
<script type="text/javascript"
            src="<?php echo base_url();?>scripts/manage/menus/menusTree.js"></script>
</head>
<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:60px;background:#fff;padding:10px">
	</div>
	<div data-options="region:'west',split:true,title:'导航'" style="width:250px;padding:10px;">
        <ul id="menusTree"></ul>
	</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#fff;padding:10px;"></div>
	<div data-options="region:'center'">
        <?php echo $content_for_layout?>
	</div>
</body>

  </body>
</html>
