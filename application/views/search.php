
<table width="211" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:10px;">
    <tr>
        <td height="10" background="<?php echo base_url('/template/images/list_btt.jpg');?>"></td>
    </tr>
    <tr>
        <td background="<?php echo base_url('/template/images/list_bgm.jpg');?>">
            <form id="form1" name="form1" method="get" action="/search.php" style="font-size:12px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="47%" height="34"  style="color:#8f1124; font-weight:bold; font-size:14px; padding-left:12px; padding-top:3px">站内搜索：</td>
                        <td width="53%">
                            <select name="fulltext" id="fulltext">
                                <option value="0">标题</option>
                                <option value="1">全文</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td height="34" colspan="2" align="center">
                            <input name="kw_qbzc" type="text" id="kw_qbzc" onFocus="this.value='';"value="请输入关键字..." size="25" />

                        </td>
                    </tr>
                    <tr>
                        <td height="34" align="center">
                            <input type="image" name="imageField" src="<?php echo base_url('/template/images/search2.gif');?>" />

                        </td>
                        <td><a href="search.php">高级搜索</a>
                            <input name="postflag" type="hidden" id="postflag" value="1" />
                            <input name="area" type="hidden" id="area" value="5" /></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td height="10" background="<?php echo base_url('/template/images/list_bgd.jpg');?>"></td>
    </tr>
</table>