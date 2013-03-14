<script type="text/javascript"
	src="<?php echo base_url();?>scripts/manage/menus/menusIndex.js"></script>
<div id="treeToolbar">
	<a id="add" class="easyui-linkbutton" iconCls="icon-add">新增</a>
	<a id="edit" class="easyui-linkbutton" iconCls="icon-edit">编辑</a>
	<a id="del" class="easyui-linkbutton" iconCls="icon-remove">删除</a>
</div>
<div id="tree" toolbar="#treeToolbar"></div>
<div id="win" title="菜单管理" class="easyui-window"  style="width:600px;height:400px">
	<div>
		<div>类型:<select id="menuType">
			<option value="">--请选择--</option>
			<option value="1">新闻</option>
			<option value="2">简介</option>
			<option value="3">图片</option>
			<option value="4">视频</option>
		</select></div>
		<div>
			名称:<input type="text" id="menuName"/>
		</div>
	</div>
</div>  