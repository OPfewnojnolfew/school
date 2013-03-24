<script type="text/javascript"
	src="<?php echo base_url();?>scripts/manage/news/normalList.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>scripts/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
    $(function() {
        normalList.createTable("<?php echo $menuid?>");
        $("#search<?php echo $menuid?>").click(function(){normalList.reloadList("<?php echo $menuid?>")});
        $("#mDel<?php echo $menuid?>").click(function(){normalList.mDel("<?php echo $menuid?>")});
        $("#add<?php echo $menuid?>").click(function(){normalList.add()});
        $("#edit<?php echo $menuid?>").click(function(){normalList.edit("<?php echo $menuid?>")});
    });
</script>
<div class="normal"></div>
<div id="searchbar<?php echo $menuid?>">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="add<?php echo $menuid?>">新增</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="edit<?php echo $menuid?>">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" id="mDel<?php echo $menuid?>">批量删除</a>
	文章标题:<input type="text" id="title<?php echo $menuid?>"/>
	创建时间从:<input type="text" id="begin<?php echo $menuid?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end\')}'})"/>
	到:<input type="text" id="end<?php echo $menuid?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'begin\')}'})"/>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" id="search<?php echo $menuid?>">查询</a>
</div>
<table id="list<?php echo $menuid?>" toolbar="#searchbar<?php echo $menuid?>"></table>
