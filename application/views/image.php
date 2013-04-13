<?php $this->load->view('head');?>
<!--下拉列表结束-->
<!-- #EndLibraryItem --><div class="mid">
    <div class="list">
        <table width="968" border="0" align="center" cellpadding="0" cellspacing="0" >
            <tr>
                <td width="234" valign="top" bgcolor="#f4f4f4">
                    <?php $this->load->view('list'); ?>
                    <?php $this->load->view('search'); ?>
                </td>

                <td valign="top">
                    <?php $this->load->view('current'); ?>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td height="2" background="/template/images/hr.jpg"></td>
                        </tr>
                        <tr>
                            <td height="63"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td valign="top">
                                            <?php if ($cate['list']):?>
                                            <table width="95%" border="0" cellpadding="0" cellspacing="0" style="margin-left:30px">
                                                <tbody><tr>
                                                    <td width="280" valign="top"><a href="<? echo base_url('view/' . $cate['list'][0]['menuid'] . '/' . $cate['list'][0]['id']);?>">
                                                            <img src="<? echo base_url( $cate['list'][0]['attachmentPath'] );?>" width="280" border="0" style="border:1px solid #CCCCCC; padding:1px;"></a></td>
                                                    <td width="718" align="left" valign="top" style="padding-left:15px; padding-right:15px;">
                                                        <a href="<? echo base_url('view/' . $cate['list'][0]['menuid'] . '/' . $cate['list'][0]['id']);?>" title="<? echo $cate['list'][0]['title'] ;?>" target="_blank" style="font-size:14px; color:#8f1124; text-decoration:none; padding-bottom:10px; line-height:20px;"><strong><? echo $cate['list'][0]['title'] ;?></strong></a>
                                                        <br>
                                                        <span>发布日期：<? echo date("Y-m-d", strtotime($cate['list'][0]['createtime'] ));?></span>
                                                        <br>
                                                        <p style="margin:7px 0px 0px 0px; line-height:20px;">
                                                            <?php echo  utf8Substr(strip_tags($cate['list'][0]['content']), 0, 150); ?>
                                                            <a href="<? echo base_url('view/' . $cate['list'][0]['menuid'] . '/' . $cate['list'][0]['id']);?>" class="xx" target="_blank">[详细]</a></p> </td>
                                                </tr>

                                                <tr>
                                                    <td height="35" colspan="2" align="left"><img src="<?php echo base_url('/template/images/lilne.gif'); ?>" width="670" height="15"></td>
                                                </tr>
                                                </tbody></table>


                                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:23px;">								   <tbody>
                                                <?php foreach($cate['list'] as $key=>$val) :if($key>0):?>
                                                <tr>
                                                    <td width="184" valign="top">
                                                        <a href="<? echo base_url('view/' . $val['menuid'] . '/' . $val['id']);?>">
                                                            <img src="<? echo base_url( $val['attachmentPath'] );?>" width="180" height="135" border="0" style="border:1px solid #CCCCCC; padding:1px;"></a>
                                                    </td><td width="718" align="left" valign="top" style="padding-left:15px;padding-right:15px;">
                                                        <a href="<? echo base_url('view/' . $val['menuid'] . '/' . $val['id']);?>" title="<? echo $val['title'] ;?>" target="_blank" style="font-size:14px; color:#8f1124; text-decoration:none; padding-bottom:10px; line-height:20px;"><strong><? echo $val['title'] ;?></strong></a>
                                                        <br>
                                                        <span>发布日期：<? echo date("Y-m-d", strtotime($cate['list'][0]['createtime'] ));?></span>
                                                        <br>
                                                        <p style="margin:7px 0px 0px 0px; line-height:20px;">
                                                            <?php echo  utf8Substr(strip_tags($val['content']), 0, 150); ?>
                                                            <a href="<? echo base_url('view/' . $val['menuid'] . '/' . $val['id']);?>" class="xx" target="_blank">[详细]</a></p> </td>
                                                </tr>

                                                <tr>
                                                    <td height="30" colspan="2"><img src="<?php echo base_url('/template/images/lilne.gif'); ?>" width="675" height="7"></td>
                                                </tr>
                                                <?php endif;endforeach; ?>


                                                <tr>
                                                    <td height="40" colspan="3" align="center" class="inword"><?php echo $cate['page']; ?>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                            <?php endif;?>
                                        </td>
                                    </tr>

                                    </tbody></table>
                            </td>
                        </tr>
                        </tbody></table>

                </td>
            </tr>
            <tr>
                <td valign="top" id="5">&nbsp;</td>
            </tr>
        </table></td>
        </tr>
        </table>
    </div>
    <?php $this->load->view('foot');?>
</div>

</div>


<script language="javascript" id="clientEventHandlersJS">
    <!--
    var number=3;
    function LMYC() {
        var lbmc;
//var treePic;
        for (i=1;i<=number;i++) {
            lbmc = eval('LM' + i);
            //treePic = eval('treePic'+i);
            //treePic.src = 'images/file.gif';
            lbmc.style.display = 'none';
        }
    }

    function ShowFLT(i) {
        lbmc = eval('LM' + i);

        //treePic = eval('treePic' + i)
        if (lbmc.style.display == 'none') {
            LMYC();
            //treePic.src = 'images/nofile.gif';
            lbmc.style.display = '';
        }
        else {
            //treePic.src = 'images/file.gif';
            lbmc.style.display = 'none';
        }
    }
    //-->
</script>

<map name="Map2" id="Map2"><area shape="rect" coords="174,14,233,40" href="#" /></map>
</body>
</html>
