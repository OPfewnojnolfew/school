<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="24" align="left" class="dd">
                        &nbsp;当前位置：<a href="<?php echo base_url(); ?>">首页 </a>
                        <?php
                        foreach($cate['info'] as $row) {
                            echo "&gt;  <a href='" . base_url("category/index/{$row['id']}") . "'>{$row['name']}</a>";
                        }
                        ?>
                    </td>
                </tr>
            </table>