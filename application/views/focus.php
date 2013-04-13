<td width="685" align="center" valign="top" style="padding-top:13px; padding-left:5px;">
    <table width="672" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="11" height="276" background="<?php echo base_url(); ?>/template/images/mid1_lbg.jpg">&nbsp;</td>
            <td valign="top" background="<?php echo base_url(); ?>/template/images/mid1_mbg.jpg"  style="padding-top:10px;">
                <?php if ($focus): ?>
<DIV align="center">
    <!-- 播放器 begin -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/template/js/imgplayer1.js"></script>
    <script type="text/javascript" language="javascript">

        //内容部分
        ss = new slideshow("ss");
        ss.prefetch = 1;
        ss.sizelmt = true;
        ss.repeat = true;
        <?php foreach($focus as $row): ?>
        s = new slide();
        s.src = "<? echo base_url( $row['attachmentPath']);?>";
        s.title = "<?php echo $row['title']; ?>";
        s.link = "<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>";
        s.con = "<?php  echo  utf8Substr(strip_tags($row['content']),0, 150); ?>"+"<a href='<? echo base_url('view/index/' . $row['menuid'] . '/' . $row['id']);?>' target='_blank'>[详细]</a>";
        ss.add_slide(s);
        <?php endforeach; ?>
        for (var i=0; i < ss.slides.length; i++) {

            s = ss.slides[i];

            s.target = "_blank";

        }
        //--><!]]>

    </script>

    <!-- 图片播放器主体 begin -->
    <div id="ImgPlayer">
        <!-- 大图 begin -->
        <div id="ImgBlk">
            <div id="ss_img_div">					<a href="javascript:ss.hotlink();"><img src="<? echo base_url( $focus[0]['attachmentPath']);?>" alt="<?php echo $focus[0]['title']; ?>" name="ss_img" width="315" height="210" id="ss_img" style="filter:blendTrans(Duration=1);"/></a></div>
            <div id="ImgNum">
                <!-- 数字 begin -->
                <ul>							<li class="itemOff" id="imbtn0" onclick="ss.goto_slide(0)">1</li>
                    <li class="itemOff" id="imbtn1" onclick="ss.goto_slide(1)">2</li>
                    <li class="itemOff" id="imbtn2" onclick="ss.goto_slide(2)">3</li>
                    <li class="itemOff" id="imbtn3" onclick="ss.goto_slide(3)">4</li>
                    <li class="itemOff" id="imbtn4" onclick="ss.goto_slide(4)">5</li>

                </ul>
                <!-- 数字 end -->
                <!-- 播放 begin -->
                <div id="Play" onclick="ss.play(); document.getElementById('Pause').style.display='block'; this.style.display='none';" onmousemove="this.style.color='#c00';" onmouseout="this.style.color='#7D98BF';" style="display:none;">自动播放</div>
                <!-- 播放 end -->
                <!-- 暂停 begin -->
                <div id="Pause" onclick="ss.pause(); document.getElementById('Play').style.display='block'; this.style.display='none';" onmousemove="this.style.color='#c00';" onmouseout="this.style.color='#7D98BF';">暂停播放</div>
                <!-- 暂停 end -->
            </div>
        </div>
        <!-- 大图 end -->
        <!-- 标题正文 begin -->
        <div id="TxtBlk">
            <!-- 内容 begin -->
            <div id="Txt">
                <h2 id="tt"></h2>
                <p id="con"></p>
            </div>
            <!-- 内容 end -->
            <!-- 日期 begin -->
            <!-- 日期 end -->
        </div>
        <!-- 标题正文 end -->
    </div>
    <!-- 图片播放器主体 end -->
    <script type="text/javascript">

        <!--//--><![CDATA[//><!--
        ss.pre_update_hook = function() {
            sid = ss.current;
            title = ss.slides[sid].title;
            linkurl = ss.slides[sid].link;
            totals = ss.slides.length;
            scon = ss.slides[sid].con;
            tempid = parseInt(sid) + 1;
            document.getElementById("tt").innerHTML = '<a href="'+linkurl+'" target="_blank">'+title+'</a>';
            document.getElementById("con").innerHTML = scon;
            for (var i = 0;i < ss.slides.length;i++){
                document.getElementById("imbtn"+i).className = "itemOff";
            }
            document.getElementById("imbtn"+sid).className = "itemOn";
            return;
        }
        if (document.images) {
            ss.image = document.images.ss_img;
            ss.update();
            ss.play();
        }
        //--><!]]>

    </script>

    <!-- 播放器  end -->
    <br />
</DIV>
                <?php endif; ?>
            </td>
            <td width="11" background="<?php echo base_url(); ?>/template/images/mid1_rbg.jpg"></td>
        </tr>
    </table>
</td>