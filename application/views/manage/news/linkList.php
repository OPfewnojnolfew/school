<script type="text/javascript"
        src="<?php echo base_url();?>scripts/manage/news/linkList.js"></script>
<script type="text/javascript">
    $(function() {
        var linkList=new LinkList("<?php echo $menuid?>");

        $("#search<?php echo $menuid?>").click(function(){linkList.reloadList()});
        $("#mDel<?php echo $menuid?>").click(function(){linkList.mDel()});
        $("#add<?php echo $menuid?>").click(function(){linkList.add()});
        $("#edit<?php echo $menuid?>").click(function(){linkList.edit()});
    });

</script>
<div class="normal"></div>
<div id="searchbar<?php echo $menuid?>">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="add<?php echo $menuid?>">新增</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="edit<?php echo $menuid?>">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" id="mDel<?php echo $menuid?>">批量删除</a>
    文章标题:<input type="text" id="title<?php echo $menuid?>"/>
    创建时间从:<input type="text" id="begin<?php echo $menuid?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end<?php echo $menuid?>\')}'})"/>
    到:<input type="text" id="end<?php echo $menuid?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'begin<?php echo $menuid?>\')}'})"/>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" id="search<?php echo $menuid?>">查询</a>
</div>
<table id="list<?php echo $menuid?>" toolbar="#searchbar<?php echo $menuid?>"></table>
<div id="linkListWin<?php echo $menuid?>" class="easyui-dialog">

        <input type="hidden" id="linkListMenuid<?php echo $menuid?>">
        <input type="hidden" id="linkListId<?php echo $menuid?>">
        <div class="division">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
                <tbody>
                <tr>
                    <th>
                        标题：
                    </th>
                    <td>
                        <input type="text" id="linkListTitle<?php echo $menuid?>" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                    </td>
                </tr>
                <tr>
                    <th>
                        链接地址：
                    </th>
                    <td>
                        <input type="text" id="linkListUrl<?php echo $menuid?>" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</div>