<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isNotLoginOrEndSession())
			return redirect('admin/login');
    }

    public function index()
	{
		$dataHeader = $this->utilityModel->dataHeader('Keranjang Belanja');
        
        $cartModelArray = array();
        $cartModel = $this->cartModel->getData()->result();
        foreach($cartModel as $cart)
        {
            $newCartModel                   = new stdClass;
            $newCartModel->id               = $cart->id;
            $newCartModel->id_user          = $cart->id_user;

            $usersClient = $this->usersClientModel->getDataWhere('id', $cart->id_user);

            $newCartModel->user_name        = $usersClient->name.' ( '.$usersClient->email.' )';
            $newCartModel->toy_name         = $cart->toy_name;
            $newCartModel->toy_price        = $cart->toy_price;
            $newCartModel->toy_price_string = $this->utilityModel->converterCurrencyIDR($cart->toy_price);
            $newCartModel->quantity         = $cart->quantity;

            $subTotal = $cart->quantity * $cart->toy_price;

            $newCartModel->sub_total        = $subTotal;
            $newCartModel->sub_total_string = $this->utilityModel->converterCurrencyIDR($subTotal);
            $newCartModel->state_cart       = $cart->state_cart;
            $newCartModel->created_date     = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $cart->created_date);
            
            array_push($cartModelArray, $newCartModel);
        }

		$data['cartModel'] = $cartModelArray;

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/cart/data', $data);
		$this->load->view('admin/footer');
    }
}