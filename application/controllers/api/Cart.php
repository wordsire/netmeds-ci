<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Cart extends Rest_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Cart_m");
	}

	public function index_get()
	{
        $user_id = $this->_apiuser->user_id;
        $data = $this->Cart_m->cart_items($user_id);
		$this->response($data, 200);
	}

	public function index_post($item_id)
	{
		$check = $this->Cart_m->add_item_cart(array(
			'user_id' => $this->_apiuser->user_id,
			'item_id' => $item_id
		));
		if($check){
			$this->response(array('message'=>'Success'), 200);
		}
		else{
			$this->response(array('message'=>'Failed'), 400);
		}
	}

	public function remove_post($item_id)
	{
		$check = $this->Cart_m->remove_item_cart(array(
			'user_id' => $this->_apiuser->user_id,
			'item_id' => $item_id
		));
		if($check){
			$this->response(array('message'=>'Success'), 200);
		}
		else{
			$this->response(array('message'=>'Failed'), 400);
		}
	}
}
