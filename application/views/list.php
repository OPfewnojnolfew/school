<table width="211" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="35" background="<?php echo base_url('/template/images/list_bt.jpg');?>" class="list_dbt">&nbsp;<?php echo $cate['cate']['name']?></td>
    </tr>
    <?php
    if ($cate['cate']['children']):
        ?>
        <tr>
            <td valign="top" background="<?php echo base_url('/template/images/list_bgm.jpg');?>" style="padding-top:8px;">
                <?php
                foreach($cate['cate']['children'] as $child) :
                    ?>
                    <table width="203" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="31" height="30" align="center" background="<?php echo base_url('/template/images/list_l_bg.jpg');?>">
                                <img src="<?php echo base_url('/template/images/list_icon.jpg');?>" width="15" height="12"></td>
                            <td width="172" background="<?php echo base_url('/template/images/list_l_bg.jpg');?>"  class="list_lbt">
                                <a href="<?php echo base_url('category/index/' . $child['id']) ?>"   class="list_lbt"  ><?php echo $child['name']; ?></a>
                            </td>
                        </tr>
                    </table>
                    <table width="98%" border="0" cellspacing="0" cellpadding="0" id="LM2"   style="display:none" >
                    </table>
                <?php
                endforeach;
                ?>
            </td>
        </tr>
    <?php
    endif;
    ?>
    <tr>
        <td height="10" background="<?php echo base_url('/template/images/list_bgd.jpg');?>"></td>
    </tr>
</table>