<script type="text/javascript">
    $(function(){
        var menu=new Menu();
        $("#menuAddRoot").click(function(){menu.add();});
        $("#menuAddChild").click(function(){menu.addChild();});
        $("#menuEdit").click(function(){menu.edit();});
        $("#menuDel").click(function(){menu.mDel();});
    })
</script>
<div id="treeToolbar">
	<a id="menuAddRoot" class="easyui-linkbutton" iconCls="icon-add">新增顶级菜单</a>
	<a id="menuAddChild" class="easyui-linkbutton" iconCls="icon-add">新增下级菜单</a>
	<a id="menuEdit" class="easyui-linkbutton" iconCls="icon-edit">编辑</a>
	<a id="menuDel" class="easyui-linkbutton" iconCls="icon-remove">删除</a>
</div>
<div id="menuTree" toolbar="#treeToolbar"></div>
<div id="menuWin" class="easyui-dialog">
    <div class="division">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
            <tbody>
            <tr>
                <th>
                    名称：
                </th>
                <td>
                    <input type="text" id="menuName" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                </td>
            </tr>
            <tr>
                <th>
                    类型：
                </th>
                <td>
                    <select id="menuType" class="easyui-combobox">
                        <option value="0">默认</option>
                        <option value="1">简介</option>
                        <option value="2">一般列表</option>
                        <option value="3">图片列表</option>
                        <option value="7">视频列表</option>
                        <option value="4">链接列表</option>
                        <option value="5">附件列表</option>
                        <option value="6">主从列表</option>

                    </select>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>