<div class="pagecontent">
    <table id="treegrid_newssort">
    </table>
    <script>
        $(function(){
            var classId = 'newssort';
            var urljson = "<?php echo base_url('manage/user/userlist')?>";
            var hrefadd = 'news/newssortadd.html';
            var hrefedit = 'news/newssortadd.html';
            var hrefcancel = '__APP__/NewsSort/delete';
            var height = $('.indexcenter').height();
            //openTreeGrid(classId,urljson,hrefadd,hrefedit,hrefcancel);
            $('#treegrid_'+classId).datagrid({
                url:urljson,
                idField:'cat_id',
                pagination:false,
                fitColumns:true,
                autoRowHeight:false,
                height:height-50,
                toolbar:[{
                    id:'btnadd'+classId,
                    text:'添加',
                    iconCls:'icon-add',
                    handler:function(){
                        var title = '添加分类';
                        admin_newscat_appendFun(classId,hrefadd,title);
                    }
                },'-',{
                    id:'btnedit'+classId,
                    text:'展开',
                    iconCls:'icon-redo',
                    handler: function() {
                        var node = $('#treegrid_newssort').treegrid('getSelected');
                        if (node) {
                            $('#treegrid_newssort').treegrid('expandAll', node.cid);
                        } else {
                            $('#treegrid_newssort').treegrid('expandAll');
                        }
                    }
                },'-',{
                    id:'btnedit'+classId,
                    text:'折叠',
                    iconCls:'icon-undo',
                    handler: function() {
                        var node = $('#treegrid_newssort').treegrid('getSelected');
                        if (node) {
                            $('#treegrid_newssort').treegrid('collapseAll', node.cid);
                        } else {
                            $('#treegrid_newssort').treegrid('collapseAll');
                        }
                    }
                },'-',{
                    id:'btnedit'+classId,
                    text:'刷新',
                    iconCls:'icon-reload',
                    handler: function() {
                        $('#treegrid_newssort').treegrid('reload');
                    }
                }
                ],
                columns:[[
                    {field:'account_id',title:'ID',width:20,align:'center'},
                    {field:'username',title:'用户名',width:200},
                    {field:'nickname',title:'昵称',width:50},
                    {field:'login_time',title:'最近登录时间',width:50},
                    {field:'login_ip',title:'IP',width:50},
                    {field:'logincount',title:'登录次数',width:50}
                ]]
            })
        })

    </script>

</div><!--pagecontent-->