<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_packages_model extends My_Model
{

    public $table = 'users_packages';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function get_current_plan($user_id){
		$this->db->select('investment_packages.id AS package_id,
						  investment_packages.title,
						  investment_packages.description,
						  investment_packages.daily_percentage_earnings,
						  investment_packages.maturity_duration,
						  investment_packages.referral_comission_type,
						  investment_packages.referral_comission,
						  investment_packages.contract_duration,
						  investment_packages.created_date,
						  investment_packages.withdraw_deduction,
						  investment_packages.min_deposit,
						  users_packages.date,
						  users_packages.id AS userpackage_id,
						  users_packages.user_id,
						  users_packages.expiry_date');
		$this->db->join('investment_packages','users_packages.package_id = investment_packages.id','inner');
		$this->db->where('users_packages.user_id', $user_id);
		$this->db->where('users_packages.expired', 0);	
		$rs = $this->db->get($this->table);
		//echo $this->db->last_query();
		$res = $rs->result();
		return 	$res;	  
		}
		
//// count all package bought in history		
	function count_user_packages($user_id){
		$this->db->select('Count(users_packages.id) AS bought_packages');
		$this->db->where('user_id', $user_id);
		$rs = $this->db->get($this->table);
		$result = $rs->row();
		return $result->bought_packages;
		}	

// sum active investments		
	function sum_active_investments(){
		$this->db->select('Sum(investment_packages.min_deposit) AS total');
		$this->db->join('investment_packages', 'users_packages.package_id = investment_packages.id', 'inner');
		$this->db->where('users_packages.expired', 0);
		$rs = $this->db->get($this->table);
		$res = $rs->row();
		return $res->total;
		}	
	
	
}
/* End of file Users_additional_model.php */
/* Location: ./application/models/Users_additional_model.php */