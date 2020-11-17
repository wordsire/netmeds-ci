<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Auth extends Rest_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_m");
		$this->load->helper('JWT');
	}

	public function add_get()
	{
		$this->User_m->insert_data();
		echo "Done";
	}

	public function password_post()
	{
		$pass = password_hash($this->request->body['password'], PASSWORD_BCRYPT);
		$this->response(array('data'=>$pass), 200);
	}

	public function login_post()
	{
		if($this->request->body['email'] && $this->request->body['password']){
			$user = $this->User_m->get_user(array('email'=>$this->request->body['email']));
			if(isset($user->user_id)){
				if(password_verify($this->request->body['password'], $user->password)){
					$token = JWT::encode(array(
						'user_id' => $user->user_id,
						'first_name' => $user->first_name,
						'email' => $user->email
					), JWT_SECRET);
					unset($user->password);
					$this->response(array('user'=>$user,'token'=>$token), 200);
				}
			}
			else{
				$this->response(array('message'=>'Account does not exist with this email.'), 400);
			}
		}
		
		$this->response(array('message'=>'Email or Password is incorrect.'), 400);
	}
}
