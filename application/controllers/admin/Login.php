<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$dates = explode(' ', $this->utilityModel->converterMonthNameForDateTime('DATE', $this->utilityModel->sysDate('DATE')));
		$month = trim($dates[1], ' ');
		$year  = trim($dates[2], ' ');

		$data = [
			'copyrightDate'  => $month.' '.$year,
			'gentelellaLink' => 'https://github.com/ColorlibHQ/gentelella',
			'codeIginiterLink' => 'https://codeigniter.com/',
			'base_url' => 'admin/login/verify'
		];

		$this->load->view('admin/login', $data);
	}
	
	public function verify()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$usersAdminModel = $this->usersAdminModel->getDataWhere('email', $email);

		if($this->utilityModel->passwordVerify($password, $usersAdminModel->password))
		{
			$this->session->set_userdata(['user_data' => $usersAdminModel]);
			return redirect('admin/dashboard/');
		}else{
			$this->session->set_flashdata('message', 'alert-danger | <strong>Username dan Password Anda Invalid !</strong>');
			return redirect('admin/login');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		return redirect('admin/login');
    }
}