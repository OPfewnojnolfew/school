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
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                                <td height="2" background="/template/images/hr.jpg"></td>
                            </tr>
                            <tr>
                                <td height="63" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td height="2" background="/template/images/hr.jpg"></td>
                                        </tr>
                                        <tr>
                                            <td height="63"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody><tr>
                                                        <td valign="top" class="inword">
                                                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:8px 0px;">

                                                                <tbody>
                                                                <?php foreach($cate['list'] as $row): ?>
                                                                <tr>
                                                                    <td width="4%" height="24" align="center" valign="middle" class="icon1">&nbsp;</td>
                                                                    <td> <a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank" title="<?php echo $row['title'];?>" class="list_word"><?php echo $row['title'];?></a></td>
                                                                    <td width="15%" align="right" style="color:#7c7c7c">[<?php echo date("Y-m-d", strtotime($row['createtime']));?>]</td>
                                                                </tr>
                                                                <?php endforeach;?>
                                                                <tr>
                                                                    <td height="40" colspan="3" align="center" class="inword">
                                                                        <?php echo $cate['page']; ?>
                                                                    </td>
                                                                </tr>
                                                                </tbody></table>

                                                        </td>
                                                    </tr>
                                                    </tbody></table></td>
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
