<?php 


function admin_url($url='',$show=false){
	// Get the admin folder from your config
    $CI =& get_instance();
    $admin_folder = $CI->config->item('base_url_admin');
	
		if ($show) {
			echo site_url($admin_folder."/".$url);
		}else{
			return site_url($admin_folder."/".$url);
		}
	}
/**
 * This function used to check the user is logged in or not
 */
	function is_login($group = array(2,3)){
	  $CI =& get_instance();

	  $CI->load->library('ion_auth');
	  //var_dump($CI->ion_auth->is_admin());
	  if($CI->ion_auth->logged_in() && $CI->ion_auth->in_group($group) && !$CI->ion_auth->is_admin())
		  return TRUE;
	  else 
		  return FALSE;	
	}	


function assets($url='',$show=true){
	$CI =& get_instance();
	$base_folder = "assets";
	
	if ($show) {
			echo base_url($base_folder."/".$url);
		}else{
			return base_url($base_folder."/".$url);
		}
}
/******
Give option values of select drop down
if $multi is TRUE then it will select multiple options
if $multi is TRUE and $row given is comman separated, string it will explode with comma and select multiple options

@param string $action		add or update
@param object $row			object of current db record
@param string $field		db/array field to check for selection
@param array  $options		complete select drop down records
@param bool   $emptyrow		Default value FALSE, TRUE if want to add empty option field
@param bool	  $multi		select multiple options
@return string				Set of options 
 
******/	
	function options($options,$row,$field,$action='', $emptyrow = false, $emptyrowText = 'Select', $multi = FALSE){
			if($emptyrow == true)
			echo '<option value="">'.$emptyrowText.'</option>';
			//var_dump($row->$field);
		foreach ($options as $key => $option) {
			
		    echo "<option";
		    echo " value='".$key."' ";
		    if(strtolower($action)=='update') {
				if($multi == TRUE){
					if(is_array($row->$field)){
					if(array_search($key, $row->$field) !== FALSE){
						echo 'selected';
						}
					}
					else{
						///// explode comma separated 
						$str = explode(',',$row->$field);
						if(!empty($str))
						foreach($str as $f){
							if($f == $key){
								echo "selected";
								}
							}
						}
					}
				
				else{	
		        if ($row->$field==$key) {
		            echo "selected";
		        }
				}
		    }
		    echo " >";
		    echo $option;
		    echo "</option>";
		}

	}
/******
To make the menu active
@param string $menu			set of menu strings separated with | delimeter
@return string				Return 'active' if url segment maches 
******/		
	function menu_active($menu, $show = true){
		$CI =& get_instance();	
		$segments = explode('|',$menu);
		for($i=1;$i<=3;$i++){ // normally 2 segments are used in admin panel or can use $this->uri->total_segments();
			if (array_search($CI->uri->segment($i),$segments) !== FALSE) {
				if($show)
					echo "active";
				else
					return true;
				break;
			}
		}
	}	
	
//// current user additional information	
	function user_additional_data(){
		$CI =& get_instance();
		$user_id = $CI->user_id;
		
		$CI->load->model('users_additional_model');
		$udata = $CI->users_additional_model->get_by_id($user_id, true, 'user_id');
		
		return $udata;
		}
		
	function profile_mendatory_fields(){
		$required_fields = array();
		$CI =& get_instance();
		// required fields list
		// - Address
		// - City
		// - phone
		// - gift choices
		
		$field_txt = array(
				'address_txt' => 'Without address you can not receive your gifts. <a href="'.site_url('users/userprofile#account-general').'">Go to page</a>',
				'city_txt' => 'Complete your address and give city as separate field. <a href="'.site_url('users/userprofile#account-general').'">Go to page</a>',
				'phone_txt' => 'Normally our communication will be on Email but sometimes we may contact you over the phone. <a href="'.site_url('users/userprofile#account-general').'">Go to page</a>',
				'giftch_txt' => 'By telling your gift choices we will honour your choice and try to send you the gift which you like. <a href="'.site_url('users/userprofile#gift-suggestions').'">Go to page</a>',
							);
		
		$CI->load->model('users_additional_model');
		$CI->load->model('users_model');
		
		$user_id = $CI->user_id;
		$udata = $CI->users_additional_model->get_by_id($user_id, true, 'user_id');
		$userinfo = $CI->users_model->get_by_id($user_id, true);
		
		if(empty($udata)){
			$required_fields = array('Address' =>  $field_txt['address_txt'],
									'City' =>  $field_txt['city_txt'],
									'Phone' =>   $field_txt['phone_txt'],
									'Gift Choices' =>   $field_txt['giftch_txt'],);
			}
		else{
			
			if($udata->m_address == ''){
				$required_fields['Address'] = $field_txt['address_txt'];
				}
			if($udata->city == ''){
				$required_fields['City'] = $field_txt['city_txt'];
				}	
			if($userinfo->phone == '') {
				$required_fields['Phone'] = $field_txt['phone_txt'];
				
				}	
			if($udata->gifts_choice == ''){
				$required_fields['Gift Choices'] = $field_txt['giftch_txt'];
				}	
			}
		
		return $required_fields;		
		}	
	
	// simple select from database and make clean array to pass into options helper function

	function db_options_arr($records,$field='id',$show_field='name'){
		$output=array();
		if(!empty($records)){
		foreach ($records as $key => $record) {
			$output[$record->$field]=$record->$show_field;
		}
		}
		return $output;
	}
	
