<div id="js"style="overflow:hidden;margin:0 auto 0 auto;width:940px;">
    <table width="98%" height="170" border="0" cellpadding="0" cellspacing="0" style="padding-left:2px;">
        <tr>

            <td  valign="top" id=js1>
                <table height="157" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                        <?php if ($imagenews):foreach($imagenews as $row):?>
                        <td align="center" valign="middle" class="img_js">
                            <a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>" target="_blank">
                                <img src="<? echo base_url( $row['attachmentPath']);?>"  height="137" class="bk_5" /></a><br/>
                            <a href="<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>"  title="<?php echo $row['title']; ?>" class="list_word" target="_blank"><?php echo $row['title']; ?></a></td>
                        <?php endforeach;endif;?>
                    </tr>
                </table>
            </td>
            <td  valign="top" id=js2></td>
        </tr>
    </table>
</div>