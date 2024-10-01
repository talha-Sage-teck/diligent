<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_model extends My_Model
{

    public $table = 'invoices';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	
}
/* End of file News_model.php */
/* Location: ./application/models/News_model.php */