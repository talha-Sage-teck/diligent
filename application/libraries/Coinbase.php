<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Exception\ExpiredTokenException;
use Coinbase\Wallet\Exception\HttpException;
use Coinbase\Wallet\Exception\InvalidRequestException;
use Coinbase\Wallet\Exception\InvalidTokenException;
use Coinbase\Wallet\Exception\RevokedTokenException;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\Notification;
use Coinbase\Wallet\Resource\CurrentUser;
use Coinbase\Wallet\Resource\PaymentMethod;
use Coinbase\Wallet\Resource\ResourceCollection;
use Coinbase\Wallet\Resource\User;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Enum\Param;


class Coinbase{
	
	public $CI;
	public $client_id;
	public $client_secret;
	public $redirect_uri;
	public $accessToken;
		
	function __construct(){
		$this->CI =& get_instance(); 
		$CIobj = $this->CI;
		$CIobj->config->load('coinbase');
		
		$this->client_id = $CIobj->config->item('client_id');
		$this->client_secret = $CIobj->config->item('client_secret');
		$this->redirect_uri = $CIobj->config->item('redirect_uri');
		
		
		}
	
	function testOauth($accessToken){
		
		}
	
	
	
}