<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_additional_model extends My_Model
{

    public $table = 'users_additional';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
}
/* End of file Users_additional_model.php */
/* Location: ./application/models/Users_additional_model.php */