/****
Get option from site options in DB 
@param string $opt_key option key
@return string option value
****/
	function get_option($opt_key){
		$CI =& get_instance();
		$rs = $CI->db->where('key_title', $opt_key)->get('options');

		if($rs->num_rows() > 0){
			$res = $rs->row();
			return $res->key_value;
			}
		else{
			return FALSE;
			}	
		}
/*
@param string image_path -- full path by using base_url()
*/		
		
	function thumb_name($image_name, $image_path, $size){
		$ext = pathinfo($image_name, PATHINFO_EXTENSION);
		$file = basename($image_name, $ext);
		$raw_name = substr($file, 0 , -1);
		
		return $fullname = $image_path.$raw_name.$size.'.'.$ext;
		}	

/******
Add scripts to footer 
******/
	function add_js($files){
		$str = '';
		if(is_array($files)){
            if(!is_array($files) && count($files) <= 0){
                return;
            }
            foreach($files as $item){   
                $str .= '<script type="text/javascript" src="'.base_url().'assets/public/js/'.$item.'.js"></script>'."\n";
				}
        }else{
            $str = $files;
        }
		echo $str;
		}	
	
/******
Add css styles to header 
******/		
	function add_css($files){
		$str = '';
		if(is_array($files)){
            if(!is_array($files) && count($files) <= 0){
                return;
            }
            foreach($files as $item){   
                $str .= '<link rel="stylesheet" href="'.base_url('assets/public/assets/css/'.$item.'.css').'">'."\n";
				}
        }else{
            $str = $files;
        }
		echo $str;
		
		
		}
	
		
	function days_remaining($mysqldate){		
		$now = time(); // or your date as well
		$your_date = strtotime($mysqldate);
		$datediff =  $your_date - $now;
		
		return round($datediff / (60 * 60 * 24));
		}	
		
	function generate_ref_code(){
		$CI =& get_instance();
		$CI->load->helper('string');
		$num = random_string('numeric', 8);
		$alpa = random_string('alpha', 4);
		$code = $num.strtoupper( $alpa );
		return md5($code);
		}
	
	function generate_order_code(){
		$num = random_string('numeric', 8);
		$alpa = random_string('alpha', 4);
		$code = $num.strtoupper( $alpa );
		return $code;
		}					
		
	function show_amount($coins, $show_decimal = TRUE, $decimal_place = 2, $print = TRUE){
		if($show_decimal == FALSE){
			if($print)
			  echo '$ '.$coins;
			else
			  return '$ '.$coins;
			}
		else{
			if($print)	
			  echo '$ '.number_format($coins, $decimal_place, '.', '');
			 else
			  return '$ '.number_format($coins, $decimal_place, '.', '');
		}
		}
		
// show amount with curreny symbol
/* @param $amount int/float
** @param $symbol string 
*/
	function show_price($amount, $print=true, $symbol = 'AED', $position='left', $space = true){
		$addspace = ($space == true)? ' ' : '';
		
		if($position == 'left'){
			if($print == true)
				echo $symbol.$addspace.number_format($amount);
			else
				return $symbol.$addspace.number_format($amount);
		}
		  
		elseif($position == 'right'){
			if($print == true)
				echo $amount.$addspace.$symbol;
			else
				return $amount.$addspace.$symbol;
		}
		  
		}	
				
	function transfer_amount($amount){
		/*$fee = (1/100) * $amount;
		$a = $amount - $fee;
		return $a;*/
		return $amount;
		}
		
	function userNewNotif(){
		$CI =& get_instance();
		$CI->load->model('notification_model');
		
		$n = $CI->notification_model->userNewNotify($CI->user_id);
		return $n;
		}				

	function inspections_pending(){
		$CI =& get_instance();
		$CI->load->model('inspection_model');
		$rs = $CI->inspection_model->total_records(["quotation_generated"=>0]);
		return $rs;
	}

	/*** Convert numbers to words ***/	
function convert_number($number) {
    if (($number < 0) || ($number > 999999999)) {
        return '';
    }

    $Gn = floor($number / 1000000);
    /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000);
    /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);
    /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);
    /* Tens (deca) */
    $n = $number % 10;
    /* Ones */

    $res = "";

    if ($Gn) {
        $res .= convert_number($Gn) .  "Million";
    }

    if ($kn) {
        $res .= (empty($res) ? "" : " ") .convert_number($kn) . " Thousand";
    }

    if ($Hn) {
        $res .= (empty($res) ? "" : " ") .convert_number($Hn) . " Hundred";
    }

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");

    if ($Dn || $n) {
        if (!empty($res)) {
            $res .= " and ";
        }

        if ($Dn < 2) {
            $res .= $ones[$Dn * 10 + $n];
        } else {
            $res .= $tens[$Dn];

            if ($n) {
                $res .= "-" . $ones[$n];
            }
        }
    }

    if (empty($res)) {
        $res = "zero";
    }

    return $res;
    }	
?>