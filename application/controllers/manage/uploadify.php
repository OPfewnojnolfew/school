<?php
class Uploadify extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'manage/Uploadify_model' );
    }
    public function  ueditorUpload(){
        header("Content-Type: text/html; charset=utf-8");
        error_reporting(E_ERROR | E_WARNING);
        include "Uploader.class.php";
        //上传图片框中的描述表单名称，
        $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
        $path = htmlspecialchars($_POST['dir'], ENT_QUOTES);

        //上传配置
        $config = array(
            "savePath" => ($path == "1" ? "upload1/" : "upload/"),
            "maxSize" => 1000, //单位KB
            "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp")
        );

        //生成上传实例对象并完成上传
        $up = new Uploader("upfile", $config);

        /**
         * 得到上传文件所对应的各个参数,数组结构
         * array(
         *     "originalName" => "",   //原始文件名
         *     "name" => "",           //新文件名
         *     "url" => "",            //返回的地址
         *     "size" => "",           //文件大小
         *     "type" => "" ,          //文件类型
         *     "state" => ""           //上传状态，上传成功时必须返回"SUCCESS"
         * )
         */
        $info = $up->getFileInfo();

        /**
         * 向浏览器返回数据json数据
         * {
         *   'url'      :'a.jpg',   //保存后的文件路径
         *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
         *   'original' :'b.jpg',   //原始文件名
         *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
         * }
         */
        echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";
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
        $originfileName=$_FILES["Filedata"]["name"];
        $fileName=$time . '_' . $originfileName;
        $targetFile = rtrim($targetPath,'/') . '/'.$fileName ;

        // Validate the file type
        $fileTypes = array('jpg','jpeg','gif','png','swf'); // File extensions
        $fileParts = pathinfo($originfileName);

        if (in_array($fileParts['extension'],$fileTypes)) {
            move_uploaded_file($tempFile,$targetFile);
            echo  $this->Uploadify_model->add($originfileName,$targetFolder.'/'.$fileName);
        } else {
            echo json_encode(Array(
                "type"=>"0",
                "errMessage"=>"只能上传jpg,jpeg,gif,png,swf文件"
            ));
        }

    }
    public function multiUpload(){
        $targetFolder ='upload';
        $time=time();
        $tempFile = $_FILES['Filedata']['tmp_name'];
        $targetPath =  dirname(BASEPATH) .'/'. $targetFolder;
        if(!is_dir($targetPath))
        {
            mkdir($targetPath);
        }
        $originfileName=$_FILES["Filedata"]["name"];
        $fileName=$time . '_' . $originfileName;
        $targetFile = rtrim($targetPath,'/') . '/'.$fileName ;

        // Validate the file type
        //$fileTypes = array('jpg','jpeg','gif','png','swf'); // File extensions
       // $fileParts = pathinfo($originfileName);

       // if (in_array($fileParts['extension'],$fileTypes)) {
            move_uploaded_file($tempFile,$targetFile);
            echo  $this->Uploadify_model->add($originfileName,$targetFolder.'/'.$fileName);
        //} else {
            //echo json_encode(Array(
               // "type"=>"0",
              //  "errMessage"=>"只能上传jpg,jpeg,gif,png,swf文件"
            //));
        //}

    }
    public function  getAttachment(){
        $newsid = $this->input->post ( 'newsid' );
        echo $this->Uploadify_model->getAttachment($newsid);
    }
public function getMultiAttachment(){
    $newsid = $this->input->post ( 'newsid' );
    echo $this->Uploadify_model->getMultiAttachment($newsid);
}
    public function  delete(){
        $attachmentID= $this->input->post ( 'attachmentID' );
        echo $this->Uploadify_model->delete($attachmentID);
    }
}
