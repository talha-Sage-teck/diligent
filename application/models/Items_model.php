<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items_model extends My_Model
{

    public $table = 'Items';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
}
/* End of file Services_model.php */
/* Location: ./application/models/Services_model.php */