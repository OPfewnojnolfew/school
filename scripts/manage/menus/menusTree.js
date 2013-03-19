$(function(){
    $("#menusTree").tree({
        url: global._prefix + '/manage/base/getMenus',
        onSelect:function(node){
            if($("#menusTree").tree("isLeaf",node.target)){
            location.href=global._prefix+node.attributes.url+"?menuid="+node.id;
            }
        }
    })
})