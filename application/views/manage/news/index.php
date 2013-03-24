<style type="text/css">
    .tableForm{ width:100%; border-left:#E2E2E2 solid 1px;border-top:#E2E2E2 solid 1px;border-collapse:collapse;}
    .tableForm caption{ text-align:left; font-size:14px;}
    .tableForm th{background-color:#E2E2E2; font-weight:normal;}
    .tableForm td{border-right:#E2E2E2 solid 1px;border-bottom:#E2E2E2 solid 1px;vertical-align: top; padding:2px;}
    .tableForm input{ border: solid 1px #CCCCCC;}
    .l-btn-plain-add {
        background: none repeat scroll 0 0 #E2E2E2 !important;
    }
</style>
<div class="pagecontent">
    <div class="easyui-layout layout_newslist">
        <div data-options="region:'west',split:true" title="文档分类" style="width:180px;">
            <ul class="easyui-tree tree_newslist" data-options="url:'<?echo base_url('manage/news/getMenus')?>'" style="padding: 10px 5px;">
            </ul>
        </div>
        <div data-options="region:'center'" style="">
            <div id="tabs_newslist" class="easyui-tabs"  fit="true" border="false">
            </div>
            <script>
                $(function(){
                    var height = $('.indexcenter').height();
                    var classId = 'newslist';
                    $('.layout_'+classId).css('height',height-30);
                    $('.tree_'+classId).tree({
                        onClick:function(node){
                            if(!$('.tree_'+classId).tree('isLeaf',node.target)){
                                return;
                            }
                            var nid = node.id;
                            var type=node.attributes.type;
                            //var clickclass = $('.tree_'+classId+' .tree-node-selected a');
                            var url = '<?echo base_url()?>/manage/news/newList/menuid/'+nid+'/type/'+type+'/';
                            //var classId = 'modelsortlist';
                            var subtitle = node.text;
                            if(!$('#tabs_'+classId).tabs('exists',subtitle)){
                                $('#tabs_'+classId).tabs('add',{
                                    id:global._tabIdPrefix+nid,
                                    title:subtitle,
                                    content:subtitle,
                                    closable:true,
                                    href:url
//                                    tools:[{
//                                        iconCls:'icon-mini-refresh',
//                                        handler:function(){
//                                            //updateTab(classId,url,subtitle);
//                                        }
//                                    }]
                                });
                                return false;
                            }else{
                                $('#tabs_'+classId).tabs('select',subtitle);
                                return false;
                            }

                        }//onclick
                    });

                })
            </script>
        </div>
    </div>
</div><!--pagecontent-->

<!--window start-->
<div id="normalListWin" class="easyui-window" title="菜单管理" closed="true" collapsible="false" minimizable="false" maximizable="false"
     style="width: 400px; height: 300px;">
    <input type="hidden" id="normalListMenuid">
    <input type="hidden" id="normalListId">
    <div class="easyui-layout" fit="true">
        <div region="center" border="false" style="padding: 10px; background: #fff; border: 1px solid #ccc;">
            <div class="popupCon">
                <ul class="popSort">
                    <li>
                        <label class="popLab">
                            标题：</label><input type="text" class="popupText" id="normalListTitle" />
                    </li>
                </ul>
                <ul class="popSort">
                    <li>
                        <label class="popLab">
                            内&#12288;&#12288;容：</label><textarea class="popupArea" id="normalListContent" name="normalListContent" style="width:382px;"></textarea></li>
                </ul>
            </div>
            <div region="south" border="false" style="text-align: center; height: 30px; padding-top: 3px;">
                <a class="easyui-linkbutton" id="normalListSave" href="javascript:void(0)">确定</a> <a class="easyui-linkbutton"
                                                                                                     id="normalListCancel" href="javascript:void(0)">取消</a>
            </div>
        </div>
    </div>
    </div>
    <!--window end-->