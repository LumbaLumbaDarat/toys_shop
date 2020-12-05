<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
	{
        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/login');
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function verify()
	{
        $dataInJSON = $this->input->post('login');
        $dataInObject = json_decode($dataInJSON);

		$email    = $dataInObject->email;
		$password = $dataInObject->password;

		$usersClientModel = $this->usersClientModel->getDataWhere('email', $email);

		if($this->utilityModel->passwordVerify($password, $usersClientModel->password))
		{
			$this->session->set_userdata(['client_data' => $usersClientModel]);
			return redirect('client/dashboard');
		}else{
			$this->session->set_flashdata('message', 'Username dan Password Anda Invalid !');
			return redirect('client/login');
		}
    }
    
    public function logout()
	{
		$this->session->sess_destroy();
		return redirect('client/dashboard');
    }
}