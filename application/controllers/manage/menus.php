<?php
class menus extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'manage/Menus_model' );
		$this->load->library ( 'Layout_manage' );
		$this->load->helper ( 'url' );
	}
	public function index() {
		$this->layout_manage->view ( "manage/menus/index" );
	}
	public function initData() {
		echo $this->Menus_model->queryData ();
	}
}