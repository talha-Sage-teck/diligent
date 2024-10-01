<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification_model extends My_Model
{

    public $table = 'notification';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function userNewNotify($user_id, $new = true){
		$this->db->select('notification.id,
						  notification.type AS typeid,
						  notification.description,
						  notification.subject,
						  notification.user_id,
						  notification.read_status,
						  notification.date,
						  t.id AS tid,
						  t.type AS type');
		$this->db->from('notification');
		$this->db->join('notification_type AS t', 'notification.type = t.id', 'inner');
		$this->db->where('notification.user_id', $user_id);
		if($new == true)
		$this->db->where('notification.read_status', 0);
		$this->db->order_by($this->primary, $this->order);
		$rs = $this->db->get();
		return $rs->result();
		
		}
}
/* End of file Notification_model.php */
/* Location: ./application/models/Notification_model.php */