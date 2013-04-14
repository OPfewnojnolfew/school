<td height="286" valign="top" colspan="3">
<div id="books_container">

    <div class="books_content">
        <table cellspacing="0" cellpadding="0" width="259" align="center" bgcolor="#fdf8f3" border="0">
            <tbody>
            <tr>
                <td valign="top" colspan="3" height="272">
                    <table cellspacing="0" cellpadding="0" width="100%" border="0">
                        <tbody>
                        <tr>
                            <td valign="top" style="padding-left: 7px; padding-bottom: 0px; padding-top: 3px">
                                <p><img height="47" alt="" width="254" src="<?php echo base_url();?>/template/images/tgkj.gif"></p>
                                <?php if ($tgkj[0]):?>
                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                    <tbody>
                                    <tr>
                                        <td valign="top" style="padding-top: 10px"><a target="_blank" href="<? echo base_url('view/index/' . $tgkj[0]['menuid'] . '/' . $tgkj[0]['id']);?>"><img height="87" width="130" alt="" src="<? echo base_url( $tgkj[0]['attachmentPath']);?>"></a></td>
                                        <td valign="top" style="padding-right: 5px; padding-left: 12px; padding-bottom: 0px; color: rgb(143,17,38); line-height: 20px; padding-top: 5px">
                                            <p>&nbsp;&nbsp;&nbsp; <? echo utf8Substr( strip_tags($tgkj[0]['content']), 0, 30);?><a target="_blank" href="<? echo base_url('view/index/' . $tgkj[0]['menuid'] . '/' . $tgkj[0]['id']);?>">[详细]</a></p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td class="line" valign="top" height="3" style="text-align: center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top" align="left" height="30" style="padding-left: 8px; font-size: 12px; padding-bottom: 12px; color: rgb(68,68,68); line-height: 18px">
                                <table cellspacing="0" cellpadding="0" width="259" align="center" border="0">
                                    <tbody>
                                    <tr>
                                        <td valign="top" style="padding-right: 5px; padding-left: 7px; padding-bottom: 0px; color: rgb(143,17,38); line-height: 20px; padding-top: 0px">
                                            <p><span style="color: rgb(143,17,38)">往期回顾：</span></p>
                                            <?php foreach($tgkj as $key=>$row):if ($key>0): ?>
                                                <p><span style="color: #4c4334">★<? echo utf8Substr( $row['title'], 0, 15);?><a class="xx" target="_blank" href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>">[详细]</a></span></p>
                                    <?php endif;endforeach;?>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="line" valign="top" height="3" style="text-align: center">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <p style="text-align: center">&nbsp;</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<div class="books_content">
    <table border="0" cellspacing="0" cellpadding="0" width="259" bgcolor="#fdf8f3" align="center">
        <tbody>
        <tr>
            <td height="272" valign="top" colspan="3">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                    <tr>
                        <td valign="top" style="padding-bottom: 0px; padding-left: 7px; padding-top: 3px">
                            <p><img alt="" width="254" height="47" src="<?php echo base_url();?>/template/images/spzb.gif" /></p>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tbody>
                                <?php if ($sp[0]):?>
                                <tr>
                                    <td valign="top" style="padding-top: 10px"><img width="115" height="115" alt="" src="<? echo base_url( $sp[0]['attachmentPath']);?>" /></td>
                                    <td valign="top" style="padding-bottom: 3px; line-height: 20px; padding-left: 12px; padding-right: 5px; color: rgb(143,17,38); padding-top: 5px">
                                        <p>&nbsp;&nbsp;&nbsp; <? echo utf8Substr( strip_tags($sp[0]['content']), 0, 30);?><a href="<? echo base_url('view/index/' . $sp[0]['menuid'] . '/' . $sp[0]['id']);?>">[详细]</a></p>
                                    </td>
                                </tr>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" height="3" valign="top" style="text-align: center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="30" valign="top" align="left" style="padding-bottom: 12px; line-height: 18px; padding-left: 8px; color: rgb(68,68,68); font-size: 12px">
                            <table border="0" cellspacing="0" cellpadding="0" width="259" align="center">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-bottom: 0px; line-height: 20px; padding-left: 7px; padding-right: 5px; color: rgb(143,17,38); padding-top: 0px">
                                        <p><span style="color: rgb(143,17,38)">往期回顾：</span></p>
                                        <?php foreach($sp as $key=>$row):if ($key>0): ?>
                                            <p><span style="color: #4c4334"><? echo utf8Substr( $row['title'], 0, 15);?><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>">[详细]</a></span><span style="color: #4c4334" /></p>
                                        <?php endif;endforeach;?>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" height="3" valign="top" style="text-align: center">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <p style="text-align: center">&nbsp;</p>
            </td>
        </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
</div>


<div id="books_content">

</div>
<div id="books_page">
    <table width="100%"cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td width="40" align="right"><img src="<?php echo base_url();?>/template/images/iconLeft.gif" class="books_bottom" onclick="doLeft();" onmouseout="restart();" onmouseover="pause();"/></td>
            <td align="center">
                <img src="<?php echo base_url();?>/template/images/icon_1.gif" class="books_page"  onclick="doChange(0);" onmouseout="restart();" onmouseover="pause();"/>
                <img src="<?php echo base_url();?>/template/images/icon_0.gif" class="books_page"  onclick="doChange(1);" onmouseout="restart();" onmouseover="pause();"/>
            </td>
            <td width="40"><img src="<?php echo base_url();?>/template/images/iconRight.gif" class="books_bottom" onclick="doRight();" onmouseout="restart();" onmouseover="pause();"/></td>
        </tr>
    </table>
</div>
</div>
</td>