<?php
class News extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'manage/News_model' );
		$this->load->library ( 'Layout_manage' );
		$this->load->helper ( 'url' );
	}
	public function index()
    {
        $this->load->view('manage/news/index');
	}
    public function newList()
    {
        $params=$this->uri->uri_to_assoc(4);
        $data["menuid"]=$params["menuid"];
        switch($params["type"]){
            case 2:
                $this->load->view('manage/news/normalList',$data);
                break;
            case 4:
                $this->load->view('manage/news/linkList',$data);
                break;
        }

    }
	public function edit() {
		$id = $this->input->get ( 'id' );
		$data ["news"] = $this->News_model->getNews ( $id );
		$this->layout_manage->view ( "manage/news/edit", $data );
	}
	public function add() {
		$this->layout_manage->view ( "manage/news/add" );
	}
	public function initData() {
//		$title = $this->;
//		$begin = $this->input->post ( 'begin' );
//		$end = $this->input->post ( 'end' );
//		$page = $this->input->post ( 'page' );
//		$rows = $this->input->post ( 'rows' );
//		$order = $this->input->post ( 'order' );
//		$sort = $this->input->post ( 'sort' );
		$array = array(
            'menuid'        =>$this->input->post('menuid'),
            'title'        => $this->input->post ( 'title' ),
            'begin'          => $this->input->post ( 'begin' ),
            'end'          => $this->input->post ( 'end' ),
            'page'   =>$this->input->post ( 'page' ),
            'rows'     =>$this->input->post ( 'rows' ),
            'order'        => $this->input->post ( 'order' ),
            'sort'          =>$this->input->post ( 'sort' ),
        );
		echo $this->News_model->queryData ($array);
	}
	public function deleteNews() {
		try {
			$ids = $this->input->post ( 'ids' );
			$this->News_model->deleteNews ( $ids );
            echo json_encode(array(
                'errorMessage' => "",
                'type'  => "1"
            ));
		} catch ( Exception $ex ) {
            echo json_encode(array(
                'errorMessage' => $ex,
                'type'  => "0"
            ));
		}
	}
	public function addOrEditNormalList() {
        try{
		$id = $this->input->post ( 'id' );
		$title = $this->input->post ( 'title' );
		$content = $this->input->post ( 'content' );
        $menuid =$this->input->post ( 'menuid' );
        $createid=$this->session->userdata('account_id');
		if ($id == false) {
			$this->News_model->addNormalList ( $title, $content,$menuid, $createid);
		} else {
			$this->News_model->editNormalList ( $id, $title, $content);
		}
            echo json_encode(array(
                'errorMessage' => "",
                'type'  => "1"
            ));
        }catch (Exception $e){
        echo json_encode(array(
            'errorMessage' => $e,
            'type'  => "0"
        ));}
	}
    public function addOrEditLinkList() {
        try{
            $id = $this->input->post ( 'id' );
            $title = $this->input->post ( 'title' );
            $linkUrl = $this->input->post ( 'linkurl' );
            $menuid =$this->input->post ( 'menuid' );
            $createid=$this->session->userdata('account_id');
            if ($id == false) {
                $this->News_model->addLinkList ( $title, $linkUrl,$menuid, $createid);
            } else {
                $this->News_model->editLinkList ( $id, $title, $linkUrl);
            }
            echo json_encode(array(
                'errorMessage' => "",
                'type'  => "1"
            ));
        }catch (Exception $e){
            echo json_encode(array(
                'errorMessage' => $e,
                'type'  => "0"
            ));}
    }
}