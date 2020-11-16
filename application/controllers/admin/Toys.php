<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toys extends CI_Controller {

    public function index()
	{
        $dataHeader['title'] = "Mainan";
        
        $toysModelArray = array();
        $toysModel = $this->toysModel->getData()->result();
        foreach($toysModel as $toys)
        {
            $newToysModel = new stdClass;
            $newToysModel->id = $toys->id;
            $newToysModel->id_cat = $toys->id_cat;

            $newToysCategoryModel = $this->toysCategoryModel->getDataWhere('id', $toys->id_cat);

            $newToysModel->cat_name = $newToysCategoryModel->cat_name;
            $newToysModel->toy_name = $toys->toy_name;
            $newToysModel->toy_quantity = $toys->toy_quantity;
			$newToysModel->toy_price = $toys->toy_price;
			$newToysModel->toy_price_string = $this->utilityModel->converterCurrencyIDR($toys->toy_price);
            $newToysModel->created_date = $this->utilityModel->converterMonthNameForDateTime($toys->created_date);
            $newToysModel->created_by = $toys->created_by;
            $newToysModel->updated_date = $this->utilityModel->checkParamIsEmpty('DATETIME', $toys->updated_date);
            $newToysModel->updated_by = $this->utilityModel->checkParamIsEmpty('STRING', $toys->updated_by);

            array_push($toysModelArray, $newToysModel);
        }

		$data['toysModel'] = $toysModelArray;

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/toys/data', $data);
		$this->load->view('admin/footer');
    }
    
    public function form()
	{
		$data = "";
		if($this->input->post('id_update') == 0)
		{
			$toysModel 		      = new stdClass;
			$toysModel->id 	         = '';
			$toysModel->id_cat 	     = '';
			$toysModel->toy_name 	 = '';
			$toysModel->toy_quantity = '';
			$toysModel->toy_price    = '';
			$toysModel->toy_desc     = '';
			$toysModel->toy_image    = 'mainan.png';
			
			$data = [
				'toysModel' => $toysModel,
				'base_url' => "admin/toys/save"
			];
		}else{
			$data = [
				'toysModel' => $this->toysModel->getDataWhere('id', $this->input->post('id_update')),
				'base_url' => "admin/toys/update"
			];
		}

		$dataHeader['title'] = "Kategori Mainan";
		$data['toysCategoryModel'] = $this->toysCategoryModel->getData()->result();
		
		
		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/toys/form', $data);
		$this->load->view('admin/footer');
	}

	public function save()
	{
		$idCat 	     = $this->input->post('id_cat');
		$toyName 	 = $this->input->post('toy_name');
		$toyQuantity = $this->input->post('toy_quantity');
		$toyPrice    = $this->input->post('toy_price');
		$toyDesc     = $this->input->post('toy_desc');
		 
		$message;
		$this->load->helper('string');
		$randomName = random_string('alnum', 64);

		$config['file_name']     = $randomName;
		$config['upload_path']   = FCPATH.'assets\images\images_toys';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		$imageNameBeforeUploadImage = $this->upload->data('file_name');

		$data = array(
			'id_cat'       => $idCat,
			'toy_name' 	   => $toyName,
			'toy_quantity' => $toyQuantity,
			'toy_price'    => $toyPrice,
			'toy_desc'     => $toyDesc,
			'toy_image'    => $imageNameBeforeUploadImage,
			'created_date' => $this->utilityModel->sysDate(),
			'created_by'   => 'Admin'
			);

		$this->toysModel->insertData($data);

		if(!$this->upload->do_upload('toy_image'))
			$message = $this->upload->display_errors();
		else 
		{
			$data = array(
				'toy_image' => $this->upload->data('file_name')
				);

			$newtoysModel = $this->toysModel->getDataWhere('toy_image', $imageNameBeforeUploadImage);

			$this->toysModel->updateData($newtoysModel->id, $data);
			$message = '<strong>Penambahan Data Mainan berhasil dilakukan !</strong>'.
			'<br>'.
			'Data Mainan baru, <strong>'.$toyName.'</strong> dengan Stok <strong>'.$toyQuantity.'</strong>, dan Harga Satuan IDR <strong>'.$this->utilityModel->converterCurrencyIDR($toyPrice).'</strong> berhasil ditambahkan !';
		}

		$this->session->set_flashdata('message', $message);
		return redirect('admin/toys');
	}

	public function update()
	{
		$id          = $this->input->post('id');
		$idCat 	     = $this->input->post('id_cat');
		$toyName 	 = $this->input->post('toy_name');
		$toyQuantity = $this->input->post('toy_quantity');
		$toyPrice    = $this->input->post('toy_price');
		$toyDesc     = $this->input->post('toy_desc');

		if(!$_FILES['toy_image']['name'] == '')
		{
			$newtoysModel = $this->toysModel->getDataWhere('id', $id);
			unlink(FCPATH.'assets\images\images_toys\\'.$newtoysModel->toy_image);
			
			$this->load->helper('string');
			$randomName = random_string('alnum', 64);

			$config['file_name']     = $randomName;
			$config['upload_path']   = FCPATH.'assets\images\images_toys';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('toy_image'))
			{
				$message = $this->upload->display_errors();

				$this->session->set_flashdata('message', $message);
        		return redirect('admin/toys');
			}else {
				$data = array(
					'id_cat'       => $idCat,
					'toy_name' 	   => $toyName,
					'toy_quantity' => $toyQuantity,
					'toy_price'    => $toyPrice,
					'toy_desc'     => $toyDesc,
					'toy_image'    => $this->upload->data('file_name'),
					'updated_date' => $this->utilityModel->sysDate(),
					'updated_by'   => 'Admin'
					);
			}
		}else $data = array(
					'id_cat'       => $idCat,
					'toy_name' 	   => $toyName,
					'toy_quantity' => $toyQuantity,
					'toy_price'    => $toyPrice,
					'toy_desc'     => $toyDesc,
					'updated_date' => $this->utilityModel->sysDate(),
					'updated_by'   => 'Admin'
					);

		$this->toysModel->updateData($id, $data);

		$message = '<strong>Perubahan Data Mainan berhasil dilakukan !</strong>'.
			'<br>'.
			'Data Mainan, <strong>'.$toyName.'</strong> dengan Stok <strong>'.$toyQuantity.'</strong>, dan Harga Satuan IDR <strong>'.$this->utilityModel->converterCurrencyIDR($toyPrice).'</strong> berhasil diubah !';

		$this->session->set_flashdata('message', $message);
        return redirect('admin/toys');
	}

	public function delete()
	{
		$id = $this->input->post('id_delete');

		$toysModel = $this->toysModel->getDataWhere('id', $id);
		$this->toysModel->deleteData($id);
		$path = FCPATH.'assets\images\images_toys\\';
		unlink($path.$toysModel->toy_image);
		
		$message = '<strong>Penghapusan Data Mainan berhasil dilakukan !</strong>'.
			'<br>'.
			'Data Mainan, <strong>'.$toysModel->toy_name.'</strong> dengan Stok <strong>'.$toysModel->toy_quantity.'</strong>, dan Harga Satuan IDR <strong>'.$this->utilityModel->converterCurrencyIDR($toysModel->toy_price).'</strong> berhasil dihapus !';
		
		$this->session->set_flashdata('message', $message);
		return redirect('admin/toys');
	}
}