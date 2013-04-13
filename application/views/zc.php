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
                                <td height="63"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td valign="top" class="inword" style="padding-top:5px; padding-left:10px">

                                                <?php if ($cate['list']):foreach($cate['list'] as $row): ?>
                                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:8px 0px;">

                                                    <tbody><tr>
                                                        <td height="29" colspan="2" valign="middle"><h1 class="qnb_btbg"><?php echo $row['title'] ?></h1></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="line-height:18px;">
                                                            <div style="width:118px; float:left; line-height:25px;padding-left:24px;">
                                                                <a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>"><img style="padding-bottom:8px" src="<? echo base_url( $row['attachmentPath'] );?>" width="85" height="120" border="0"></a></div>

                                                            <?php if ($row['children']):
                                                                foreach($row['children'] as  $val) :
                                                                ?>
                                                            <div class="qnb_list">
                                                                <ul><li>
                                                                        <a href="<? echo base_url('view/index/' . $val['menuid'] . '/' . $val['id']);?>" class="highlight"><?php echo $val['title'] ?> </a></li></ul></div>
                                                            <?php
                                                                    endforeach;endif;
                                                                    ?>


                                                        </td>
                                                    </tr>

                                                    </tbody></table>
                                                <?php endforeach;endif; ?>


                                            </td>
                                        </tr>
                                        </tbody></table></td>
                            </tr>
                            </tbody></table>
                    </div>

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
