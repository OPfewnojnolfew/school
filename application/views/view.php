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
                    <div class="list_mid">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-wrap:break-word;word-break:break-all">
                            <tbody><tr>
                                <td height="2" background="/template/images/hr.jpg"></td>
                            </tr>
                            <tr>
                                <td height="63"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td align="center" class="con_xbt" style="padding-top:13px"></td>
                                        </tr>
                                        <tr>
                                            <td height="30" align="center" class="con_bt" style="padding-top:5px; padding-bottom:5px;"><?php echo $news['title'];?> </td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="con_xbt" style="padding-bottom:15px"></td>
                                        </tr>
                                        <tr>
                                            <td height="24" align="center" valign="middle" bgcolor="#FEEDD3" style="font-size:12px;border: 1px dotted #ccc;">阅读次数：<?php echo $news['readcount'];?> [<?php echo date("Y-m-d", strtotime($news['createtime']));?>]</td>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="con_ny" style="padding-top:15px;">
                                                <?php echo $news['content'];?>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            </tbody></table></div>

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
