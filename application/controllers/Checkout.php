<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{


	public function index($status = null)
	{ 
		$this->load->model('cart_model', 'cart');
		$cart = $this->cart->getDetails(session_id());  
		$this->_view_data['cart'] = $cart;
		$this->_view_data['pageContent'] = 'frontend/checkout';
		$this->load->view('frontend-template', $this->_view_data);
	}

}
