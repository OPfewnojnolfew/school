<!--<script type="text/javascript"-->
<!--	src="--><?php //echo base_url();?><!--scripts/manage/news/normalList.js"></script>-->
<script type="text/javascript">
    $(function() {
        var normalList=new NormalList("<?php echo $menuid?>");
        normalList.createTable();
        $("#search<?php echo $menuid?>").click(function(){normalList.reloadList()});
        $("#mDel<?php echo $menuid?>").click(function(){normalList.mDel()});
        $("#add<?php echo $menuid?>").click(function(){normalList.add()});
        $("#edit<?php echo $menuid?>").click(function(){normalList.edit()});
        $("#normalListSave<?php echo $menuid?>").click(function(){normalList.save()});
        $("#normalListCancel<?php echo $menuid?>").click(function(){normalList.cancel()});


    });
    KindEditor.create("#normalListContent<?php echo $menuid?>", {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        items : [
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'link']
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
<div id="normalListWin<?php echo $menuid?>" class="easyui-window" title="菜单管理" closed="true" collapsible="false" minimizable="false" maximizable="false"
     style="width: 600px; height: 400px;">
    <input type="hidden" id="normalListMenuid<?php echo $menuid?>">
    <input type="hidden" id="normalListId<?php echo $menuid?>">
    <div class="easyui-layout" fit="true">
        <div region="center" border="false" style="padding: 10px; background: #fff; border: 1px solid #ccc;">
            <div class="popupCon">
                <ul class="popSort">
                    <li>
                        <label class="popLab">
                            标题：</label><input type="text" class="popupText" id="normalListTitle<?php echo $menuid?>" />
                    </li>
                </ul>
                <ul class="popSort">
                    <li>
                        <label class="popLab">
                            内&#12288;&#12288;容：</label><textarea id="normalListContent<?php echo $menuid?>" name="normalListContent" style="width:382px;"></textarea></li>
                </ul>
            </div>
            <div region="south" border="false" style="text-align: center; height: 30px; padding-top: 3px;">
                <a class="easyui-linkbutton" id="normalListSave<?php echo $menuid?>" href="javascript:void(0)">确定</a> <a class="easyui-linkbutton"
                                                                                                     id="normalListCancel<?php echo $menuid?>" href="javascript:void(0)">取消</a>
            </div>
        </div>
    </div>
</div>
