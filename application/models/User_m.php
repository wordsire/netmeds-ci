<?php 
if(!defined('BASEPATH')){exit('No direct script access allowed');}

class User_m extends CI_Model {

    protected $_table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function get_user($where = null){
        return $this->db->get_where($this->_table, $where)->row();
    }

    public function insert_data(){
        
    }
}