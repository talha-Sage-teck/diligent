<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class My_Model extends CI_Model {

	public $table="";
	public $primary='';
	public $total_records;

	public function insert($data = NULL) {
		if(!isset($data))
        {
            return FALSE;
        }
		$multi = $this->is_multidimensional($data);
		if($multi === FALSE){
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
			}
		else{
			$rows = $this->insert_bulk($data, $this->table);
            $first_id = $this->db->insert_id();
            $last = $first_id + $rows;
            for($i=$first_id; $i<$last; $i++)
                $ids[] = $i;
			return $ids;
			}	
		
			
	}
	
	 /*
     * public function is_multidimensional($array)
     * Verifies if an array is multidimensional or not;
     * @param array $array
     * @return bool return TRUE if the array is a multidimensional one
     */
    public function is_multidimensional($array)
    {
        if(is_array($array))
        {
            foreach($array as $element)
            {
                if(is_array($element))
                {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
	
	public function insert_bulk($data, $table = ''){
		$table = $table ? $table : $this->table;
		$this->db->insert_batch($table, $data);
		$rows = $this->db->affected_rows();
		if($rows > 0 ){
			return $rows;
			}
		else{
			return 0;
			}	
		}
	
	public function update_bulk($data, $title, $table = ''){
		$table = $table ? $table : $this->table;
		$this->db->update_batch($table, $data, $title);
		$rows = $this->db->affected_rows();
		if($rows > 0 ){
			return $rows;
			}
		else{
			return 0;
			}
		}
		
	public function update($value, $data, $field='id'){
		
		$this->db->where(array($field => $value));
		return $this->db->update($this->table,$data);
		
	}
	public function delete($id,$field='id')
	{
		$this->db->where($field, $id);
		return $this->db->delete($this->table); 
	}

	public function get_all($condition=array(),$arr=true, $limit = 1000, $offset=0, $output = 'O') {
		$table=$this->table;
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->order_by($this->primary, $this->order);
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		if ($arr) {
			
			if ($output == 'O' ) {

				return $query->result();

			}elseif($output == 'A'){
				return $query->result_array();
				}

		}else{
			$res=$query->result();
			if (!empty($res)) {
				return $res[0];
			}
		}

	}

	public function where($condition = array(),$arr=true){
		return $this->get_all($condition,$arr);
	}
	
	public function where_in($colname, $values = array(), $arr = true){
		$this->db->where_in($colname, $values);
		$rs = $this->db->get($this->table);
		if($arr){
		  	return $rs->result();
			}
		else{
			$res = $rs->result();
			return $res[0];
			}
		}

	// where with array
	public function where_arr($fields,$arr=true,$condition='AND'){
		$query='';
		$count=0;
		foreach ($fields as $key => $field) {
			if (!empty($count)) {
				$query.=$condition;
			}
			$query.=" $key='$field' ";
			$count++;
		}
		return $this->where($query,$arr);
	}
	
	// get total rows
    function total_records($condition=array()) {
		if(!empty($condition)){
			$this->db->where($condition);
			}
        return $this->db->count_all_results($this->table);
    }

	public function by_field($field='',$value='',$arr=true){
	
		return $this->where(array($field, $value), $arr);		
	
	}


	public function get_by_id($value='',$arr=true, $field = 'id'){
	
		$res = $this->where(array($field => $value),$arr);
		if(!empty($res)){
			if(gettype($res) === 'object'){
				return $res;
				}
			elseif(gettype($res) === 'array'){
				return $res[0];
				}	
			}
		else{
			return FALSE;
			}	
	
	}
	
	public function get_by_ids($ids,$field='id'){

		$sql="(";
		$count=0;
		// $sql="";
		foreach ($ids as $key => $id) {

			if (!empty($count)) {
				$sql.=" OR ";
			}	
			$sql.=" $field='$id'";

			$count++;
		}

		$sql.=" ) ";
		if (!empty($ids)) {
			return $this->where($sql);
		}else{
			return false;			
		}

	}


	public function by_user($value='',$arr=true){
	
		return $this->where("user_id='$value'",$arr);		
	
	}
	


	public function search($fields=array(),$condition="AND",$other_condition='', $limit=9999,$offset=0 ){
		
		if($condition == 'AND'){
			$this->db->like($fields);
			}
		elseif($condition == 'OR'){
			$this->db->or_like($fields);
			}	
		$rs = $this->db->get($this->table);
//        echo $this->db->last_query();exit;
		return $rs->result();

	}

	public function fetch($query,$single=true) {
		
		$table=$this->table;
		$query = $this->db->query($query);
		//echo $this->db->last_query();
		if ($single) {
			return $query->result();			
		}else{
			$res=$query->result();
			if (!empty($res)) {
				return $res[0];
			}
		}

	}


	public function _hash($field) {
		
		$password=$this->input->post($field);
		$salt="loremipsemd34992034904e0iouien3j";
		$password.=$salt;
		return hash('sha256',$password);
	
	}
	public function _hash2($password) {
		
		$salt="loremipsemd34992034904e0iouien3j";
		$password.=$salt;
		return hash('sha256',$password);
	
	}

	/*public function search(){
		$this->db->like('title', 'match');
		$rs = $this->db->get($this->table);
		return $rs->result_array();
		}*/


}
