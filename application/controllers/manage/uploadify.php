<?php
class Uploadify extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
    }
    public function upload(){
        $targetFolder = '/uploads';

        //$verifyToken = md5('unique_salt' . $_POST['timestamp']);


        $tempFile = $_FILES['Filedata']['tmp_name'];
        //print_r($tempFile);return;
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
        if(!is_dir($targetPath))
        {
            mkdir($targetPath);
         }
        $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

        // Validate the file type
        $fileTypes = array('jpg','jpeg','gif','png','swf'); // File extensions
        $fileParts = pathinfo($_FILES['Filedata']['name']);

        if (in_array($fileParts['extension'],$fileTypes)) {
            move_uploaded_file($tempFile,$targetFile);
            echo json_encode(Array("attachmentName"=>$_FILES['Filedata']['name'],"attachmentPath"=>$targetFile));
        } else {
            echo 'Invalid file type.';
        }

    }
}
