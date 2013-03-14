
<script type="text/javascript"
	src="<?php echo base_url();?>themes/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8"
	src="<?php echo base_url();?>themes/kindeditor/zh_CN.js"></script>
<script charset="utf-8"
	src="<?php echo base_url();?>scripts/manage/news/addOrEdit.js"></script>
<div>
	<a href="javascript:void(0)" mark="addSave" class="easyui-linkbutton"
		>保存</a> <a href="javascript:history.go(-1);"
		mark="cancelSave" class="easyui-linkbutton">取消</a>
</div>
<div>
	<div>
		标题:<input type="text" id="title"/>
	</div>
	<div>
		内容:
		<textarea id="content" name="content"
			style="width: 700px; height: 300px;">
</textarea>
	</div>
	<div>
		撰稿人:<input type="text" id="copyWriter" />
	</div>

</div>
<div>
	<a href="javascript:void(0)" mark="addSave" class="easyui-linkbutton"
		>保存</a> <a href="javascript:history.go(-1);"
		mark="cancelSave" class="easyui-linkbutton">取消</a>
</div>