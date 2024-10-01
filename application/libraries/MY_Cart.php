<?php
/**
 * Just another MY_Cart class that adds an increment functionality to the quantity of a product in the cart,
 * but this preserves the product options functionality.
 *
 * @author John Kevin M. Basco - only added the increment functionality to the quantity of a product in the cart.
 */
class MY_Cart extends CI_Cart {

    public function __construct()
    {
        parent::__construct();
		
		if ($this->_cart_contents === NULL)
		{
			// No cart exists so we'll set some base values
			$this->_cart_contents = array('sst' => 0, 'serv_charges' => 0);
		}
    }
	
		// --------------------------------------------------------------------

	/**
	 * Save the cart array to the session DB
	 *
	 * @return	bool
	 */
	protected function _save_cart()
	{
		// Let's add up the individual prices and set the cart sub-total
		$this->_cart_contents['total_items'] = $this->_cart_contents['cart_total'] = 0;
		//// get tax value
		$tax = get_option('sst'); 
		$service_fee = get_option('service_fee'); 
		foreach ($this->_cart_contents as $key => $val)
		{
			// We make sure the array contains the proper indexes
			if ( ! is_array($val) OR ! isset($val['price'], $val['qty']))
			{
				continue;
			}
			
			$this->_cart_contents[$key]['sst'] = $tax;
			$this->_cart_contents[$key]['service_fee'] = $service_fee;
			$percent = ($val['price'] * $val['qty']) * ($tax / 100);
			$all_total = $percent + ($val['price'] * $val['qty']) + $service_fee;
			$this->_cart_contents['cart_total'] += $all_total ;
			$this->_cart_contents['total_items'] += $val['qty'];
			//$this->_cart_contents[$key]['subtotal'] = ($this->_cart_contents[$key]['price'] * $this->_cart_contents[$key]['qty']);
			$this->_cart_contents[$key]['subtotal'] = $all_total;
			
		}

		// Is our cart empty? If so we delete it from the session
		if (count($this->_cart_contents) <= 2)
		{
			$this->CI->session->unset_userdata('cart_contents');

			// Nothing more to do... coffee time!
			return FALSE;
		}

		// If we made it this far it means that our cart has data.
		// Let's pass it to the Session class so it can be stored
		$this->CI->session->set_userdata(array('cart_contents' => $this->_cart_contents));

		// Woot!
		return TRUE;
	}

	 
	
}