<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersClient extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isNotLoginOrEndSession())
			return redirect('admin/login');
    }

    public function index()
	{
        $dataHeader = $this->utilityModel->dataHeader('Users Client');

        $data = [
            'usersClientModel' => $this->usersClientModel->getData()->result()
        ];

        $this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/user_client/data', $data);
		$this->load->view('admin/footer');
    }
}