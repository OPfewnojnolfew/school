<?php
class Uploadify extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'manage/Uploadify_model' );
    }
    public function upload(){
        $targetFolder ='upload';
        $time=time();
        $tempFile = $_FILES['Filedata']['tmp_name'];
        $targetPath =  dirname(BASEPATH) .'/'. $targetFolder;

        if(!is_dir($targetPath))
        {
            mkdir($targetPath);
         }
        $fileName=$time . '_' . $_FILES["Filedata"]["name"];
        $targetFile = rtrim($targetPath,'/') . '/'.$fileName ;

        // Validate the file type
        $fileTypes = array('jpg','jpeg','gif','png','swf'); // File extensions
        $fileParts = pathinfo($_FILES['Filedata']['name']);

        if (in_array($fileParts['extension'],$fileTypes)) {
            move_uploaded_file($tempFile,$targetFile);
            echo  $this->Uploadify_model->add($fileName,$targetFolder.'/'.$fileName);
        } else {
            echo json_encode(Array(
                "type"=>"0",
                "errMessage"=>"只能上传jpg,jpeg,gif,png,swf文件"
            ));
        }

    }
    public function  getAttachment(){
        $newsid = $this->input->post ( 'newsid' );
        echo $this->Uploadify_model->getAttachment($newsid);
    }
}
