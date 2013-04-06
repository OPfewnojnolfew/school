<?php $this->load->view('head');?>
<!--下拉列表结束-->
<!-- #EndLibraryItem --><div class="mid">
<div class="list">
<table width="968" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td width="234" valign="top" bgcolor="#f4f4f4">
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

    <?php $this->load->view('search'); ?>
    </td>

<td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                </table></td>
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
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0"  style= "table-layout:fixed;word-wrap:break-word;word-break:break-all">

                                                                <tr>
                                                                    <td colSpan=2 vAlign=top class="con_ny"><p>
                                                                        <table class="MsoTableGrid" cellspacing="0" cellpadding="0" width="679" border="1" style="border-right: medium none; border-top: medium none; border-left: medium none; width: 509.4pt; border-bottom: medium none; border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0cm 5.4pt 0cm 5.4pt; mso-border-alt: solid white .5pt; mso-border-insideh: .75pt solid white; mso-border-insidev: .75pt solid white">
                                                                            <tbody>
                                                                            <tr style="mso-yfti-irow: 1">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: white 1pt solid; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">办公室：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">管理、安排日常事务性工作、制定各项规章制度，沟通协调学院团委，文件管理、经费管理、接待来访人员。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 2">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">组织部：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">专职团干职务任免，各类组织规章制度制定，团干部的基础教育，团费收缴，团籍注册，团内奖惩。组织党校入党积极分子培训班，对专职团干部、团支部书记进行日常团务培训，开展团员的团员意识教育，做好&ldquo;推优&rdquo;工作。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 3">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 22.1pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 2.0"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">宣传部：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">组织团员理论学习，编辑团报《求是青年》，各类新闻信息的收集汇总，对内对外的新闻宣传报道工作；进行团工作的调研，研究青年学生思想状况，开展课题研究工作。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 4">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">文体部：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">发扬&ldquo;求是&rdquo;精神、举办&ldquo;科技文化节&rdquo;、&ldquo;高雅艺术进校园&rdquo;、演讲赛、辩论赛等系列学生喜爱的校园文化体育活动，营造蓬勃向上的校园文化氛围。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><font face="Times New Roman">&nbsp;&nbsp;<o:p></o:p></font></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 5">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">社会实践指导中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">开展各县市大学生社会实践基地建设，组织&ldquo;科技、文化、卫生三下乡&rdquo;为主题的寒暑假及日常社会实践活动，为大学生提供走出校园、了解社会的机会，引导大学生在实践中认识国情、奉献社会、提高素质。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 6">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">学生科技指导中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">组织开展浙江大学&ldquo;挑战杯&rdquo;学生科研立项申报，浙江大学&ldquo;挑战杯&rdquo;学生科研竞赛、浙江大学学生创业计划竞赛等科技类竞赛，选拔优秀作品参加全国各级各类学生科技竞赛，举办浙江大学本科生学术科研排行榜暨学术之星评选活动，浙江大学科技成果展等活动，指导学术性社团开展活动，培养大学生科研意识和创新能力。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 7">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">社团指导中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">对全校各类学生社团进行指导、管理和培训，社团成立审批，指导社团组织建设，制定社团组织管理规章制度，举办社团文化节，发挥学生社团在丰富校园文化、开展思想政治教育的重要作用。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 8">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.55pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.95"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">青工团建联络中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">青年教工团的各项工作，开展附属医院、后勤、机关、图书馆等青年教工基层组织建设，开展青年文明号创建和评选活动。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 9">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">青年志愿者指导中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">负责全校青年志愿者工作的协调和开展，开展&ldquo;三&middot;五&rdquo;学雷锋等系列日常青年志愿者活动，进行青年志愿者的招募、注册、服务、考核和评估等工作；组织开展团中央青年志愿者&ldquo;扶贫支教接力计划&rdquo;，欠发达地区志愿服务计划；服务社区，进行区校共建活动。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 10">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">网络资源中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">负责团委各网站的策划设计和推广，保障服务器及网站的安全稳定运行，配合宣传部做好网络宣传的保障工作，为校团委重大活动提供技术支持，组织安排校团委内部人员及学生干部的技术培训工作。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 11">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-bottom-alt: .75pt; mso-border-top-alt: .75pt; mso-border-left-alt: .5pt; mso-border-right-alt: .5pt; mso-border-color-alt: white; mso-border-style-alt: solid">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">大学生素质拓展认证中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">在校&ldquo;大学生素质拓展计划&rdquo;领导小组的指导下，负责&ldquo;大学生素质拓展计划&rdquo;的实施和认证工作。通过建立大学生素质拓展网，开展素质拓展网络管理和认证工作。并与教务部第二课堂学分管理、学工部综合素质评价等工作进行有机结合，开展学生素质拓展经历的记录和评价等工作。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="mso-yfti-irow: 12; mso-yfti-lastrow: yes">
                                                                                <td valign="top" width="679" style="border-right: white 1pt solid; padding-right: 5.4pt; border-top: #ece9d8; padding-left: 5.4pt; padding-bottom: 0cm; border-left: white 1pt solid; width: 509.4pt; padding-top: 0cm; border-bottom: white 1pt solid; background-color: transparent; mso-border-alt: solid white .5pt; mso-border-top-alt: solid white .75pt">
                                                                                    <p class="MsoNormal" style="margin: 6pt 0cm; text-indent: 21.65pt; line-height: 150%; mso-para-margin-top: .5gd; mso-para-margin-right: 0cm; mso-para-margin-bottom: .5gd; mso-para-margin-left: 0cm; mso-char-indent-count: 1.96"><b style="mso-bidi-font-weight: normal"><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">青年素质发展中心：</span></b><span style="font-size: 11pt; line-height: 150%; font-family: 宋体; mso-ascii-font-family: 'Times New Roman'; mso-hansi-font-family: 'Times New Roman'">浙江大学学生团干部与优秀青年人才的培养基地，注重对学生团干部的教育、培养，坚持激励学员自主学习、自我实践，努力培养一批具有创新的人生理念、极致的人格魅力和超前个性思维的复合型人才。青素举办了众多高质量、高水准的素质拓展培训和社会实践活动，创立了&ldquo;争鸣堂&rdquo;等知名品牌。</span><span lang="EN-US" style="font-size: 11pt; line-height: 150%"><o:p></o:p></span></p>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        </p></td>
                                                                </tr>
                                                            </table>
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
