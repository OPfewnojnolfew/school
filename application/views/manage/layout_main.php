<html>
<title>test</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/easyuithemes/icon.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/manage/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url();?>themes/easyuithemes/gray/easyui.css" />
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/jquery.easyui.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/easyui-lang-zh_CN.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/bootstrap-dropdown.js"></script>
	    <script type='text/javascript'>
    $(document).ready(function(){
      $('#topbar').dropdown();
    });
    </script>
</head>
<!--<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:60px;background:#B3DFDA;padding:10px">north region</div>
	<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#A9FACD;padding:10px;">south region</div>
	<div data-options="region:'center',title:'Main Title'">
		<div id="main-content">
			<?php echo $content_for_layout?>
		</div>
	</div>
</body> -->
<body>
    <div class="container-fluid">
      <div class="sidebar">
        <div class="well">
          <h5>Sidebar</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <h5>Sidebar</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <h5>Sidebar</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div>
      </div>
      <div class="content">
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
			<?php echo $content_for_layout?>
        </div>
        </div>

        <footer>
          <p>&copy; Company 2011 <a href='http://www.sherzod.me' target='_blank' title='Professional Web Developer'>Sherzod Kutfiddinov</a></p>
        </footer>
      </div>
    </div>

  </body>
</html>
