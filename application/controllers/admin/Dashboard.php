<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['usersAdminModel'] = $this->usersAdminModel->countData();

		$this->load->view('admin/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');
	}
}
