function Single(menuid){
    this.menuid=menuid;
    this.editor=null;
    this.id="";
    this.init();
}
Single.prototype={
    save:function(){
        var _this=this;
        var news={
            id:this.id,
            menuid:this.menuid,
            title: $("#singleTitle"+_this.menuid).val(),
            content:this.editor.html()
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
        this.editor = KindEditor.create("#singleContent" + this.menuid, {
            resizeType: 1,
            allowPreviewEmoticons: false,
            allowImageUpload: false,
            items: [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
        $.post(global._prefix+"/manage/news/initSingle",{menuid:this.menuid},function(res){
            if(res!==""){
                res=eval("("+res+")");
                _this.id=res.id;
                $("#singleTitle"+_this.menuid).val(res.title);
                _this.editor.html(res.content);
            }
        })
    }
}