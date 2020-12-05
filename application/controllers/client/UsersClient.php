<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersClient extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isClientNotLoginOrEndSession())
			return redirect('client/dashboard');
    }

    public function index()
	{
        $data = [
            'usersClientModel' => $this->usersClientModel->getDataWhere('id', $this->session->userdata('client_data')->id)
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/user_client/view', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function form()
	{
        if($this->input->post('state_update') == 'UPDATE_PROFIL')
            $label = 'Ubah Profil';
        else $label = 'Ubah Password';

        $data = [
            'usersClientModel' => $this->usersClientModel->getDataWhere('id', $this->session->userdata('client_data')->id),
            'state_update'     => $this->input->post('state_update'),
            'update_password'  => 'UPDATE_PASSWORD',
            'update_profil'    => 'UPDATE_PROFIL',
            'label'            => $label,
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/user_client/form', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function update()
	{
        $dataInJSON = $this->input->post('update');
        $dataInObject = json_decode($dataInJSON);

        if($dataInObject->state == 'UPDATE_PROFIL')
        {
            $data = array(
                'name'         => $dataInObject->name,
                'phone'        => $dataInObject->phone,
                'address'      => $dataInObject->address,
                'sub_district' => $dataInObject->sub_district,
                'district'     => $dataInObject->district,
                'city'         => $dataInObject->city,
                'postal'       => $dataInObject->postal,
                'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
                'updated_by'   => $this->session->userdata('client_data')->email,
            );

            $this->usersClientModel->updateData($this->session->userdata('client_data')->id, $data);
            
            $this->session->set_flashdata('message', 'Profil Anda berhasil diubah !');
            return redirect('client/usersclient');
        }else{
            $usersClientModel = $this->usersClientModel->getDataWhere('id', $this->session->userdata('client_data')->id);

            if($this->utilityModel->passwordVerify($dataInObject->oldPassword, $usersClientModel->password))
            {
                $data = array(
                    'password'     => $this->utilityModel->hashPassword($dataInObject->newPassword),
                    'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
                    'updated_by'   => $this->session->userdata('client_data')->email,
                );
    
                $this->usersClientModel->updateData($this->session->userdata('client_data')->id, $data);
                
                $this->session->set_flashdata('message', 'Password Anda berhasil diubah !');
                return redirect('client/usersclient');
            }else{
                //FLASH MASIH KEBAWA PAS BACK
                $this->session->set_flashdata('message', 'Password Lama Anda Invalid !');
                
                $data = [
                    'usersClientModel' => $this->usersClientModel->getDataWhere('id', $this->session->userdata('client_data')->id),
                    'state_update'     => 'UPDATE_PASSWORD',
                    'update_password'  => 'UPDATE_PASSWORD',
                    'update_profil'    => 'UPDATE_PROFIL',
                    'label'            => 'Ubah Password',
                ];
        
                $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
                $this->load->view('client/user_client/form', $data);
                $this->load->view('client/footer', $this->utilityModel->dataFooterClient());
            }
        }
    }
}