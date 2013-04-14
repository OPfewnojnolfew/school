<div class="head">
    <table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td height="173"><p style="text-align: center">
                    <!--<embed src="<?php /*echo base_url('/template/top.jpg');*/?>" width="980" height="173" type="application/x-shockwave-flash" play="true" loop="true" menu="true" wmode="opaque"></embed>-->
                    <img src="<?php echo base_url('/template/top.jpg');?>" width="980" height="173"  />

            </p></td>
        </tr>
        <tr>
            <td height="35" background="<?php echo base_url('/template/images/i_2.gif');?>"><table width="100%" height="36" border="0" cellpadding="0" cellspacing="0" class="dh">
                    <tr>
                        <td width="105" valign="top" style="padding-left:11px; padding-top:4px;">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('/template/images/i_3.gif');?>" width="89" height="30" border="0" /></a>
                        </td>
                        <?php
                        foreach($menus as $val):
                            ?>
                            <td align="center" valign="middle">
                                <a href="<?php echo base_url('category/index/' . $val['id']); ?>" id="d_<?php echo $val['id'];?>" class="dh"><?php echo $val['name'];?></a>
                            </td>
                            <td width="5" align="center">
                                <img src="<?php echo base_url('/template/images/i_dot.gif');?>" width="2" height="19" />
                            </td>
                        <?php endforeach; ?>
                        <td width="220" align="center" style="font-weight:normal; font-size:12px;"><div id=date_time><SCRIPT> setInterval("document.getElementById('date_time').innerHTML=new Date().toLocaleString()+'日一二三四五六'.charAt(new Date());",1000);</SCRIPT></div></td>
                    </tr>
                </table></td>
        </tr>
    </table>
</div>
<!--下拉列表开始-->
<script type="text/javascript" src="<?php echo base_url('/template/menu/transmenuC.js');?>"></script>
<script language="JavaScript" type="text/javascript">
    if (TransMenu.isSupported())
    {
        var ms = new TransMenuSet(TransMenu.direction.down, -14, 5, TransMenu.reference.bottomLeft);
        <?php
         foreach($menus as $val) {
             if ($val['children']) {
                 echo "var menu = ms.addMenu(document.getElementById('d_{$val['id']}') );";
                 foreach($val['children'] as $child) {
                         echo "menu.addItem('{$child['name']}', '" . base_url('category/index/' . $child['id']) ."');";
                 }
             }
         }
         ?>
        TransMenu.renderAll();
    }
</script>
<script language="JavaScript" type="text/javascript">
    function init() {
        if (TransMenu.isSupported())
        {
            TransMenu.initialize();
        }
    }
    window.onload=function() {
        init();
    };

</script>
<!--下拉列表结束-->
<!-- #EndLibraryItem --></div>