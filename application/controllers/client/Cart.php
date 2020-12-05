<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isClientNotLoginOrEndSession())
			return redirect('client/dashboard');
    }
    
    public function index()
	{
        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/cart/data');
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function save()
	{
        $id;
        $quantity;
        if($this->input->post('id_add') == 0)
        {
            $id = $this->input->post('id');
            $quantity = 1;
        }else{
            $id = $this->input->post('id_add');
            $quantity = $this->input->post('quantity');
        }

        $toysModel = $this->toysModel->getDataWhere('id', $id);
        $data = array(
                'id_user'      => $this->session->userdata('client_data')->id,
                'id_toy' 	   => $id,
                'toy_name'     => $toysModel->toy_name,
                'toy_price'    => $toysModel->toy_price,
                'quantity' 	   => $quantity,
                'state_cart'   => 'N',
                'created_date' => $this->utilityModel->sysDate('DATE_TIME')
            );
            
        $this->cartModel->insertData($data);

        return redirect('client/dashboard');
    }

    public function delete()
	{
		$this->cartModel->deleteData($this->input->post('id_delete'));
		
        return redirect('client/dashboard');
    }

}