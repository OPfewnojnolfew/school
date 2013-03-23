<?php
class menus extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'manage/Menus_model' );
		$this->load->helper ( 'url' );
	}
	public function index() {
		$this->load->view ( "manage/menus/index" );
	}
	public function initData() {
		echo $this->Menus_model->queryData ();
	}
	public function addOrEdit() {
		$id = $this->input->post ( 'id' );
		$name = $this->input->post ( 'name' );
		$type = $this->input->post ( 'type' );
		$isAdd = $this->input->post ( 'isAdd' );
		if($isAdd=="1"){
			$this->Menus_model->add($id,$name,$type);
		}
		else
		{
			$this->Menus_model->edit ($id,$name,$type);
		}
	}
	public function del(){
		$id = $this->input->post ( 'id' );
		echo $this->Menus_model->deleteMenu ($id);
	}
}