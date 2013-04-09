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
            <td valign="top"><div class="list_mid">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="2" background="/template/images/hr.jpg"></td>
                        </tr>
                        <tr>
                            <td height="63" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td height="2" background="/template/images/hr.jpg"></td>
                                    </tr>
                                    <tr>
                                        <td height="63"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td valign="top" class="inword">
                                                        <div>
                                                            <?php echo $cate['list'][0]['content'] ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    </table></div>			</td>
        </tr>
        <tr>
            <td valign="top" id="5">&nbsp;</td>
        </tr>
    </table></td>
</tr>
</table>
</div>
<div class="mid_m"><!-- #BeginLibraryItem "/Library/footer.lbi" --><div  id="footer">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="10" height="111" background="<?php echo base_url('/template/images/f_left.gif');?>"></td>
                <td align="center" background="<?php echo base_url('/template/images/f_mid.gif');?>" class="footer">您是第 <span style="color:#f2fb03">2360276</span> 位访问者<br />
                    版权所有 共青团浙江大学委员会  技术支持 <a href="http://www.cgsoft.com.cn">创高软件</a> <a href="http://www.youth.zju.edu.cn/old">旧版网站</a> <a href="/wescms" target="_blank">管理登录</a><br/>
                    地址：浙江大学紫金港校区小剧场B座317室 邮编：310058 电话：0571-88206671 传真：0571-88206672  </td>
                <td width="10" background="<?php echo base_url('/template/images/f_end.gif');?>"></td>
            </tr>
        </table>
    </div><!-- #EndLibraryItem --></div>
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
