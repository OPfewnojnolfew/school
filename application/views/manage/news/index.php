<style type="text/css">
    .tableForm {
        width: 100%;
        border-left: #E2E2E2 solid 1px;
        border-top: #E2E2E2 solid 1px;
        border-collapse: collapse;
    }

    .tableForm caption {
        text-align: left;
        font-size: 14px;
    }

    .tableForm th {
        background-color: #E2E2E2;
        font-weight: normal;
    }

    .tableForm td {
        border-right: #E2E2E2 solid 1px;
        border-bottom: #E2E2E2 solid 1px;
        vertical-align: top;
        padding: 2px;
    }

    .tableForm input {
        border: solid 1px #CCCCCC;
    }

    .l-btn-plain-add {
        background: none repeat scroll 0 0 #E2E2E2 !important;
    }
</style>
<div class="pagecontent">
    <div class="easyui-layout layout_newslist">
        <div data-options="region:'west',split:true" title="文档分类" style="width:180px;">
            <ul class="easyui-tree tree_newslist" data-options="url:'<? echo base_url('manage/news/getMenus') ?>'"
                style="padding: 10px 5px;">
            </ul>
        </div>
        <div data-options="region:'center'" style="">
            <div id="tabs_newslist" class="easyui-tabs" fit="true" border="false">
            </div>
            <script>
                $(function () {
                    var height = $('.indexcenter').height();
                    var classId = 'newslist';
                    $('#tabs_' + classId).tabs({
                        onBeforeClose: function (which) {
                            var newobj = $(this).tabs("getTab", which).data("newObj");
                            if (newobj && newobj.editor) {
                                newobj.editor.destroy();
                            }
                        }
                    });
                    $('.layout_' + classId).css('height', height - 30);
                    $('.tree_' + classId).tree({
                        onClick: function (node) {
                            if (!$(this).tree('isLeaf', node.target)) {
                                return;
                            }
                            var nid = node.id;
                            var type = node.attributes.type;
                            var url = '<?echo base_url()?>/manage/news/newList/menuid/' + nid + '/type/' + type + '/';
                            var subtitle = node.text;
                            if (!$('#tabs_' + classId).tabs('exists', subtitle)) {
                                $('#tabs_' + classId).tabs('add', {
                                    id: global._tabIdPrefix + nid,
                                    title: subtitle,
                                    content: subtitle,
                                    closable: true,
                                    href: url
                                });
                                return false;
                            } else {
                                $('#tabs_' + classId).tabs('select', subtitle);
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
<!--window end-->