<table width="99%" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-top:6px;">
    <tr><td  style=" background:url(<?php echo base_url('')?>/template/images/fastnav_top.gif) repeat-y;" height="27">
        </td></tr>
    <tr><td style=" background:url(<?php echo base_url('')?>/template/images/fastnav_bg.gif) repeat-y;">
            <table width="93%" border="0" align="center" cellpadding="0" cellspacing="0" class="fasttable">
                <tr>
                    <td height="62" colspan="2" align="left"><p>
                            <a target="_blank" href="#"><img height="57" alt="" width="104" src="<?php echo base_url('')?>/template/images/hdsyy.gif" /></a>&nbsp;<a target="_blank" href="#"><img height="57" alt="" width="104" src="<?php echo base_url('')?>/template/images/jjfz.gif" /></a></p>
                        <p><a target="_blank" href="#"><img height="57" alt="" width="104" src="<?php echo base_url('')?>/template/images/bszn.gif" /></a>&nbsp;<a target="_blank" href="#"><img height="57" alt="" width="104" src="<?php echo base_url('')?>/template/images/bgxz.gif" /></a></p></td>
                </tr>
            </table>
        </td></tr>
    <tr><td align="right" style=" background:url(<?php echo base_url('')?>/template/images/lastest_subject.gif) repeat-y;" height="19">
            <a href="<?php echo base_url('category/index/43') ?>" target="_blank" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
        </td></tr>
    <tr>
        <td style="background:url(<?php echo base_url('')?>/template/images/fastnav_bg.gif) repeat-y;">
            <table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" align="left" style="padding-top:5px;">
                        <table border="0" cellspacing="0" cellpadding="0" align="left">
                            <tbody>
                            <?php foreach($cultrue as $key=>$row):?>
                            <tr>
                                <td style="text-align: center; padding-bottom: 3px; padding-top: 2px"><a target="_blank" href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>"><img alt="" width="212" height="53" src="<? echo base_url( $row['attachmentPath']);?>" /></a></td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                    </td>
                </tr>
            </table>
        </td></tr>
    <tr><td height="7" style=" background:url(<?php echo base_url('')?>/template/images/fastnav_bottom.gif) repeat-y;">
        </td></tr>
</table>