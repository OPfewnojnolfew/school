<!--<script type="text/javascript"-->
<!--        src="--><?php //echo base_url();?><!--scripts/manage/news/multiAttrList.js"></script>-->

<script type="text/javascript">
    $(function() {
        var multiAttrList=new MultiAttrList("<?php echo $menuid?>");

        $("#search<?php echo $menuid?>").click(function(){multiAttrList.reloadList()});
        $("#mDel<?php echo $menuid?>").click(function(){multiAttrList.mDel()});
        $("#add<?php echo $menuid?>").click(function(){multiAttrList.add()});
        $("#edit<?php echo $menuid?>").click(function(){multiAttrList.edit()});
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
<div id="multiAttrListWin<?php echo $menuid?>" class="easyui-dialog">

        <input type="hidden" id="multiAttrListMenuid<?php echo $menuid?>">
        <input type="hidden" id="multiAttrListId<?php echo $menuid?>">
        <div class="division">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
                <tbody>
                <tr>
                    <th>
                        标题：
                    </th>
                    <td>
                        <input type="text" id="multiAttrListTitle<?php echo $menuid?>" class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
                    </td>
                </tr>
                <tr>
                    <th>
                        文件：
                    </th>
                    <td>
                        <input id="file_upload<?php echo $menuid?>" name="file_upload" type="file">
                        <div id="multiAttrPath<?php echo $menuid?>"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="division">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
                <tbody>
                <tr>
                    <th>
                        内容
                    </th>
                    <td>
                        <textarea id="multiAttrListContent<?php echo $menuid?>" style="width: 100%; height:350px;">
                        </textarea>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
</div>
