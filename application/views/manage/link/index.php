<script type="text/javascript">
    $(function() {
        var friendlinkList=new FriendlinkList();

        $("#friendlinkSearch").click(function(){friendlinkList.reloadList()});
        $("#friendlinkMDel").click(function(){friendlinkList.mDel()});
        $("#friendlinkAdd").click(function(){friendlinkList.add()});
        $("#friendlinkEdit").click(function(){friendlinkList.edit()});
    });

</script>
<div id="friendlinkSearchbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="friendlinkAdd">新增</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="friendlinkEdit">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" id="friendlinkMDel">批量删除</a>
    链接名称:<input type="text" id="friendlinkSearchName"/>
    创建时间从:<input type="text" id="friendlinkSearchBegin" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'friendlinkSearchEnd\')}'})"/>
    到:<input type="text" id="friendlinkSearchEnd" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'friendlinkSearchBegin\')}'})"/>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" id="friendlinkSearch">查询</a>
</div>
<table id="friendlinkList" toolbar="#friendlinkSearchbar"></table>
<div id="friendlinkListWin" class="easyui-dialog">
        <div class="division">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
                <tbody>
                <tr>
                    <th>
                        名称：
                    </th>
                    <td>
                        <input type="text" id="friendlinkListName" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                    </td>
                </tr>
                <tr>
                    <th>
                        链接地址：
                    </th>
                    <td>
                        <input type="text" id="friendlinkListUrl" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                    </td>
                </tr>
                <tr>
                    <th>
                        排序：
                    </th>
                    <td>
                        <input type="text" id="friendlinkListOrder" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                    </td>
                </tr>
                <tr>
                    <th>
                        类型：
                    </th>
                    <td>
                        <select id="friendlinkListType" class="easyui-combobox">
                            <option value="0">无图片链接</option>
                            <option value="1">有图片链接</option>
                        </select>
                    </td>
                </tr>
                <tr style="display: none">
                    <th>
                        图片：
                    </th>
                    <td>
                        <input id="friendLinkFileuUpload" name="friendLinkFileuUpload" type="file">
                        <div id="friendLinkImagePath"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</div>