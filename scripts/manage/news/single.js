function Single(menuid){
    this.menuid=menuid;
    this.title=null;
    this.editor=null;
    this.id="";
    this.init();
}
Single.prototype={
    save:function(){
        var _this=this;
        var title=$.trim(this.title.val());
        if(title===""){
            $.messager.alert("提示框","标题不能为空","",function(){
                _this.title.focus();
            });
            return;
        }
        var news={
            id:this.id,
            menuid:this.menuid,
            title:title,
            content:this.editor.getContent()
        };
        $.post(global._prefix+"/manage/news/addOrEditSingle",news,function(res){
            res=eval("("+res+")");
            if(res.type==="1"){
                _this.id=res.id;
                $.messager.alert("提示框","编辑成功");
            }else{
                $.messager.alert("提示框",res.errorMessage);
            }
        })
    },
    init: function () {
        var _this=this;
        this.title= $("#singleTitle"+_this.menuid);
        this.editor = UE.getEditor('singleContent'+this.menuid);
        $.post(global._prefix+"/manage/news/initSingle",{menuid:this.menuid},function(res){
            if(res!==""){
                res=eval("("+res+")");
                _this.id=res.id;
                _this.title.val(res.title);
                _this.editor.setContent(res.content,false);
            }
        })
    }
}