var curMenu = null, zTree_Menu = null;
var setting = {
    async: {
        enable: true,
        url:global._prefix+"/manage/base/getZtreeMenus"
    },
    view: {
        showLine: false,
        showIcon: false,
        selectedMulti: false,
        dblClickExpand: false,
        addDiyDom: addDiyDom
    },
    data: {
        simpleData: {
            enable: true,
            idKey:"id",
            pIdKey:"pid",
            rootPid:""
        }
    },
    callback: {
        beforeClick: function(treeId, treeNode){
            if (treeNode.level == 0 ) {
                var zTree = $.fn.zTree.getZTreeObj("menusTree");
                zTree.expandNode(treeNode);
                return false;
            }
            return true;
        },
        onClick:function(event,treeId,treeNode){
            if(!treeNode.isParent||treeNode.type==="0"){
                location.href=global._prefix+global.baseUrl+"?menuId="+treeNode.id+"&type="+treeNode.type;
            }
        }
    }
};
function addDiyDom(treeId, treeNode) {
    var spaceWidth = 5;
    var switchObj = $("#" + treeNode.tId + "_switch"),
    icoObj = $("#" + treeNode.tId + "_ico");
    switchObj.remove();
    icoObj.before(switchObj);

    if (treeNode.level > 1) {
    var spaceStr = "<span style='display: inline-block;width:" + (spaceWidth * treeNode.level)+ "px'></span>";
    switchObj.before(spaceStr);
    }
}


$(document).ready(function(){
    var treeObj = $("#menusTree");
    $.fn.zTree.init(treeObj, setting);
    zTree_Menu = $.fn.zTree.getZTreeObj("menusTree");

    treeObj.hover(function () {
        if (!treeObj.hasClass("showIcon")) {
            treeObj.addClass("showIcon");
        }
    }, function() {
        treeObj.removeClass("showIcon");
    });
});