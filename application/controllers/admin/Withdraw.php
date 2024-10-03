<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Withdraw extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data['page_title'] = 'Withdraw';
		$this->data['action'] = 'list';
		$this->data['pslug'] = 'Withdraw';
        $this->load->model('withdraw_log_model');
		$this->load->model('wallet_log_model');
		$this->load->model('users_model');
		$this->load->model('earnings_log_model');
    }

    public function index()
    {
		$status = ($this->input->get('status')) ? $this->input->get('status') : 1;
		 $wd = $this->withdraw_log_model->get_all_withdrawals($status);
		 
        $data = array(
            'withdraw_data' => $wd,
			'status' => $status,
        );

        $this->renderView('withdraw_log/list', $data);
    }

    public function approve_withdraw($request_id = 0){
	/** add entry in withdraw_log
	  ** if user has referrer then deduct % to referrer
	  ** add bonus amount for referrer (for first time)
	  ** add entry in wallet_log as withdraw
	  ** (-)minus wallet amount
	 **/
		if($request_id > 0){
			$withdraw_info = $this->withdraw_log_model->get_by_id($request_id);
			$withdraw_user_id = $withdraw_info->user_id;
			$withdraw_user_info = $this->users_model->get_by_id($withdraw_user_id);
			$referrer_id = $withdraw_user_info->referrer_id;
			$withdraw_fee = 0;
			
			 //// (each time) transfer amount to referrer 
			  if($referrer_id){/// if user has referrer
				  $comission_cent = get_option('withdraw_referral_fee');
				  $withdraw_fee = $comission_cent/100 * $withdraw_info->amount;
				  
				  //// send amount to referrer
				  $b = $this->wallet_log_model->insert(	
							array('amount' => $withdraw_fee,
								'transfer_to' => $referrer_id,
								'transfer_from' => $withdraw_info->user_id,
								'transfer_type' => 'bonus',
								'withdraw_id' => $withdraw_info->id,
								'date' => date(DATE_MYSQL),
								));
								
			  }
			  // deducted already - no need to deduct again
			  /*if($withdraw_info->type == 'earning'){
				  $e_log = array('amount' => -$withdraw_info->amount,
				  				'date' => date(DATE_MYSQL),
								'user_id' => $withdraw_info->user_id,
								'earn_type' => 'normal',
								'from_user_id' => $this->admin_id,
								);
				  $c = $this->earnings_log_model->insert($e_log); 
				}*/
				
				//// add wallet log to withdrawal user
				
				/*  i think no need to update in wallet_log or Wallet tables
					becuse - Admin will send the amount in user BTC A/C
					we already (-)minus the amount from earnings and bonus respectively
				*/
				/*$final_amount = $withdraw_info->amount - $withdraw_fee;
				  $b = $this->wallet_log_model->insert(	
							array('amount' => $final_amount,
								'transfer_to' => $withdraw_info->user_id,
								'transfer_from' => $this->user_id,
								'transfer_type' => 'withdraw',
								'withdraw_id' => $withdraw_info->id,
								'date' => date(DATE_MYSQL),
								));
								
				$w_coins = $this->wallet_model->get_all(array('user_id' => $withdraw_info->user_id), FALSE); // previous wallet amount			
				$new_wallet_amt = $w_coins + $final_amount;
				
				$this->wallet_model->update($withdraw_info->user_id, array('amount' => $new_wallet_amt), 'user_id');*/
				  
			  $this->withdraw_log_model->update($withdraw_info->id, array('request_status' => 2));
					
					
				redirect(admin_url('dashboard'));				
//			  $remaining_amount = $amount - $withdraw_fee;
				  
			}
	}

	function reject($id = 0){
		
		if($id)
		$this->withdraw_log_model->update($id, array('rejected' => 1, 'rejected_reason' => 'Rejected by admin'));
		
		redirect(admin_url('withdraw'));
		}
}

/* End of file Faq_category.php */
/* Location: ./application/controllers/Faq_category.php */