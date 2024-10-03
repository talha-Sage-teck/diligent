<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_login_log_model extends My_Model
{

    public $table = 'users_login_log';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function previous_login($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->limit(2);
		$this->db->order_by('id', 'DESC');
		$rs = $this->db->get($this->table);
		$rows = $rs->result();
		foreach($rows as $rec){
			$plogin = $rec->date;
			continue;
			}

		return $plogin;	
		}
}
/* End of file Users_tree_model.php */
/* Location: ./application/models/Users_tree_model.php */