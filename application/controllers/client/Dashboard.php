<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index()
	{
        $toysModelArray = array();
        $toysCategoryModel = $this->toysCategoryModel->getData()->result();
        foreach($toysCategoryModel as $toysCategory)
        {   
            $newToysModel = new stdClass;
            $newToysModel->id_cat = $toysCategory->id;

            $newToysModifiedArray = array();
            $exToysModel = $this->toysModel->getDataWhereAll('id_cat', $toysCategory->id);
            foreach($exToysModel as $toysModel)
            {
                $newToysModifiedModel = new stdClass;
                $newToysModifiedModel->id = $toysModel->id;
                $newToysModifiedModel->toy_name = $toysModel->toy_name;
                $newToysModifiedModel->toy_image = $toysModel->toy_image;
                $newToysModifiedModel->toy_image_url = base_url('assets/images/images_toys/'.$toysModel->toy_image);

                $toysQuantityInDB = $toysModel->toy_quantity;
                $toysQuantityInCart = $this->cartModel->simpleReport('COUNT_ACTIVE_TOY_CART', $toysModel->id);
                $toysReadyQuantity = $toysQuantityInDB - $toysQuantityInCart;

                $newToysModifiedModel->toy_quantity = $toysQuantityInDB;
                $newToysModifiedModel->toy_quantity_reservation = $toysQuantityInCart;
                $newToysModifiedModel->toy_quantity_ready = $toysReadyQuantity;
                
                $newToysModifiedModel->toy_price = $toysModel->toy_price;
                $newToysModifiedModel->toy_price_string = $this->utilityModel->converterCurrencyIDR($toysModel->toy_price);
                $newToysModifiedModel->toy_desc = $toysModel->toy_desc;

                array_push($newToysModifiedArray, $newToysModifiedModel);
            }

            $newToysModel->toys = $newToysModifiedArray;

            array_push($toysModelArray, $newToysModel);
        }

        $data = [
            'toysCategoryModel' => $toysCategoryModel,
            'toysModel' => $toysModelArray,
            'base_url_cart' => 'client/cart/save'
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/dashboard', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }
}

