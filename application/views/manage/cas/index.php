<script type="text/javascript"
	src="<?php echo base_url();?>scripts/manage/news/caseIndex.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/My97DatePicker/WdatePicker.js"></script>
<div id="searchbar">
	<a href="/php/manage/cas/add" class="easyui-linkbutton" iconCls="icon-add" id="add">新增</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" id="mDel">批量删除</a>
	案例标题:<input type="text" id="title"/>
	创建时间从:<input type="text" id="begin" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end\')}'})"/>
	到:<input type="text" id="end" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'begin\')}'})"/>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" id="search">查询</a>
</div>
<table id="list" toolbar="#searchbar"></table>