// <?php
class Cas extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'manage/Cas_model' );
		$this->load->library ( 'Layout_manage' );
		$this->load->helper ( 'url' );
	}
	public function index() {
		$this->layout_manage->view ( "manage/cas/index" );
	}
// 	public function edit() {
// 		$id = $this->input->get ( 'id' );
// 		$data ["news"] = $this->News_model->getNews ( $id );
// 		$this->layout_manage->view ( "manage/news/edit", $data );
// 	}
// 	public function add() {
// 		$this->layout_manage->view ( "manage/news/add" );
// 	}
	public function initData() {
		$title = $this->input->post ( 'title' );
		$begin = $this->input->post ( 'begin' );
		$end = $this->input->post ( 'end' );
		$page = $this->input->post ( 'page' );
		$rows = $this->input->post ( 'rows' );
		$order = $this->input->post ( 'order' );
		$sort = $this->input->post ( 'sort' );
		
		echo $this->Cas_model->queryData ( $title, $begin, $end, ($page - 1) * $rows, $rows, $sort, $order );
	}
	public function deleteCas() {
		try {
			$ids = $this->input->post ( 'ids' );
			$this->Cas_model->deleteCas ( $ids );
			echo '1';
		} catch ( Exception $ex ) {
			echo '0';
		}
	}
	public function addOrEdit() {
		$id = $this->input->post ( 'id' );
		$title = $this->input->post ( 'title' );
		$content = $this->input->post ( 'content' );
		$copyWriter = $this->input->post ( 'copyWriter' );
		if ($id == false) {
			$this->Cas_model->add ( $title, $content, $copyWriter );
		} else {
			$this->Cas_model->edit ( $id, $title, $content, $copyWriter );
		}
		echo '1';
	}
}