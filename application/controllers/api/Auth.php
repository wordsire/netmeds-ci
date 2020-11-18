<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller; // REST file to handle REST APIs

class Auth extends Rest_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_m"); // load User Model
		$this->load->helper('JWT'); // JWT helper to encode/decode JWT tokens
	}

	public function login_post()
	{
		if($this->request->body['email'] && $this->request->body['password']){
			$user = $this->User_m->get_user(array('email'=>$this->request->body['email']));
			if(isset($user->user_id)){
				if(password_verify($this->request->body['password'], $user->password)){
					/**
					 * if password is correct, sign the user details to generate JWT token.
					 * this token will be used for subsequent requests.
					 *  */ 
					$token = JWT::encode(array(
						'user_id' => $user->user_id,
						'first_name' => $user->first_name,
						'email' => $user->email
					), JWT_SECRET);
					unset($user->password); // removing password from the final API response
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
