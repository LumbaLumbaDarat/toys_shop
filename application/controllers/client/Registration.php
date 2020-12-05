<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function index()
	{
        $usersClientModel = new stdClass;
        $usersClientModel->name         = '';
        $usersClientModel->email        = '';
        $usersClientModel->phone        = '';
        $usersClientModel->address      = '';
        $usersClientModel->sub_district = '';
        $usersClientModel->district     = '';
        $usersClientModel->city         = '';
        $usersClientModel->postal       = '';
        $usersClientModel->password     = '';

        $data = [
            'usersClientModel' => $usersClientModel
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/registration', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function save()
	{
        $dataInJSON = $this->input->post('registration');
        $dataInObject = json_decode($dataInJSON);
        
        $existingUser = $this->usersClientModel->getDataWhere('email', $dataInObject->email);

        if(!empty($existingUser))
        {
            $usersClientModel = new stdClass;
            $usersClientModel->name         = $dataInObject->name;
            $usersClientModel->email        = $dataInObject->email;
            $usersClientModel->phone        = $dataInObject->phone;
            $usersClientModel->address      = $dataInObject->address;
            $usersClientModel->sub_district = $dataInObject->sub_district;
            $usersClientModel->district     = $dataInObject->district;
            $usersClientModel->city         = $dataInObject->city;
            $usersClientModel->postal       = $dataInObject->postal;
            $usersClientModel->password     = $dataInObject->password;

            $data = [
                'usersClientModel' => $usersClientModel
            ];
            $this->session->set_flashdata('message', 'Email User sudah terdaftar !');

            $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
            $this->load->view('client/registration', $data);
            $this->load->view('client/footer', $this->utilityModel->dataFooterClient());
        }else {
            $data = array(
                'name'         => $dataInObject->name,
                'email' 	   => $dataInObject->email,
                'phone'        => $dataInObject->phone,
                'address'      => $dataInObject->address,
                'sub_district' => $dataInObject->sub_district,
                'district'     => $dataInObject->district,
                'city'         => $dataInObject->city,
                'postal'       => $dataInObject->postal,
                'password' 	   => $this->utilityModel->hashPassword($dataInObject->password),
                'created_date' => $this->utilityModel->sysDate('DATE_TIME'),
                'created_by'   => $dataInObject->email,
            );

            $this->usersClientModel->insertData($data);
            return redirect('client/login');
        }
    }
}