
<script type="text/javascript"
	src="<?php echo base_url();?>themes/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8"
	src="<?php echo base_url();?>themes/kindeditor/zh_CN.js"></script>
<script charset="utf-8"
	src="<?php echo base_url();?>scripts/manage/news/addOrEdit.js"></script>
<div>
	<a href="javascript:void(0)" mark="editSave" class="easyui-linkbutton"
		>保存</a> <a href="javascript:history.go(-1);"
		mark="cancelSave" class="easyui-linkbutton">取消</a>
</div>
<div>
	<input type="hidden" id="hdnId" value="<?php if (empty($news->id) && isset($news->id))  {echo $news->id;}?>" />
	<div>
		标题:<input type="text" id="title" value="<?php echo $news->title?>" />
	</div>
	<div>
		内容:
		<textarea id="content" name="content"
			style="width: 700px; height: 300px;">
<?php echo $news->content?>
</textarea>
	</div>
	<div>
		撰稿人:<input type="text" id="copyWriter" value="<?php echo $news->copyWriter?>" />
	</div>

</div>
<div>
	<a href="javascript:void(0)" mark="editSave" class="easyui-linkbutton"
		>保存</a> <a href="javascript:history.go(-1);"
		mark="cancelSave" class="easyui-linkbutton">取消</a>
</div>