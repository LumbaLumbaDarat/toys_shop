<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ToysCategory extends CI_Controller {

    public function index()
	{
        $dataHeader['title'] = "Kategori Mainan";
        
        $toysCategoryModelArray = array();
        $toysCategoryModel = $this->toysCategoryModel->getData()->result();
        foreach($toysCategoryModel as $toysCategory)
        {
            $newToysCategoryModel = new stdClass;
            $newToysCategoryModel->id = $toysCategory->id;
            $newToysCategoryModel->cat_name = $toysCategory->cat_name;
            $newToysCategoryModel->cat_desc = $toysCategory->cat_desc;
            $newToysCategoryModel->created_date = $this->utilityModel->converterMonthNameForDateTime($toysCategory->created_date);
            $newToysCategoryModel->created_by = $toysCategory->created_by;
            $newToysCategoryModel->updated_date = $this->utilityModel->checkParamIsEmpty('DATETIME', $toysCategory->updated_date);
            $newToysCategoryModel->updated_by = $this->utilityModel->checkParamIsEmpty('STRING', $toysCategory->updated_by);

            array_push($toysCategoryModelArray, $newToysCategoryModel);
        }

		$data['toysCategoryModel'] = $toysCategoryModelArray;

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/toys_cat/data', $data);
		$this->load->view('admin/footer');
    }
    
    public function form()
	{
		$data = "";
		if($this->input->post('id_update') == 0)
		{
			$newToysCategoryModel 		    = new stdClass;
			$newToysCategoryModel->id 	    = '';
			$newToysCategoryModel->cat_name = '';
			$newToysCategoryModel->cat_desc = '';
			
			$data = [
				'toysCategoryModel' => $newToysCategoryModel,
				'base_url' => "admin/toyscategory/save"
			];
		}else{
			$data = [
				'toysCategoryModel' => $this->toysCategoryModel->getDataWhere('id', $this->input->post('id_update')),
				'base_url' => "admin/toyscategory/update"
			];
		}

		$dataHeader['title'] = "Kategori Mainan";
		
		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/toys_cat/form', $data);
		$this->load->view('admin/footer');
	}

	public function save()
	{
		$catName = $this->input->post('cat_name');
		$catDesc = $this->input->post('cat_desc');

		$data = array(
			'cat_name'     => $catName,
			'cat_desc' 	   => $catDesc,
			'created_date' => $this->utilityModel->sysDate(),
			'created_by'   => 'Admin'
			);

		$this->toysCategoryModel->insertData($data);

		$message = '<strong>Penambahan Data Kategori Mainan berhasil dilakukan !</strong>'.
			'<br>'.
			'Data User Kategori Mainan baru, <strong>'.$catName.'</strong> berhasil ditambahkan !';

		$this->session->set_flashdata('message', $message);
		return redirect('admin/toyscategory');
	}

	public function update()
	{
		$id      = $this->input->post('id');
		$catName = $this->input->post('cat_name');
		$catDesc = $this->input->post('cat_desc');
		
		$data = array(
			'cat_name'     => $catName,
			'cat_desc'     => $catDesc,
			'updated_date' => $this->utilityModel->sysDate(),
			'updated_by'   => 'Admin'
			);

		$this->toysCategoryModel->updateData($id, $data);

		$message = '<strong>Perubahan Data Kategori Mainan berhasil dilakukan !</strong>'.
			'<br>'.
			'Data Kategori Mainan, <strong>'.$catName.'</strong> berhasil diubah !';

		$this->session->set_flashdata('message', $message);
        return redirect('admin/toyscategory');
	}

	public function delete()
	{
		$id = $this->input->post('id_delete');

		$toysCategoryModel = $this->toysCategoryModel->getDataWhere('id', $id);
		$this->toysCategoryModel->deleteData($id);
		
		$message = '<strong>Penghapusan Data Kategori Mainan berhasil dilakukan !</strong>'.
			'<br>'.
			'Data Kategori Mainan, <strong>'.$toysCategoryModel->cat_name.'</strong> berhasil dihapus !';

		$this->session->set_flashdata('message', $message);
		return redirect('admin/toyscategory');
	}
}