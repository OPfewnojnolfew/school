<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="108" align="center" style="padding-left:1px; padding-bottom:1px"><p><img width="949" height="99" src="<?php echo base_url()?>/template/images/ad.jpg" alt="" /></p></td>
    </tr>
    <tr>
        <td align="center"><table width="950" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="352" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="43" background="<?php echo base_url()?>/template/images/whtop.jpg"></td>
                            </tr>
                            <tr>
                                <td align="right" height="285" background="<?php echo base_url()?>/template/images/whmid.jpg" style="padding-bottom:3px;"><div class="xiaoyuanwh">
                                        <div id="ifocus">
                                            <div id="ifocus_pic">
                                                <div id="ifocus_piclist" style="left:0; top:0;">
                                                    <ul>
                                                        <?php foreach($cultrue as $key=>$row):?>
                                                        <li <?php if ($key==0) echo 'style="display:block"'; else echo   'style="display:none"';?>><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank"><img src="<? echo base_url( $row['attachmentPath']);?>" alt="<? echo $row['title'];?>" /></a></li>
                                                        <?php endforeach?>
                                                    </ul>
                                                </div>
                                                <!--<div id="ifocus_opdiv"></div>-->
                                                <div id="ifocus_tx">
                                                    <ul>
                                                        <li class="current"><!--新青年·悦读--></li>

                                                        <li class="normal"><!--第70期求是青年报--></li>

                                                        <li class="normal"><!--“感动同窗·青春在奉献中闪光”事迹展--></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ifocus_btn">
                                            <ul>
                                                <?php foreach($cultrue as $key=>$row):?>
                                                    <li <?php if ($key==0) echo 'class="current"'; ?>><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank"><img src="<? echo base_url( $row['attachmentPath']);?>" alt="<? echo  $row['title'];?>" /></a></li>
                                                <?php endforeach?>
                                            </ul>
                                        </div></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="10" background="<?php echo base_url()?>/template/images/whdown.jpg"></td>
                            </tr>
                        </table></td>
                    <td align="right" valign="top"><table width="589" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="9" background="<?php echo base_url()?>/template/images/qytop.jpg"></td>
                            </tr>
                            <tr>
                                <td height="315" align="center" valign="top" background="<?php echo base_url()?>/template/images/qymid.jpg" style="padding-bottom:1px" ><table width="554" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td ><img src="<?php echo base_url()?>/template/images/i_27n.gif" width="276" height="45" border="0" usemap="#Map" /></td>
                                            <td align="right" ><img src="<?php echo base_url()?>/template/images/i_26n.gif" width="276" height="45" border="0" usemap="#Map2" /></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="padding-right:3px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="list1_word">
                                                    <?php foreach($dt as $row): ?>
                                                    <tr>
                                                        <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                        <td align="left"><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank" title="<? echo  $row['title'];?>"    class="list1_word"><? echo utf8Substr( $row['title'], 0, 15);?></a></td>
                                                        <td width="50" align="center" style="color:#941c00;"><?php echo  date("m-d", strtotime($row['createtime'])); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="2" align="left"></td>
                                                        <td height="2" colspan="2" align="left" background="<?php echo base_url(); ?>/template/images/line2.gif"></td>
                                                    </tr>
                                                    <?php endforeach;?>

                                                </table></td>
                                            <td valign="top">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list1_word">

                                                    <?php foreach($qc as $row): ?>
                                                        <tr>
                                                            <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                            <td align="left"><a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank" title="<? echo  $row['title'];?>"    class="list1_word"><? echo utf8Substr( $row['title'], 0, 15);?></a></td>
                                                            <td width="50" align="center" style="color:#941c00;"><?php echo  date("m-d", strtotime($row['createtime'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="2" align="left"></td>
                                                            <td height="2" colspan="2" align="left" background="<?php echo base_url(); ?>/template/images/line2.gif"></td>
                                                        </tr>
                                                    <?php endforeach;?>

                                                </table>
                                            </td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td height="9" background="<?php echo base_url(); ?>/template/images/qydown.jpg"></td>
                            </tr>
                        </table></td>
                </tr>
            </table></td>
    </tr>
</table>