<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends My_Model
{

    public $table = 'users';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function userProfile($user_id){
		
		}
		
	function get_list($limit = 9999){
		$this->db->select('*, users.id AS id');
		$this->db->limit($limit);
		$rs = $this->db->get($this->table);
		return $rs->result();
		}	
	
//// verify mebmr with email or wallet code	
//// @param $meminfo string -- email or wallet code
//// @return array
	function verify_member($meminfo){
		$result = array();
		
		$this->db->select('*');
		$this->db->where('email', $meminfo);
		$this->db->or_where('wallet_code', $meminfo);
		$rs = $this->db->get($this->table);
		$res = $rs->row();
		if(!empty($res)){
			$res1 = array();
			$this->db->select('user_id, doc1, doc2, avatar');
			$this->db->from('users_additional');
			$this->db->where('user_id', $res->id);
			$rs1 = $this->db->get();
			//echo $this->db->last_query();
			$res1 = $rs1->row();
			if(!empty($res1)){
				$res = (array)$res;
				$res1 = (array)$res1;
				$result = array_merge($res, $res1);
				}
			else{
				$result = $res;
				}
			
			}
			
		return (object)$result;
		
		}

/**
* @param ids array 
* 
*/		
	function usersByIds($ids = array()){
		if(!empty($ids))
		$this->db->where_in('id',$ids);
		else
		$this->db->where_in('id','NULL');
		$rs = $this->db->get($this->table);
		return $rs->result();
		}


/// list of users who submitted request for approval -- added any document (avatar, cnic, etc.)		
	function listRequestDocApproval($limit = 999){
		$this->db->select('users.first_name,
						  users.last_name,
						  users.id,
						  users.email,
						  users_additional.doc1,
						  users_additional.doc2,
						  users_additional.avatar,
						  users.approve_status,
						  users.created_on,
						  users.last_login');
		$this->db->join('users_additional', 'users.id = users_additional.user_id', 'inner');				  
		$this->db->where('users.approve_status', 0);
		$this->db->where('users.id <> ', 1, FALSE);
		$this->db->group_start();
		$this->db->where('doc1 is NOT NULL', NULL, FALSE)
                  ->or_where('doc2 is NOT NULL', NULL, FALSE);
		$this->db->group_end();
		$this->db->limit($limit);
		$rs = $this->db->get('users');
		//echo $this->db->last_query();
		return $rs->result();
		}
		
	function total_with_investments(){
		$this->db->select('Count(deposit_log.id) AS total');
		$this->db->group_by('user_id');
		$rs = $this->db->get('deposit_log');
		$res = $rs->row();
		return $res->total;
		}	
		
	function total_without_investments(){
		$this->db->select('Count(users.id) AS total ');
		$this->db->where_not_in('id', 'SELECT user_id FROM deposit_log', false);
		$this->db->where('users.id <>', 1);
		$rs = $this->db->get($this->table);
		//echo $this->db->last_query();
		$res = $rs->row();
		return $res->total;
		}			
}
/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */