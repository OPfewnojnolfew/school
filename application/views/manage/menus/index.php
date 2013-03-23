<script type="text/javascript"
	src="<?php echo base_url();?>scripts/manage/menus/menusIndex.js"></script>
<div id="treeToolbar">
	<a id="addRoot" class="easyui-linkbutton" iconCls="icon-add">新增顶级菜单</a>
	<a id="addChild" class="easyui-linkbutton" iconCls="icon-add">新增下级菜单</a>
	<a id="edit" class="easyui-linkbutton" iconCls="icon-edit">编辑</a>
	<a id="del" class="easyui-linkbutton" iconCls="icon-remove">删除</a>
</div>
<div id="tree" toolbar="#treeToolbar"></div> 
<div id="win" class="easyui-window" title="菜单管理" closed="true" collapsible="false" minimizable="false" maximizable="false"
    style="width: 400px; height: 300px;">
    <input type="hidden" id="hdnIsAdd">
    <input type="hidden" id="hdnID">
    <div class="easyui-layout" fit="true">
        <div region="center" border="false" style="padding: 10px; background: #fff; border: 1px solid #ccc;">
            <div class="popupCon">
                <ul class="popSort">
                    <li>
                        <label class="popLab">
                            名称：</label><input type="text" class="popupText" id="name" />
                    </li>
                </ul>
                <ul class="popSort">
                    <li>
                        <label class="popLab">
                            类型：	</label>
                            <select id="menuType">
								<option value="">--请选择--</option>
								<option value="1">新闻</option>
								<option value="2">简介</option>
								<option value="3">图片</option>
								<option value="4">视频</option>
							</select>
	
					</li>
            </div>
        </div>
        <div region="south" border="false" style="text-align: center; height: 30px; padding-top: 3px;">
            <a class="easyui-linkbutton" id="btnSure" href="javascript:void(0)">确定</a> <a class="easyui-linkbutton" 
                    id="btnClose" href="javascript:void(0)">取消</a>
        </div>
    </div>
</div>
