<div class="link">
    <table width="929" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="12" height="98" background="/template/images/yqlinkl.jpg">&nbsp;</td>
            <td background="/template/images/yqlinkm.jpg"><table width="100%" height="88" border="0" cellpadding="0" cellspacing="0">
                    <tr>

                        <td align="center">
                        <?php if($link[1]):foreach($link[1] as $row):?>

                            <a href="<?php echo $row['linkurl'];?>" target="_blank"><img src="<?php echo base_url($row['imagepath']); ?>" width="144" height="38"  /></a>
                            <?php endforeach;endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:2px">
                            <?php if($link[1]):foreach($link[1] as $row):?>
                            <a  href="<?php echo $row['linkurl'];?>" target="_blank"  class="linkname"><?php echo $row['name'];?></a>
                            <?php endforeach;endif;?>
                        </td>
                    </tr>
                </table></td>
            <td width="12" background="/template/images/yqlinkr.jpg">&nbsp;</td>
        </tr>
    </table>
</div>