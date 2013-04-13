<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" valign="top"><table width="351" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="29" align="left" background="<?php echo base_url()?>/template/images/i_16.gif"><img src="<?php echo base_url()?>/template/images/i_17.gif" width="115" height="29" /></td>
                </tr>
                <tr>
                    <td background="/temp" >
                        <table width="351" height="327" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8ed" class="bk1">
                            <tr>
                                <td height="21" align="right" valign="top" background="<?php echo base_url()?>/template/images/news_more_bg.gif"><a href="<?php echo base_url('category/index/10') ?>"><img src="<?php echo base_url();?>/template/images/more2.gif" width="51" height="20" border="0" /></a></td>
                            </tr>
                            <tr>
                                <td  align="center" valign="top" style="padding-top:3px;padding-bottom:8px;"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="list1_word">

                                        <?php foreach($xw as $row): ?>
                                            <tr>
                                                <td align="left" class="icon2"style="padding-left:10px;">&nbsp;</td>
                                                <td align="left"><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank" title="<? echo  $row['title'];?>"    class="list1_word"><? echo utf8Substr( $row['title'], 0, 15);?></a></td>
                                                <td width="50" align="center" style="color:#941c00;"><?php echo  date("m-d", strtotime($row['createtime'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td height="2" align="left"></td>
                                                <td height="2" colspan="2" align="left" background="<?php echo base_url(); ?>/template/images/line2.gif"></td>
                                            </tr>
                                        <?php endforeach;?>

                                    </table></td>
                            </tr>
                        </table>                                  </td>
                </tr>

            </table></td>
        <td align="center" valign="top" style="padding-right:3px;"><table width="351" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="29" align="left" background="<?php echo base_url()?>/template/images/i_16.gif"><img src="<?php echo base_url()?>/template/images/i_18.gif" width="115" height="29" /></td>
                </tr>
                <tr>
                    <td background="/temp" >
                        <table width="351" height="327" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8ed" class="bk1">
                            <tr>
                                <td height="21" align="right" valign="top" background="<?php echo base_url()?>/template/images/news_more_bg.gif"><a href="<?php echo base_url('category/index/8') ?>"><img src="<?php echo base_url()?>/template/images/more2.gif" width="51" height="20" border="0" /></a></td>
                            </tr>
                            <tr>
                                <td align="center" valign="top"  style="padding-top:3px; padding-bottom:8px;"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="list1_word">

                                        <?php foreach($tz as $row): ?>
                                            <tr>
                                                <td align="left" class="icon2"style="padding-left:10px;">&nbsp;</td>
                                                <td align="left"><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank" title="<? echo  $row['title'];?>"    class="list1_word"><? echo utf8Substr( $row['title'], 0, 15);?></a></td>
                                                <td width="50" align="center" style="color:#941c00;"><?php echo  date("m-d", strtotime($row['createtime'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td height="2" align="left"></td>
                                                <td height="2" colspan="2" align="left" background="<?php echo base_url(); ?>/template/images/line2.gif"></td>
                                            </tr>
                                        <?php endforeach;?>

                                    </table></td>
                            </tr>
                        </table></td>
                </tr>

            </table></td>
    </tr>
</table>