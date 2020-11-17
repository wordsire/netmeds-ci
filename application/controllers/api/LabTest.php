<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class LabTest extends Rest_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("LabTest_m");
	}

	public function index_get()
	{
		$search = (isset($this->_get_args['q']))?$this->_get_args['q']:null;
		$offset = (isset($this->_get_args['offset']))?(int)$this->_get_args['offset']:0;
		$data = $this->LabTest_m->test_list($search, $offset, $this->_apiuser->user_id);
		$this->response($data, 200);
	}

	public function migrate_post()
	{
		$data = $this->request->body;
		$insert = array();
		foreach($data as $record){
			$insert[] = array(
				'item_name' => $record['itemName'],
				'type' => 'Test',
				'price' => $record['minPrice'],
				'fasting' => $record['fasting'],
				'lab_name' => $record['labName'],
				'created_at' => date('Y-m-d H:i:s')
			);
		}
		$verify = $this->LabTest_m->insert_data($insert);
		$this->response($verify, 200);
	}
}
