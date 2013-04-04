<!--<script type="text/javascript"-->
<!--        src="--><?php //echo base_url(); ?><!--scripts/manage/news/single.js"></script>-->
<script type="text/javascript">
    $(function () {
        var single = new Single("<?php echo $menuid?>");
        $("#Save<?php echo $menuid ?>").click(function () {
            single.save()
        });
    })
</script>
<div class="division">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="shopping_setting">
        <tbody>
        <tr>
            <th>
                标题：
            </th>
            <td>
                <input type="text" id="singleTitle<?php echo $menuid ?>"
                       class="easyui-validatebox easyui_form_input" style="width:240px;" data-options="required:true">
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
                <div>
                    <script  id="singleContent<?php echo $menuid ?>" type="text/plain"> </script>
                </div>



            </td>
        </tr>

        </tbody>
    </table>
</div>
<div>
    <a href="javascript:void(0)" id="Save<?php echo $menuid ?>" class="easyui-linkbutton"
        >保存</a>
</div>