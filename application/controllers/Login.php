<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Login extends Front_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model( 'users_model' );
		//	$this->load->model('users_login_log_model');
	}

	public
	function index() {
		$active_page = $this->input->get( 'active_page' );
		$data = array( 'page_heading' => "My Account",
			'page_slug' => "Sign In",
			'active_page' => $active_page );


		$this->renderView( 'login/login', $data, FALSE );
	}

	function ajax_login() {
		if ( $this->input->post() ) {
			$this->form_validation->set_rules( 'password', 'Password', 'required' );
			$this->form_validation->set_error_delimiters( ' <div>', '</div> ' );
			$identity = $this->input->post( 'username' );
			$password = $this->input->post( 'password' );
			
			if ( $this->form_validation->run() ) {
				
				$rem = $this->input->post( 'remember' );
				$remember = ( $rem == 1 ) ? TRUE : FALSE; // remember the user

				$l = $this->ion_auth->login( $identity, $password, $remember );
				//				var_dump($l);
				//				echo $this->db->last_query();

				if ( $this->ion_auth->login( $identity, $password, $remember ) ) {

					$user_id = $this->ion_auth->get_user_id();
					$userdata = $this->users_model->get_by_id( $user_id );
					/*$this->users_login_log_model->insert(
				  						array('ip_address' => $this->input->ip_address(),
												'user_id' => $user_id,
												'date' => date(DATE_MYSQL),
												)				  						
										);*/
					$login_result = [ 'status' => true ];
//					$cvalue = get_cookie( 'ci_session' );
//					set_cookie( 'laravel_session', $cvalue, 0, '', '/', '', NULL, FALSE );
				} else {
					$login_result = [ 'status' => false,
						'message' => $this->ion_auth->errors_array()
					];

				}
			} elseif($identity == '' && $password == ''){
				$login_result = [
					"status" => false,
					"message" => [
						"username" => "The username field is required.",
						"password" => "The password field is required."
					]
				];
			}elseif($password == ''){
				$login_result = [
					"status" => false,
					"message" => [
						"password" => "The password field is required."
					]
				];
			}
			elseif($identity == '' ){
				$login_result = [
					"status" => false,
					"message" => [
						"username" => "The username field is required.",
						
					]
				];
			}
				
		}

		echo json_encode( $login_result );
	}

	public
	function register() {
		if ( $this->session->has_userdata( 'registered' ) ) {
			$this->session->unset_userdata( 'registered' );
			redirect( 'login/emailverification' );
		}

		$data = array( 'page_heading' => "My Account",
			'page_slug' => "Sign In",
			'active_page' => 'signup' );

		$refcode = $this->input->get( 'refcode' );
		$data[ 'refcode' ] = $refcode;
		if ( $refcode != '' ) {
			$referral_id = $this->users_model->get_all( array( 'refcode' => $refcode ), FALSE );
			$data[ 'referral_id' ] = $referral_id->id;
		}

		if ( $this->input->post( 'btn_register' ) ) {

			$this->form_validation->set_rules( 'first_name', 'First Name', 'trim|required|callback_alpha_dash_space' );
			$this->form_validation->set_rules( 'last_name', 'Last Name', 'trim|required|callback_alpha_dash_space' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required|is_unique[users.email]', array( 'is_unique' => 'Email already exists.' ) );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'cnfrmpasword', 'Confirm Password', 'required|matches[password]' );

			$this->form_validation->set_error_delimiters( ' <div>', '</div> ' );

			if ( isset( $data[ 'error' ] ) && $data[ 'error' ] != '' ) {
				$this->session->set_flashdata( 'error', $data[ 'error' ] );
				redirect( 'login/register', 'refresh' );
			}

			if ( $this->form_validation->run() ) {
				$username = $this->input->post( 'first_name' );
				$password = $this->input->post( 'password' );
				$email = $this->input->post( 'email' );
				$refid = $this->input->post( 'refid' );
				$additional_data = array(
					'first_name' => $this->input->post( 'first_name' ),
					'last_name' => $this->input->post( 'last_name' ),
					'phone' => $this->input->post( 'phone' ),
					"oauth_provider" => "web",
					'referrer_id' => $refid,
					'refcode' => generate_ref_code(),
					'approve_status' => 1,
				);
				$group = array( '2' ); // Sets user to user.

				$register_data = $this->ion_auth->register( $email, $password, $email, $additional_data, $group );
				//print_r($register_data); exit;
				if ( $register_data ) {
					$this->postRegister( $register_data[ 'id' ] );

					$this->_send_activation_email( $register_data );
					$this->session->set_userdata( 'registered', '1' );
					redirect( 'login/register' );

				}

			}

		}
		$this->renderView( 'login/login', $data );
	}

	function alpha_dash_space( $str ) {
		if ( !preg_match( "/^([-a-z_ ])+$/i", $str ) ) {
			$this->form_validation->set_message( 'alpha_dash_space', 'In {field} Only Alphabets are allowed' );
			return FALSE;
		} else
			return TRUE;
	}

	function emailverification() {
		$data = array();
		$this->renderView( 'login/emailverification', $data );
	}

	function forgot_password() {
		$data = array();

		if ( $this->input->post() ) {
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );

			$this->form_validation->set_error_delimiters( ' <div>', '</div> ' );

			if ( $this->form_validation->run() ) {
				$useremail = $this->input->post( 'email' );
				//run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password( $useremail );

				if ( $forgotten ) { //if there were no errors


					$emailnfo = array( 'subject' => 'Password reset',
						'to' => $useremail );
					$template = 'email_templates/user_password_reset';
					$sent = $this->send_email( $emailnfo, $forgotten, $template );
					//var_dump($sent); exit;
					if ( $sent )
						$this->session->set_flashdata( 'success', $this->ion_auth->messages() );
					else
						$this->session->set_flashdata( 'error', 'Email sending failed' );
					redirect( "login/forgot_password", 'refresh' ); //we should display a confirmation page here instead of the login page
				} else {
					//var_dump($forgotten); var_dump($this->ion_auth->errors()); exit;
					$this->session->set_flashdata( 'error', $this->ion_auth->errors() );
					redirect( "login/forgot_password", 'refresh' );
				}

			}
		}

		$this->renderView( 'login/forgotpass', $data );
	}

	function reset_password( $code ) {
		if ( $code == '' ) {
			echo 'Used wrong url. Reset code is missing from URL.';
			exit;
		}
		$data = array();
		$user = $this->ion_auth->forgotten_password_check( $code );
		if ( $user ) {
			$this->form_validation->set_rules( 'password', 'New Password', 'trim|required' );
			$this->form_validation->set_rules( 'confirm_pass', 'Confirm Password', 'trim|required|matches[password]' );
			$this->form_validation->set_rules( 'passwordscore', 'Password', 'greater_than_equal_to[' . PASSWORD_STRENGTH . ']', array( 'greater_than' => '{field} is not strong. Please use strong {field}.' ) );
			$this->form_validation->set_error_delimiters( '<div>', '</div>' );

			if ( $this->form_validation->run() ) {
				$pdata = array(
					'password' => $this->input->post( 'password', TRUE ),
				);

				$return = $this->ion_auth->update( $user->id, $pdata );
				if ( $return ) {
					$this->session->set_flashdata( 'success', 'Password updated Successfully' );
					redirect( site_url( 'login' ) );
				} else {
					$this->session->set_flashdata( 'error', $this->ion_auth->errors() );
					redirect( site_url( 'login' ) );
				}

			}

		} else {
			$this->session->set_flashdata( 'error', 'Reset password code is wrong.' );
			redirect( site_url( 'login' ) );
		}
		$this->data[ 'js_files' ] = array();
		$this->renderView( 'login/resetpass', $data );
	}


	function _send_activation_email( $regdata ) {
		$userdata = $this->users_model->get_by_id( $regdata[ 'id' ] );
		$emailnfo = array( 'subject' => 'User registration activation',
			'to' => $regdata[ 'email' ] );

		$template = 'email_templates/user_activation';
		$sent = $this->send_email( $emailnfo, $userdata, $template );
		if ( $sent )
			return TRUE;
	}

}