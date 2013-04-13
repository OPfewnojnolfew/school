<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            var iFocusBtns= $('#'+iFocusBtnID).children('li');
            var iFocusTxs = $('#'+iFocusTxID).children('li');
            for(var i=0; i<iFocusBtns.length; i++) {
                iFocusBtns[i].className='normal';
                iFocusTxs[i].className='normal';
            }
        }

        function classCurrent(iFocusBtnID,iFocusTxID,n){
            var iFocusBtns= $('#'+iFocusBtnID).children('li');
            var iFocusTxs = $('#'+iFocusTxID).children('li');
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

        //setInterval('autoiFocus()',5000);
        var atuokey = false;
        function autoiFocus() {
            if(!$('ifocus')) return false;
            if(atuokey) return false;
            var focusBtnList = $('#ifocus_btn li');
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
<?php $this->load->view('nav'); ?>
<div class="main">
<div class="mid">
<div class="mid_m">
<div class="mid_1">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<?php $this->load->view('focus'); ?>
<td width="271" valign="top" style="padding-right:5px;" class="dantuanyw">

<table cellspacing="0" cellpadding="0" bordercolor="#fdf8f3" border="0" align="center" width="270">
<tbody>
<tr>
<td width="5"><img height="297" width="5" src="<?php echo base_url();?>/template/images/i_4.gif" alt="" /></td>
<td valign="top" colspan="3">
<table cellspacing="0" cellpadding="0" border="0" bgcolor="#fdf8f3" align="center" width="259">
<tbody>
<tr>
<?php $this->load->view('rfocus'); ?>
</tr>
<tr>
    <td height="12" background="<?php echo base_url();?>/template/images/more_left.gif">&nbsp;</td>
    <td height="12" background="<?php echo base_url();?>/template/images/more_mid.gif">&nbsp;</td>
    <td height="12" background="<?php echo base_url();?>/template/images/more_right.gif" width="2">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
<td width="5"><img height="297" width="5" src="<?php echo base_url();?>/template/images/i_5.gif" alt="" /></td>
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
    <td colspan="2" height="12" align="left" style="padding-left:1px;"><img src="<?php echo base_url()?>/template/images/searchtop_line.gif" width="729" height="8" /></td>
</tr>
<tr>
<td width="729" align="center" valign="top">
    <?php echo $this->load->view('newsindex'); ?>
</td>
<td align="left" valign="top" style="margin-left:5px;">
    <?php echo $this->load->view('right'); ?>
</td>
</tr>
</table>
</div>
</div></div></div>
<div class="main">
    <div class="mid">
        <div class="mid_m">
            <?php $this->load->view('cultrue'); ?>
        </div>
    </div>
</div>
<div class="main">
    <div class="mid">
        <div class="mid_m" style="padding:7px 0 8px 0;">
            <div class="mid_4">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="176" height="30" background="<?php echo base_url();?>/template/images/i_28.gif">&nbsp;</td>
                        <td align="right" valign="bottom" background="<?php echo base_url();?>/template/images/i_28_bg.gif">
                            <a href="<?php echo base_url('category/index/48');?>"><img src="<?php echo base_url();?>/template/images/more4.gif" width="59" height="25" border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <?php $this->load->view('imagenews'); ?>

            </div>
        <?php $this->load->view('link'); ?>
        </div></div></div>

<div class="main">
    <div class="mid">
        <?php $this->load->view('foot');?>
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
    <area shape="rect" coords="205,14,264,40" href="<?php echo base_url('category/index/20') ?>" />
</map>
<map name="Map4" id="Map4">
    <area shape="rect" coords="177,15,235,40" href="#" />
</map>

<map name="Map" id="Map">
    <area shape="rect" coords="222,17,261,37" href="<?php echo base_url('category/index/32') ?>" />
</map>
<script type="text/javascript" src="<?php echo base_url();?>/wescms/lib/wesad.js"></script>
<!--<div id="shibada"><a href="http://images.youth.cn/Video/tuanzhongyang/18da/xcb20121227a.wmv" target="_blank">
        <img src="/wescms/sys/filebrowser/file.php?cmd=preview&id=85474" /></a></div>-->
<script type="text/javascript" src="<?php echo base_url();?>/template/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/template/js/cglib.min.js"></script>
<script type="text/javascript">
    $(function(){
        if($("#tzb").html()!=""){
            $("#tzb").cgAd({type:"random"});
        }
        if($("#shibada").html()!=""){
            $("#shibada").cgAd({type:"random",left:500,top:200,direction:2});
        }
    })

    $("#ifocus_btn li").mouseover(function(){
        $(this).addClass("current").siblings("li").removeClass("current");
        var  index= $(this).index();
        $("#ifocus_piclist li").eq(index).show().siblings("li").hide();
    });
</script>
</body>
</html>
