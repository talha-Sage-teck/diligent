<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Options_model extends My_Model
{

    public $table = 'options';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function get_options($default_options){
		$this->db->select('key_title, key_value');
		$rs = $this->db->get($this->table);
		$res = $rs->result_array();
		$new_options = array();
		$match1 = $match2 = array();
		
		$tmp_db_res = $res;
		
		foreach($default_options as $k => $v){
			$s_res = $this->_arraySearch($v['key_title'], $res);
			if($s_res !== FALSE){  // matched
				$match1[] = $res[$s_res];
				}
			else{
				$match2[] = $v;
				}	
			}
		$tmp_merged = 	array_merge($match1, $match2, $res);
	$merged = array_unique($tmp_merged, SORT_REGULAR);		
			
		return $merged;			
		
		}
		
	function _arraySearch($value, $array){
		$i = -1;
		foreach($array as $k => $v){
			$i++;
			$index = array_search($value, $v);
			if($index !== FALSE){
				return $i;
				}
			//else{
//				continue;
//				}
					
			}
		return false;
		}	
			
}
/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */