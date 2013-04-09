<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>求是青年网—共青团浙江大学委员会</title>
    <link href="<?php echo base_url('/template/css.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/template/menu/transmenu.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/template/js1/css.css') ?>" rel="stylesheet" />
    <!--鼠标触动变幻选项卡-->

    <script type="text/javascript">
        function setTab(m,n){
            var tli=document.getElementById("menu"+m).getElementsByTagName("td");
            var mli=document.getElementById("main"+m).getElementsByTagName("table");
            for(i=0;i<tli.length;i++){
                tli[i].className=i==n?"active":"normal";
                mli[i].style.display=i==n?"block":"none";
                var url = 'redir.php?cust=hdyg' + n;
                document.getElementById('more_hdyg').href = url;
            }
        }
    </script>
    <!--校园文化begin-->
    <script type="text/javascript">

        function $(id) { return document.getElementById(id); }

        function moveElement(elementID,final_x,final_y,interval) {
            if (!document.getElementById) return false;
            if (!document.getElementById(elementID)) return false;
            var elem = document.getElementById(elementID);
            if (elem.movement) {
                clearTimeout(elem.movement);
            }
            if (!elem.style.left) {
                elem.style.left = "0px";
            }
            if (!elem.style.top) {
                elem.style.top = "0px";
            }
            var xpos = parseInt(elem.style.left);
            var ypos = parseInt(elem.style.top);
            if (xpos == final_x && ypos == final_y) {
                return true;
            }
            if (xpos < final_x) {
                var dist = Math.ceil((final_x - xpos)/10);
                xpos = xpos + dist;
            }
            if (xpos > final_x) {
                var dist = Math.ceil((xpos - final_x)/10);
                xpos = xpos - dist;
            }
            if (ypos < final_y) {
                var dist = Math.ceil((final_y - ypos)/10);
                ypos = ypos + dist;
            }
            if (ypos > final_y) {
                var dist = Math.ceil((ypos - final_y)/10);
                ypos = ypos - dist;
            }
            elem.style.left = xpos + "px";
            elem.style.top = ypos + "px";
            var repeat = "moveElement('"+elementID+"',"+final_x+","+final_y+","+interval+")";
            elem.movement = setTimeout(repeat,interval);
        }

        function classNormal(iFocusBtnID,iFocusTxID){
            var iFocusBtns= $(iFocusBtnID).getElementsByTagName('li');
            var iFocusTxs = $(iFocusTxID).getElementsByTagName('li');
            for(var i=0; i<iFocusBtns.length; i++) {
                iFocusBtns[i].className='normal';
                iFocusTxs[i].className='normal';
            }
        }

        function classCurrent(iFocusBtnID,iFocusTxID,n){
            var iFocusBtns= $(iFocusBtnID).getElementsByTagName('li');
            var iFocusTxs = $(iFocusTxID).getElementsByTagName('li');
            iFocusBtns[n].className='current';
            iFocusTxs[n].className='current';
        }

        function iFocusChange() {
            if(!$('ifocus')) return false;
            $('ifocus').onmouseover = function(){atuokey = true};
            $('ifocus').onmouseout = function(){atuokey = false};
            var iFocusBtns = $('ifocus_btn').getElementsByTagName('li');
            var listLength = iFocusBtns.length;
            iFocusBtns[0].onmouseover = function() {
                moveElement('ifocus_piclist',0,0,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',0);
            }
            if (listLength>=2) {
                iFocusBtns[1].onmouseover = function() {
                    moveElement('ifocus_piclist',0,-210,5);
                    classNormal('ifocus_btn','ifocus_tx');
                    classCurrent('ifocus_btn','ifocus_tx',1);
                }
            }
            if (listLength>=3) {
                iFocusBtns[2].onmouseover = function() {
                    moveElement('ifocus_piclist',0,-420,5);
                    classNormal('ifocus_btn','ifocus_tx');
                    classCurrent('ifocus_btn','ifocus_tx',2);
                }
            }
            if (listLength>=4) {
                iFocusBtns[3].onmouseover = function() {
                    moveElement('ifocus_piclist',0,-630,5);
                    classNormal('ifocus_btn','ifocus_tx');
                    classCurrent('ifocus_btn','ifocus_tx',3);
                }
            }
        }

        setInterval('autoiFocus()',5000);
        var atuokey = false;
        function autoiFocus() {
            if(!$('ifocus')) return false;
            if(atuokey) return false;
            var focusBtnList = $('ifocus_btn').getElementsByTagName('li');
            var listLength = focusBtnList.length;
            for(var i=0; i<listLength; i++) {
                if (focusBtnList[i].className == 'current') var currentNum = i;
            }
            if (currentNum==0&&listLength!=1 ){
                moveElement('ifocus_piclist',0,-210,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',1);
            }
            if (currentNum==1&&listLength!=2 ){
                moveElement('ifocus_piclist',0,-420,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',2);
            }
            if (currentNum==2&&listLength!=3 ){
                moveElement('ifocus_piclist',0,-630,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',3);
            }
            if (currentNum==3 ){
                moveElement('ifocus_piclist',0,0,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',0);
            }
            if (currentNum==1&&listLength==2 ){
                moveElement('ifocus_piclist',0,0,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',0);
            }
            if (currentNum==2&&listLength==3 ){
                moveElement('ifocus_piclist',0,0,5);
                classNormal('ifocus_btn','ifocus_tx');
                classCurrent('ifocus_btn','ifocus_tx',0);
            }
        }

    </script>
    <!--校园文化end-->
    <style type="text/css">
        #menu_hdyg .active{
            cursor:pointer;
            color:#fff;
            padding-left: 3px;
            background-image: url(/template/images/i_141.gif);
            background-repeat: no-repeat;
            background-position: center bottom;
        }
        #menu_hdyg .normal{
            cursor:pointer;
            color:#8f1124;
            padding-left: 3px;
        }
        ul li{
            list-style:none;
            float:left;
            padding-left:2px;
            cursor:pointer;

        }
        .rborder{
            border:1px solid yellow;
        }

    </style>

</head>

<body>
<div class="main"><!-- #BeginLibraryItem "/Library/head.lbi" -->
    <div class="head">
        <table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td height="173"><p style="text-align: center"><embed src="<?php echo base_url('/template/top.swf');?>" width="980" height="173" type="application/x-shockwave-flash" play="true" loop="true" menu="true" wmode="opaque"></embed></p></td>
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
<div class="main">
<div class="mid">
<div class="mid_m">
<div class="mid_1">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="685" align="center" valign="top" style="padding-top:13px; padding-left:5px;">
    <table width="672" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="11" height="276" background="/template/images/mid1_lbg.jpg">&nbsp;</td>
            <td valign="top" background="/template/images/mid1_mbg.jpg"  style="padding-top:10px;">
                <DIV align="center">
                    <!-- 播放器 begin -->
                    <script type="text/javascript" src="/template/js/imgplayer1.js"></script>
                    <script type="text/javascript" language="javascript">

                        //内容部分
                        ss = new slideshow("ss");
                        ss.prefetch = 1;
                        ss.sizelmt = true;
                        ss.repeat = true;

                        s = new slide();
                        s.src = "/wescms/sys/filebrowser/file.php?cmd=preview&id=85238";
                        s.title = "共青团浙江大学第十九届二次全委（扩大）会议召开";
                        s.link = "redir.php?catalog_id=15&object_id=85239";
                        s.con = "1月23日下午，共青团浙江大学十九届二次全委（扩大）会议在紫金港校区国会139室举行。大会总结了2012年学校共青团工作，谋划了2013年工作思路，表彰了一批优秀先进集体和个人，欢送了2012年离岗团干。校党委副书记任少波出席会议并讲话。会议由校团委书记刘艳辉主持。"+"<a href='redir.php?catalog_id=15&object_id=85239' target='_blank'>[详细]</a>";
                        ss.add_slide(s);
                        s = new slide();
                        s.src = "/wescms/sys/filebrowser/file.php?cmd=preview&id=80368";
                        s.title = "浙江大学2012年暑假大学生社会实践活动总结表彰大会举行";
                        s.link = "redir.php?catalog_id=15&object_id=80369";
                        s.con = "12月7日下午，浙江大学2012年暑期大学生社会实践活动总结表彰大会在紫金港校区国际会议中心139室举行。团省委副书记朱斌，校党委副书记任少波，学校相关部门负责人，院系分管领导以及师生代表共计二百三十余人参加了活动。"+"<a href='redir.php?catalog_id=15&object_id=80369' target='_blank'>[详细]</a>";
                        ss.add_slide(s);
                        s = new slide();
                        s.src = "/wescms/sys/filebrowser/file.php?cmd=preview&id=79604";
                        s.title = "我校在第八届挑战杯“复星”中国大学生创业计划竞赛中获佳绩";
                        s.link = "redir.php?catalog_id=15&object_id=79605";
                        s.con = "11月24-28日，由共青团中央、中国科协、教育部、全国学联、上海市人民政府共同主办，同济大学承办，复星集团协办的第八届“挑战杯”复星中国大学生创业计划竞赛决赛在上海同济大学举行。我校参赛作品“淘名品”摘获银奖。此外，浙江大学还荣获2011年“MM百万青年创业计划”优秀组织高校荣誉称号。"+"<a href='redir.php?catalog_id=15&object_id=79605' target='_blank'>[详细]</a>";
                        ss.add_slide(s);
                        s = new slide();
                        s.src = "/wescms/sys/filebrowser/file.php?cmd=preview&id=76953";
                        s.title = "浙江大学第十四届学生社团文化节开幕";
                        s.link = "redir.php?catalog_id=15&object_id=76954";
                        s.con = "10月下旬，浙江大学第十四届学生社团文化节拉开帷幕。本次社团文化节开幕式以第二届高校社团骨干群英汇为开幕之作，邀请了复旦大学、上海交通大学、南京大学、武汉大学、厦门大学等9所高校社团骨干代表一起共话&ldquo;高校社团的发展与大学生文化力提升&rdquo;，探讨社团文化建设在校园文化建设中的独特力量。"+"<a href='redir.php?catalog_id=15&object_id=76954' target='_blank'>[详细]</a>";
                        ss.add_slide(s);
                        s = new slide();
                        s.src = "/wescms/sys/filebrowser/file.php?cmd=preview&id=70567";
                        s.title = "浙江青年省第十三次党代会精神宣讲服务团出征仪式暨2012年浙江省大中专学生暑期“三下乡”社会实践活动启动仪式在我校举行";
                        s.link = "redir.php?catalog_id=15&object_id=70568";
                        s.con = "6月20日下午，浙江青年省第十三次党代会精神宣讲服务团出征仪式暨2012年浙江省大中专学生暑期&ldquo;三下乡&rdquo;社会实践活动启动仪式在紫金港校区国际会议中心隆重举行。"+"<a href='redir.php?catalog_id=15&object_id=70568' target='_blank'>[详细]</a>";
                        ss.add_slide(s);


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
                            <div id="ss_img_div">					<a href="javascript:ss.hotlink();"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=85238" alt="共青团浙江大学第十九届二次全委（扩大）会议召开" name="ss_img" width="315" height="210" id="ss_img" style="filter:blendTrans(Duration=1);"/></a></div>
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
            </td>
            <td width="11" background="/template/images/mid1_rbg.jpg"></td>
        </tr>
    </table>
</td>
<td width="271" valign="top" style="padding-right:5px;" class="dantuanyw">

<table cellspacing="0" cellpadding="0" bordercolor="#fdf8f3" border="0" align="center" width="270">
<tbody>
<tr>
<td width="5"><img height="297" width="5" src="/template/images/i_4.gif" alt="" /></td>
<td valign="top" colspan="3">
<table cellspacing="0" cellpadding="0" border="0" bgcolor="#fdf8f3" align="center" width="259">
<tbody>
<tr>
<td height="286" valign="top" colspan="3">
<div id="books_container">

<div class="books_content">
    <table border="0" cellspacing="0" cellpadding="0" width="259" bgcolor="#fdf8f3" align="center">
        <tbody>
        <tr>
            <td height="272" valign="top" colspan="3">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                    <tr>
                        <td height="150" valign="top" style="padding-bottom: 0px; padding-left: 0px; padding-top: 3px">
                            <p><img alt="" width="254" height="47" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=33623" /></p>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-top: 15px"><a target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=33035&amp;object_id=46208"><img alt="" width="90" height="87" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=38224" /></a></td>
                                    <td valign="top" style="padding-bottom: 5px; padding-left: 12px; padding-right: 6px; padding-top: 10px">
                                        <p style="line-height: 20px; color: rgb(143,17,38)"><span style="font-size: 12px"><span style="color: #993300"><span style="font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-bidi-font-family: 'Times New Roman'; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">● </span></span></span>最新推荐：第九期<a href="http://www.zdxqn.zju.edu.cn/upload/Ndian/shidian/shidian9/index.html">[点击]</a></p>
                                        <p style="line-height: 20px; color: rgb(143,17,38)"><span style="color: #4c4334">自杀&mdash;&mdash;大学生&rdquo;不能承受的生命之轻&rdquo;</span></p>
                                        <p style="line-height: 20px; color: rgb(143,17,38)"><span style="font-size: 12px"><span style="margin: 20pt 0cm 0pt; color: rgb(153,51,0)"><span style="font-family: 宋体">●&nbsp;</span></span></span><font color="#8f1126">往期回顾：第八期[<a href="http://www.zdxqn.zju.edu.cn/upload/Ndian/shidian/shidian8/index.html">点击]</a></font></p>
                                        <p>&nbsp;&nbsp;</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="30" valign="top" align="left" style="padding-bottom: 5px; line-height: 18px; padding-left: 0px; color: rgb(68,68,68); font-size: 12px">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-top: 15px"><a target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=33035&amp;object_id=48838"><img alt="" width="86" height="85" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=32989" /></a></td>
                                    <td valign="top" style="padding-bottom: 5px; line-height: 20px; padding-left: 12px; padding-right: 6px; color: rgb(143,17,38); padding-top: 10px">
                                        <p><span style="font-size: 12px"><span style="color: #993300"><span style="font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-bidi-font-family: 'Times New Roman'; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">● </span></span></span>最新推荐：第十二期<a href="http://www.zdxqn.zju.edu.cn/upload/Ndian/lidian/lidian12/index.htm">[点击]</a></p>
                                        <p><span style="color: #4c4334">【关注】皮革变胶囊</span></p>
                                        <p><span style="color: #4c4334" /><span style="color: #4c4334"><span style="font-size: 12px"><span style="margin: 20pt 0cm 0pt; color: #993300"><span style="font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-bidi-font-family: 'Times New Roman'; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">● </span></span></span><font color="#8f1126">往期回顾：第十一期<a href="http://www.zdxqn.zju.edu.cn/upload/Ndian/lidian/lidian11/index.htm">[点击]</a></font></span></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table border="0" cellspacing="0" cellpadding="0" width="259" align="center">
                                <tbody>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" height="3" valign="top" style="text-align: center">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <p style="text-align: center">&nbsp;</p>
            </td>
        </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
</div>
<div class="books_content">
    <table border="0" cellspacing="0" cellpadding="0" width="259" bgcolor="#fdf8f3" align="center">
        <tbody>
        <tr>
            <td height="272" valign="top" colspan="3">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                    <tr>
                        <td valign="top" style="padding-bottom: 0px; padding-left: 7px; padding-top: 3px">
                            <p><img alt="" width="254" height="47" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=33600" /></p>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-top: 10px"><img width="115" height="115" alt="" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=75029" /></td>
                                    <td valign="top" style="padding-bottom: 3px; line-height: 20px; padding-left: 12px; padding-right: 5px; color: rgb(143,17,38); padding-top: 5px">
                                        <p>&nbsp;&nbsp;&nbsp; 《悦读》第十季推出各领域经典著作，&ldquo;学以立身&rdquo;<a href="http://www.zdxqn.zju.edu.cn/redir.php?catalog_id=6885">[详细]</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" height="3" valign="top" style="text-align: center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="30" valign="top" align="left" style="padding-bottom: 12px; line-height: 18px; padding-left: 8px; color: rgb(68,68,68); font-size: 12px">
                            <table border="0" cellspacing="0" cellpadding="0" width="259" align="center">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-bottom: 0px; line-height: 20px; padding-left: 7px; padding-right: 5px; color: rgb(143,17,38); padding-top: 0px">
                                        <p><span style="color: rgb(143,17,38)">往期回顾：</span></p>
                                        <p><span style="color: #4c4334">&nbsp;&nbsp;&nbsp;&nbsp;第九季：&ldquo;域外小说万花筒&rdquo; <a href="http://www.zdxqn.zju.edu.cn/redir.php?catalog_id=6453">[详细]</a></span><span style="color: #4c4334" /></p>
                                        <p><span style="color: #4c4334">&nbsp;&nbsp;&nbsp; 第八季：&ldquo;以真理为信念&rdquo; <a href="http://www.zdxqn.zju.edu.cn/redir.php?catalog_id=6452">[详细]</a></span></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" height="3" valign="top" style="text-align: center">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <p style="text-align: center">&nbsp;</p>
            </td>
        </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
</div>
<div class="books_content">
    <table cellspacing="0" cellpadding="0" width="259" align="center" bgcolor="#fdf8f3" border="0">
        <tbody>
        <tr>
            <td valign="top" colspan="3" height="272">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                    <tr>
                        <td valign="top" style="padding-left: 7px; padding-bottom: 0px; padding-top: 3px">
                            <p><img height="47" alt="" width="254" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25544" /></p>
                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-top: 10px"><a target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=2085&amp;object_id=42023"><img height="87" width="130" alt="" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=42061" /></a></td>
                                    <td valign="top" style="padding-right: 5px; padding-left: 12px; padding-bottom: 0px; color: rgb(143,17,38); line-height: 20px; padding-top: 5px">
                                        <p>&nbsp;&nbsp;&nbsp; 团干开讲第四讲：寻访红色记忆 重温建党伟业。由三位团干与你分享他们的红色感悟&hellip;<a class="xx" target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=2085&amp;object_id=42023">[详细]</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="line" valign="top" height="3" style="text-align: center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td valign="top" align="left" height="30" style="padding-left: 8px; font-size: 12px; padding-bottom: 12px; color: rgb(68,68,68); line-height: 18px">
                            <table cellspacing="0" cellpadding="0" width="259" align="center" border="0">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-right: 5px; padding-left: 7px; padding-bottom: 0px; color: rgb(143,17,38); line-height: 20px; padding-top: 0px">
                                        <p><span style="color: rgb(143,17,38)">往期回顾：</span></p>
                                        <p><span style="color: #4c4334">★我的青春我的团 五四红旗团支部展示<a class="xx" target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=2085&amp;object_id=31158">[详细]</a></span></p>
                                        <p><span style="color: #4c4334">★竺可桢的西迁故事...<a class="xx" target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=2085&amp;object_id=14109">[详细]</a></span></p>
                                        <p><span style="color: #4c4334">★新学期致辞...</span><a class="xx" target="_blank" href="redir.php?catalog_id=2085&amp;object_id=2088">[详细]</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" valign="top" height="3" style="text-align: center">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <p style="text-align: center">&nbsp;</p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="books_content">
    <table cellspacing="0" cellpadding="0" width="259" align="center" bgcolor="#fdf8f3" border="0">
        <tbody>
        <tr>
            <td valign="top" colspan="3" height="272">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tbody>
                    <tr>
                        <td valign="top" style="padding-left: 7px; padding-bottom: 5px; padding-top: 3px">
                            <p><img height="47" alt="" width="254" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25560" /></p>
                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-top: 10px"><img height="74" alt="" width="110" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=30953" /></td>
                                    <td valign="top" style="padding-right: 5px; padding-left: 12px; padding-bottom: 0px; color: rgb(143,17,38); line-height: 20px; padding-top: 7px">
                                        <p>&nbsp;&nbsp;&nbsp;校园毕业DV《哥&bull;肆》讲述了一个宿舍四名男生大学四年的成长经历...<a class="xx" target="_blank" href="redir.php?catalog_id=7439&amp;object_id=30944">[观看]</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" valign="top" height="3" style="text-align: center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td valign="top" align="left" height="30" style="padding-left: 8px; font-size: 12px; padding-bottom: 12px; color: rgb(68,68,68); line-height: 18px">
                            <table cellspacing="0" cellpadding="0" width="259" align="center" border="0">
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding-right: 5px; padding-left: 7px; padding-bottom: 0px; color: rgb(143,17,38); line-height: 20px; padding-top: 0px">
                                        <p><span style="color: rgb(143,17,38)">其他精彩视频：</span></p>
                                        <p><span style="font-size: 12px"><span style="color: #993300"><span style="font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-bidi-font-family: 'Times New Roman'; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">● </span></span><span style="color: #4c4334">浙江大学建校113周年庆祝晚会暨&ldquo;文军长征颂&rdquo;师生朗诵会</span></span><a class="xx" target="_blank" href="redir.php?catalog_id=1158&amp;object_id=24398"><span style="font-size: 12px">[上部]</span></a><a class="xx" target="_blank" href="redir.php?catalog_id=1158&amp;object_id=24402"><span style="font-size: 12px">[下部]</span></a></p>
                                        <p><span style="font-size: 12px"><span style="color: #993300"><span style="font-family: 宋体; mso-bidi-font-size: 12.0pt; mso-bidi-font-family: 'Times New Roman'; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">● </span></span><span style="color: #4c4334">青马学院二期结业暨三期开学典礼</span></span><a class="xx" target="_blank" href="redir.php?catalog_id=1158&amp;object_id=19039"><span style="font-size: 12px">[观看]</span></a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="line" valign="top" height="3" style="text-align: center">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <p style="text-align: center">&nbsp;</p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div id="books_content">

</div>
<div id="books_page">
    <table width="100%"cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td width="40" align="right"><img src="/template/images/iconLeft.gif" class="books_bottom" onclick="doLeft();" onmouseout="restart();" onmouseover="pause();"/></td>
            <td align="center">

                <img src="/template/images/icon_1.gif" class="books_page"  onclick="doChange(0);" onmouseout="restart();" onmouseover="pause();"/>
                <img src="/template/images/icon_0.gif" class="books_page"  onclick="doChange(1);" onmouseout="restart();" onmouseover="pause();"/>
                <img src="/template/images/icon_0.gif" class="books_page"  onclick="doChange(2);" onmouseout="restart();" onmouseover="pause();"/>
                <img src="/template/images/icon_0.gif" class="books_page"  onclick="doChange(3);" onmouseout="restart();" onmouseover="pause();"/>

            </td>
            <td width="40"><img src="/template/images/iconRight.gif" class="books_bottom" onclick="doRight();" onmouseout="restart();" onmouseover="pause();"/></td>
        </tr>
    </table>
</div>
</div>
</td>
</tr>
<tr>
    <td height="12" background="/template/images/more_left.gif">&nbsp;</td>
    <td height="12" background="/template/images/more_mid.gif">&nbsp;</td>
    <td height="12" background="/template/images/more_right.gif" width="2">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
<td width="5"><img height="297" width="5" src="/template/images/i_5.gif" alt="" /></td>
</tr>
</tbody>
</table>

<script language="javascript">
    var totalNum=4;
    totalNum--;

    function getElementsByClassName(name,obj){
        checkNode(obj,name.toLowerCase(),arr=new Array());
        return arr;
    }

    function checkNode(node,cname,arr){
        if(node.hasChildNodes()){
            var obj=node.childNodes;
            for(var i=0;i<obj.length;checkNode(obj[i],cname,arr),i++);
        }

        try{
            if(node.className!=null){
                var cnames=node.className.split(' ');
                for(var i=0;i<cnames.length;(cnames[i].toLowerCase()==cname)?arr.push(node):null,i++);
            }
        }catch(err){}
    }

    var Time;
    var i = 0;
    var con=document.getElementById("books_container");
    var panels=getElementsByClassName("books_content",con);
    var bottomimgs=getElementsByClassName("books_page",con);
    var content=document.getElementById("books_content");

    function doChange(a){
        i=a;
        content.innerHTML=panels[i].innerHTML;
        for(var j=0;j<bottomimgs.length;j++){
            if(i==j){
                bottomimgs[j].src="/template/images/icon_1.gif";
            }else{
                bottomimgs[j].src="/template/images/icon_0.gif";
            }
        }

    }

    function autoChange(){
        if(i > totalNum){
            i=0;
        }
        doChange(i);
        i++;
        Time=setTimeout('autoChange()',4000);
    }

    function restart(){
        i++;
        Time=setTimeout('autoChange()',4000);
    }

    function pause(){
        i--;
        clearTimeout(Time);
    }

    function doLeft(){
        if(i==0){i=totalNum;}
        else{i--;}
        doChange(i);
    }

    function doRight(){
        if(i==totalNum){i=0;}
        else{i++;}
        doChange(i);
    }

    autoChange();
</script>

</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<div class="main">
<div class="mid">
<div class="mid_m">
<div class="mid_2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td colspan="2" height="12" align="left" style="padding-left:1px;"><img src="/template/images/searchtop_line.gif" width="729" height="8" /></td>
</tr>
<tr>
<td width="729" align="center" valign="top"><table width="702" height="24" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:9px;">
    <tr>
        <td width="34" align="center" background="/template/images/serach1.gif">&nbsp;</td>
        <form id="form1" name="form1" method="get" action="/search.php" style="font-size:12px;">
            <td width="513" align="left" valign="middle" style="font-size:14px;">&nbsp;站内搜索：

                <select name="fulltext" id="fulltext">
                    <option value="0">标题</option>
                    <option value="1">全文</option>
                </select>
                <input name="kw_qbzc" type="text" id="kw_qbzc" size="50" />
                <a href="search.php" class="ss">
                    <input name="postflag" type="hidden" id="postflag" value="1" />
                    <input name="area" type="hidden" id="area" value="5" />
                </a></td>
            <td width="77" style="font-size:12px;"><a href="search.php" class="ss">
                    <input type="image" name="imageField" src="/template/images/search2.gif" />
                </a></td>
            <td width="78" align="left"><a href="search.php" class="ss">高级搜索</a></td>
        </form>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" valign="top"><table width="351" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="29" align="left" background="/template/images/i_16.gif"><img src="/template/images/i_17.gif" width="115" height="29" /></td>
                </tr>
                <tr>
                    <td background="/temp" >
                        <table width="351" height="390" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8ed" class="bk1">
                            <tr>
                                <td height="21" align="right" valign="top" background="/template/images/news_more_bg.gif"><a href="redir.php?catalog_id=316"><img src="/template/images/more2.gif" width="51" height="20" border="0" /></a></td>
                            </tr>
                            <tr>
                                <td  align="center" valign="top" style="padding-top:3px;padding-bottom:8px;"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="list1_word">

                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=319&object_id=85483" target="_blank" title="传承雷锋精神，邵医医护走进杭城社区"  class="list1_word">传承雷锋精神，邵医医护走进杭城社区</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >03-10</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=318&object_id=84876" target="_blank" title="浙大学子热心投身学雷锋"  class="list1_word">浙大学子热心投身学雷锋</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >02-25</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=323&object_id=84815" target="_blank" title="共青团浙江大学第十九届二次全委（扩大）会议召开"  class="list1_word">共青团浙江大学第十九届二次全委（扩大）会议召开</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >01-29</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=318&object_id=84782" target="_blank" title="我校启动“在实践中奉献成长”寒假大学生社会实践活动"  class="list1_word">我校启动“在实践中奉献成长”寒假大学生社会实践活动</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >01-24</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=317&object_id=84410" target="_blank" title="喜报：我校张晨同学荣获“浙江省第三届红十字十佳青少年”称号"  class="list1_word">喜报：我校张晨同学荣获“浙江省第三届红十字十佳青少年”称号</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >01-15</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=317&object_id=83600" target="_blank" title="拓开新视野，凝聚新力量，引领新风尚——儿童医院2011年校级青年文明号验收会暨工作推进会"  class="list1_word">拓开新视野，凝聚新力量，引领新风尚——儿童医院2011年校级青年文明号验收会暨工...</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >01-03</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=323&object_id=83546" target="_blank" title="校团委召开2012年共青团工作务虚会"  class="list1_word">校团委召开2012年共青团工作务虚会</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >01-03</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon" style="padding-left:20px;">&nbsp;</td>
                                            <td align="left" valign="top"> <a href="redir.php?catalog_id=324&object_id=83538" target="_blank" title="聊民声 思民生 省吾身——记浙江大学青年马克思主义者（学生骨干）培养学院对话人大代表活动分享报告会"  class="list1_word">聊民声 思民生 省吾身——记浙江大学青年马克思主义者（学生骨干）培养学院对话人...</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;" >01-03</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td height="2" colspan="2" align="left" class="xt_line"></td>
                                        </tr>

                                    </table></td>
                            </tr>
                        </table>                                  </td>
                </tr>

            </table></td>
        <td align="center" valign="top" style="padding-right:3px;"><table width="351" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="29" align="left" background="/template/images/i_16.gif"><img src="/template/images/i_18.gif" width="115" height="29" /></td>
                </tr>
                <tr>
                    <td background="/temp" >
                        <table width="351" height="390" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff8ed" class="bk1">
                            <tr>
                                <td height="21" align="right" valign="top" background="/template/images/news_more_bg.gif"><a href="redir.php?catalog_id=597"><img src="/template/images/more2.gif" width="51" height="20" border="0" /></a></td>
                            </tr>
                            <tr>
                                <td align="center" valign="top"  style="padding-top:3px; padding-bottom:8px;"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="list1_word">

                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=2046&object_id=85521" target="_blank" title="校团委关于召开院级团委书记例会的通知"   class="list1_word">校团委关于召开院级团委书记例会的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-11</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=340&object_id=85438" target="_blank" title="关于招募浙江大学行政服务办事大厅志愿者的通知"   class="list1_word">关于招募浙江大学行政服务办事大厅志愿者的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-08</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=346&object_id=85416" target="_blank" title="关于推荐优秀团干部参加团省委2013年上半年全省基层团干部培训班的通知"   class="list1_word">关于推荐优秀团干部参加团省委2013年上半年全省基层团干部培训班的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-08</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=340&object_id=85405" target="_blank" title="关于梳理报送现有校院两级大学生社会实践基地的通知"   class="list1_word">关于梳理报送现有校院两级大学生社会实践基地的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-07</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=345&object_id=85393" target="_blank" title="关于开展浙江大学“我的中国梦 我的求是情”主题征文活动的通知"   class="list1_word">关于开展浙江大学“我的中国梦 我的求是情”主题征文活动的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-07</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=345&object_id=85353" target="_blank" title="关于浙大新青年传媒2013年春季纳新的通知"   class="list1_word">关于浙大新青年传媒2013年春季纳新的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-06</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=340&object_id=85318" target="_blank" title="校团委关于做好寒假大学生“在实践中奉献成长”社会实践活动总结工作及评选优秀团队的通知"   class="list1_word">校团委关于做好寒假大学生“在实践中奉献成长”社会实践活动总结工作及评选优秀团...</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-06</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>
                                        <tr>
                                            <td width="10" align="left" class="icon"style="padding-left:20px;"></td>
                                            <td align="left" valign="top"  ><a href="redir.php?catalog_id=346&object_id=85283" target="_blank" title="校团委转发关于开展2013年“浙江杰出青年”评选活动的通知"   class="list1_word">校团委转发关于开展2013年“浙江杰出青年”评选活动的通知</a></td>
                                            <td width="50" align="left" style="color:#941c00; padding-left:8px;">03-05</td>
                                        </tr>
                                        <tr>
                                            <td height="2" align="left" ></td>
                                            <td colspan="2" height="2" align="left" class="xt_line" ></td>
                                        </tr>

                                    </table></td>
                            </tr>
                        </table></td>
                </tr>

            </table></td>
    </tr>
</table></td>
<td align="left" valign="top" style="margin-left:5px;">
    <table width="231" border="0" cellpadding="0" cellspacing="0" background="/template/images/i_12_bg.gif">
        <tr>
            <td width="222" height="33" align="right" class="bk2"><a href="/redir.php?cust=hdyg0" target="_blank"  id="more_hdyg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </td>
        </tr>
        <tr>
            <td height="54" valign="top" background="/template/images/i_13.gif">
                <DIV class="act_preview" id="main_hdyg">
                    <div style="padding-left:10px" id="main_table">

                        <script language="javascript">
                            var sheight=0; //总高度
                            var perScrollHeight=54;  //每次轮换高度
                        </script>
                    </div>
                </DIV>
            </td>
            <script language="javascript" src="/template/js/DoScroll.js"></script>
            <script language="javascript">

                var sc=new DoScroll('main_table',10000,sheight,perScrollHeight);
                sc.start();

            </script>
        </tr>
        <tr>
            <td height="9" background="/template/images/i_12_down.gif"></td>
        </tr>
    </table>
    <table width="99%" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-top:6px;">
        <tr><td  style=" background:url(/template/images/fastnav_top.gif) repeat-y;" height="27">
            </td></tr>
        <tr><td style=" background:url(/template/images/fastnav_bg.gif) repeat-y;">
                <table width="93%" border="0" align="center" cellpadding="0" cellspacing="0" class="fasttable">
                    <tr>
                        <td height="62" colspan="2" align="left"><p><a target="_blank" href="http://10.202.70.31/bookroom"><img height="57" alt="" width="104" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25742" /></a>&nbsp;<a target="_blank" href="http://10.202.70.31/dx"><img height="57" alt="" width="104" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25745" /></a></p>
                            <p><a target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=332"><img height="57" alt="" width="104" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25852" /></a>&nbsp;<a target="_blank" href="http://www.youth.zju.edu.cn/redir.php?catalog_id=336"><img height="57" alt="" width="104" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25851" /></a></p></td>
                    </tr>
                </table>
            </td></tr>
        <tr><td align="right" style=" background:url(/template/images/lastest_subject.gif) repeat-y;" height="19">
                <a href="/redir.php?catalog_id=1154" target="_blank" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </td></tr>
        <tr>
            <td style="background:url(/template/images/fastnav_bg.gif) repeat-y;">
                <table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2" align="left" style="padding-top:5px;">
                            <table border="0" cellspacing="0" cellpadding="0" align="left">
                                <tbody>
                                <tr>
                                    <td style="text-align: center; padding-bottom: 3px; padding-top: 2px"><a target="_blank" href="http://10.202.70.31/picshow/album.asp?albumID=17"><img alt="" width="212" height="53" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=52170" /></a></td>
                                </tr>
                                <tr>
                                    <td align="center"><a target="_blank" href="http://www.youth.zju.edu.cn/tdh/"><img width="212" height="53" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=70441" alt="" /></a></td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-bottom: 4px; margin-top: 8px; padding-top: 3px"><a target="_blank" href="http://10.202.70.31/picshow/album.asp?albumID=4"><img alt="" width="212" height="53" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=25854" /></a></td>
                                </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                </table>
            </td></tr>
        <tr><td height="7" style=" background:url(/template/images/fastnav_bottom.gif) repeat-y;">
            </td></tr>
    </table>
</td>
</tr>
</table>
</div>
</div></div></div>
<div class="main">
    <div class="mid">
        <div class="mid_m">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="108" align="center" style="padding-left:1px; padding-bottom:1px"><p><a href=redir.php?catalog_id=34476 target=_blank><img width="949" height="99" src="/wescms/sys/filebrowser/file.php?cmd=download&amp;id=60877" alt="" /></a></p></td>
                </tr>
                <tr>
                    <td align="center"><table width="950" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="352" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="43" background="/template/images/whtop.jpg"></td>
                                        </tr>
                                        <tr>
                                            <td align="right" height="285" background="/template/images/whmid.jpg" style="padding-bottom:3px;"><div class="xiaoyuanwh">
                                                    <div id="ifocus">
                                                        <div id="ifocus_pic">
                                                            <div id="ifocus_piclist" style="left:0; top:0;">
                                                                <ul>
                                                                    <li><a href="redir.php?catalog_id=21&object_id=33590" target="_blank"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=42505" alt="新青年·悦读" /></a></li>
                                                                    <li><a href="redir.php?catalog_id=21&object_id=32768" target="_blank"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=42507" alt="第70期求是青年报" /></a></li>
                                                                    <li><a href="redir.php?catalog_id=21&object_id=33880" target="_blank"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=33903" alt="“感动同窗·青春在奉献中闪光”事迹展" /></a></li>
                                                                </ul>
                                                            </div>
                                                            <!--<div id="ifocus_opdiv"></div>-->
                                                            <div id="ifocus_tx">
                                                                <ul>
                                                                    <li class="current"><!--新青年·悦读--></li>

                                                                    <li class="normal"><!--第70期求是青年报--></li>

                                                                    <li class="normal"><!--“感动同窗·青春在奉献中闪光”事迹展--></li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="ifocus_btn">
                                                        <ul>
                                                            <li class="current"><a href="redir.php?catalog_id=21&object_id=33590" target="_blank"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=42505" alt="新青年·悦读" /></a></li>
                                                            <li class="normal"><a href="redir.php?catalog_id=21&object_id=32768" target="_blank"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=42507" alt="第70期求是青年报" /></a></li>
                                                            <li class="normal"><a href="redir.php?catalog_id=21&object_id=33880" target="_blank"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=33903" alt="“感动同窗·青春在奉献中闪光”事迹展" /></a></li>
                                                        </ul>
                                                    </div></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10" background="/template/images/whdown.jpg"></td>
                                        </tr>
                                    </table></td>
                                <td align="right" valign="top"><table width="589" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="9" background="/template/images/qytop.jpg"></td>
                                        </tr>
                                        <tr>
                                            <td height="315" align="center" valign="top" background="/template/images/qymid.jpg" style="padding-bottom:1px" ><table width="554" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td ><img src="/template/images/i_27n.gif" width="276" height="45" border="0" usemap="#Map" /></td>
                                                        <td align="right" ><img src="/template/images/i_26n.gif" width="276" height="45" border="0" usemap="#Map2" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="padding-right:3px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="list1_word">
                                                                <!-- -->


                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[经济] <a href="redir.php?catalog_id=838&object_id=85507"target="_blank" title="挑学术之担，绽求是之光——记经济学院第十三届挑战杯初赛暨第十四届学生论文报告会"    class="list1_word">挑学术之担，绽求是之光——记经济学院第十三届挑战杯初...</a></td>
                                                                    <td width="50" align="center" style="color:#941c00;">03-11</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left"></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[管理] <a href="redir.php?catalog_id=841&object_id=85469"target="_blank" title="管理学院第七期青马工程读书报告会顺利举行"    class="list1_word">管理学院第七期青马工程读书报告会顺利举行</a></td>
                                                                    <td width="50" align="center" style="color:#941c00;">03-10</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left"></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[云峰] <a href="redir.php?catalog_id=871&object_id=85442"target="_blank" title="关于表扬栗成同学拾金不昧行为的通报"    class="list1_word">关于表扬栗成同学拾金不昧行为的通报</a></td>
                                                                    <td width="50" align="center" style="color:#941c00;">03-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left"></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[药学] <a href="redir.php?catalog_id=869&object_id=85434"target="_blank" title="百年院庆，心系药院——本科09寒假社会实践开展校友访谈活动"    class="list1_word">百年院庆，心系药院——本科09寒假社会实践开展校友访谈...</a></td>
                                                                    <td width="50" align="center" style="color:#941c00;">03-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left"></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[药学] <a href="redir.php?catalog_id=869&object_id=85431"target="_blank" title="药学院学生党总支召开新学期党总支扩大会议"    class="list1_word">药学院学生党总支召开新学期党总支扩大会议</a></td>
                                                                    <td width="50" align="center" style="color:#941c00;">03-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left"></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[药学] <a href="redir.php?catalog_id=869&object_id=85429"target="_blank" title="民以食为天——药学院开展食品安全调查寒假社会实践活动"    class="list1_word">民以食为天——药学院开展食品安全调查寒假社会实践活动</a></td>
                                                                    <td width="50" align="center" style="color:#941c00;">03-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left"></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                            </table></td>
                                                        <td valign="top">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list1_word">

                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[社团] <a href="redir.php?catalog_id=367&object_id=83761" target="_blank" title="携手环保，“袋袋”相传"    class="list1_word">携手环保，“袋袋”相传记浙江大学学生绿之源协会环...</a></td>
                                                                    <td width="45" align="center" style="color:#941c00;" >01-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left" ></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[社团] <a href="redir.php?catalog_id=367&object_id=83759" target="_blank" title="银装素裹筷生树，携手护林绿相传"    class="list1_word">银装素裹筷生树，携手护林绿相传记浙江大学学生绿之...</a></td>
                                                                    <td width="45" align="center" style="color:#941c00;" >01-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left" ></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[社团] <a href="redir.php?catalog_id=367&object_id=83757" target="_blank" title="求是茶话会，共迎新一年"    class="list1_word">求是茶话会，共迎新一年</a></td>
                                                                    <td width="45" align="center" style="color:#941c00;" >01-08</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left" ></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[新青年] <a href="redir.php?catalog_id=81927&object_id=83644" target="_blank" title="畅聊新媒体之路，共述新青年理想 ——2012年度浙大&#8226;新青年传媒总结大会举行"    class="list1_word">畅聊新媒体之路，共述新青年理想 ——2012年度浙大...</a></td>
                                                                    <td width="45" align="center" style="color:#941c00;" >01-03</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left" ></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[社团] <a href="redir.php?catalog_id=367&object_id=83618" target="_blank" title="妙语连珠百炼文，德礼相济亦修身"    class="list1_word">妙语连珠百炼文，德礼相济亦修身——记社团精英班文...</a></td>
                                                                    <td width="45" align="center" style="color:#941c00;" >01-03</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left" ></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="icon2"style="padding-left:20px;">&nbsp;</td>
                                                                    <td align="left">[社团] <a href="redir.php?catalog_id=367&object_id=83323" target="_blank" title="我校社团代表赴京参加首届“中国高校国际交流社团联谊会”"    class="list1_word">我校社团代表赴京参加首届“中国高校国际交流社团联...</a></td>
                                                                    <td width="45" align="center" style="color:#941c00;" >01-02</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="2" align="left" ></td>
                                                                    <td height="2" colspan="2" align="left" background="/template/images/line2.gif"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td height="9" background="/template/images/qydown.jpg"></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="main">
    <div class="mid">
        <div class="mid_m" style="padding:7px 0 8px 0;">
            <div class="mid_4">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="176" height="30" background="/template/images/i_28.gif">&nbsp;</td>
                        <td align="right" valign="bottom" background="/template/images/i_28_bg.gif"><a href="redir.php?catalog_id=22"><img src="/template/images/more4.gif" width="59" height="25" border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>

                <div id="js"style="overflow:hidden;margin:0 auto 0 auto;width:940px;">
                    <table width="98%" height="170" border="0" cellpadding="0" cellspacing="0" style="padding-left:2px;">
                        <tr>

                            <td  valign="top" id=js1>
                                <table height="157" border="0" align="left" cellpadding="0" cellspacing="0">
                                    <tr>

                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=83532"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=83531"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=83532"  title="外语学院学生社团代表赴京加盟首届“中国高校国际交流社团联谊会”" class="list_word" target="_blank">外语学院学生社团代表赴京...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=82784"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=82782"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=82784"  title="第二十三届国际文化节之第五届“海纳杯”全杭英语辩论赛总决赛圆满结束" class="list_word" target="_blank">第二十三届国际文化节之第...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=84808"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84825"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=84808"  title="师生座谈，平安新年——丹青学园召开2013年寒假学校学生安全稳定会议" class="list_word" target="_blank">师生座谈，平安新年——丹...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=84804"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84827"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=84804"  title="丹青学园2013年寒期社会实践动员大会顺利召开" class="list_word" target="_blank">丹青学园2013年寒期社会实...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=84796"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84829"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=84796"  title="美丽“心”世界，丹青展风采" class="list_word" target="_blank">美丽“心”世界，丹青展风采</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=83750"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84858"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=83750"  title="丹青学园人文大类第一次学生代表大会胜利召开" class="list_word" target="_blank">丹青学园人文大类第一次学...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=83748"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84856"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=83748"  title="辞旧迎新夜，丹青共欢腾——记丹青嘉年华大型新年主题活动暨“文韵丹青”文化节闭幕式" class="list_word" target="_blank">辞旧迎新夜，丹青共欢腾—...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=83746"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84854"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=83746"  title="丹青学园分团委迎新晚会顺利举办" class="list_word" target="_blank">丹青学园分团委迎新晚会顺...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=83744"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84852"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=83744"  title="展青春风采，谱美好未来——记求是学院丹青学园主题团日活动总结暨第五届“特色团支部”风采展示" class="list_word" target="_blank">展青春风采，谱美好未来—...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=82769"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=82768"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=82769"  title="第23届国际文化节之第五届“英语百科知识竞赛” 总决赛 巅峰对决" class="list_word" target="_blank">第23届国际文化节之第五届...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=81537"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=81531"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=81537"  title="浙江大学第二十三届国际文化节·日语动漫配音比赛成功举办" class="list_word" target="_blank">浙江大学第二十三届国际文...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=81500"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=81494"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=81500"  title="第二十三届国际文化节之外文歌曲大赛总决赛成功举办" class="list_word" target="_blank">第二十三届国际文化节之外...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=81096"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=81090"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=81096"  title="第二十三届国际文化节之第五届“英语百科知识竞赛”群雄逐鹿，问鼎六强" class="list_word" target="_blank">第二十三届国际文化节之第...</a></td>
                                        <td align="center" valign="middle" class="img_js"><a href="redir.php?catalog_id=22&object_id=80453"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=84833"  height="137" class="bk_5" /></a><br/><a href="redir.php?catalog_id=22&object_id=80453"  title="重温峥嵘岁月 共创美好未来 ——机械系学生党总支学习十八大精神活动之 “思源之行”" class="list_word" target="_blank">重温峥嵘岁月 共创美好未...</a></td>
                                    </tr>
                                </table>
                            </td>
                            <td  valign="top" id=js2></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="link">
                <table width="929" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="12" height="98" background="/template/images/yqlinkl.jpg">&nbsp;</td>
                        <td background="/template/images/yqlinkm.jpg"><table width="100%" height="88" border="0" cellpadding="0" cellspacing="0">
                                <tr>

                                    <td align="center">


                                        <a href="redir.php?catalog_id=1334&object_id=2257"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=2323" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=81986"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=81985" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=1342"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=2331" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=81981"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=81980" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=1344"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=32191" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=1339"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=4621" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=1336"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=2335" width="144" height="38"  /></a>  <a href="redir.php?catalog_id=1334&object_id=1346"><img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=4619" width="144" height="38"  /></a> </td>
                                </tr>
                                <tr>

                                    <td style="padding-left:2px">
                                        <a  href="http://www.zjgqt.org/"  class="linkname">中国共青团</a>
                                        <a  href="http://www.zjgqt.org/"  class="linkname">浙江共青团</a>
                                        <a  href="http://www.zju.edu.cn/"  class="linkname">浙江大学</a>
                                        <a  href="http://www.news.zju.edu.cn/"  class="linkname">求是新闻网</a>
                                        <a  href="redir.php?catalog_id=1445&object_id=1447"  class="linkname">兄弟高校共青团</a>
                                        <a  href="http://www.2800.zju.edu.cn"  class="linkname">浙江大学研究生支教团</a>
                                        <a  href="http://www.youth.zju.edu.cn/jst"  class="linkname">浙江大学青年志愿讲师团</a>
                                        <a  href="redir.php?catalog_id=1445&object_id=2350"  class="linkname">各院系团委</a>
                                        <a  href="http://www.culture.zju.edu.cn/"  class="linkname">文化素质网</a>
                                        <a  href="http://bbs.zju.edu.cn"  class="linkname">海纳百川BBS站</a>
                                    </td>
                                </tr>
                            </table></td>
                        <td width="12" background="/template/images/yqlinkr.jpg">&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div></div></div>

<div class="main">
    <div class="mid">
        <div class="mid_m"><!-- #BeginLibraryItem "/Library/footer.lbi" --><div  id="footer">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="10" height="111" background="/template/images/f_left.gif"></td>
                        <td align="center" background="/template/images/f_mid.gif" class="footer">您是第 <span style="color:#f2fb03">2301836</span> 位访问者<br />
                            版权所有 共青团浙江大学委员会  技术支持 <a href="http://www.cgsoft.com.cn">创高软件</a> <a href="http://www.youth.zju.edu.cn/old">旧版网站</a> <a href="/wescms" target="_blank">管理登录</a><br/>
                            地址：浙江大学紫金港校区小剧场B座317室 邮编：310058 电话：0571-88206671 传真：0571-88206672  </td>
                        <td width="10" background="/template/images/f_end.gif"></td>
                    </tr>
                </table>
            </div><!-- #EndLibraryItem --></div>
    </div>
</div><!--滚动图片js-->
<SCRIPT type=text/javascript>

    var speed3=50;//速度数值越大速度越慢
    var js1 = document.getElementById("js1");    //非w3c标准要找到表单，必须是要用getElementById("XX");
    var js2 = document.getElementById("js2");
    var js = document.getElementById("js");
    js2.innerHTML=js1.innerHTML;

    function Marquee3(){
        if(js2.offsetWidth-js.scrollLeft<=0)
            js.scrollLeft-=js1.offsetWidth;
        else{
            js.scrollLeft++;
        }
    }
    var MyMar3=setInterval(Marquee3,speed3)
    js.onmouseover=function() {clearInterval(MyMar3)}
    js.onmouseout=function() {MyMar3=setInterval(Marquee3,speed3)}

</SCRIPT>
<!--滚动图片js-->

<map name="Map2" id="Map2">
    <area shape="rect" coords="205,14,264,40" href="redir.php?catalog_id=19" />
</map>
<map name="Map4" id="Map4">
    <area shape="rect" coords="177,15,235,40" href="redir.php?catalog_id=19" />
</map>

<map name="Map" id="Map">
    <area shape="rect" coords="222,17,261,37" href="redir.php?catalog_id=20" />
</map>
<script type="text/javascript" src="/wescms/lib/wesad.js"></script>






<div id="shibada"><a href="http://images.youth.cn/Video/tuanzhongyang/18da/xcb20121227a.wmv" target="_blank">
        <img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=85474" /></a></div>
<script type="text/javascript" src="/template/js/jquery.min.js"></script>
<script type="text/javascript" src="/template/js/cglib.min.js"></script>

<script type="text/javascript">
    $(function(){
        if($("#tzb").html()!=""){
            $("#tzb").cgAd({type:"random"});
        }
        if($("#shibada").html()!=""){
            $("#shibada").cgAd({type:"random",left:500,top:200,direction:2});
        }
    })
</script>

</body>
</html>
