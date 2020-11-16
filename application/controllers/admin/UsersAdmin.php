<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersAdmin extends CI_Controller {

	public function index()
	{
		$dataHeader['title'] = "Users Admin";

		$usersAdminModelArray = array();
		$usersAdminModel = $this->usersAdminModel->getData()->result();
		foreach($usersAdminModel as $usersAdmin)
		{
			$newUsersAdminModel = new stdClass;
			$newUsersAdminModel->id = $usersAdmin->id;
			$newUsersAdminModel->name = $usersAdmin->name;
			$newUsersAdminModel->email = $usersAdmin->email;
			$newUsersAdminModel->user_role_code = $usersAdmin->user_role;

			$newUserRoleModel = $this->usersRoleModel->getDataWhere($usersAdmin->user_role);

			$newUsersAdminModel->user_role = $newUserRoleModel->role_name;
			$newUsersAdminModel->created_date = $this->utilityModel->converterMonthNameForDateTime($usersAdmin->created_date);
			$newUsersAdminModel->created_by = $usersAdmin->created_by;
			$newUsersAdminModel->updated_date = $this->utilityModel->checkParamIsEmpty('DATETIME', $usersAdmin->updated_date);
			$newUsersAdminModel->updated_by = $this->utilityModel->checkParamIsEmpty('STRING', $usersAdmin->updated_by);

			array_push($usersAdminModelArray, $newUsersAdminModel);
		}

		$data['usersAdminModel'] = $usersAdminModelArray;

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/user_admin/data', $data);
		$this->load->view('admin/footer');
	}

	public function form()
	{
		$data = "";
		if($this->input->post('id_update') == 0)
		{
			$newUsersAdminModel 		   = new stdClass;
			$newUsersAdminModel->id 	   = '';
			$newUsersAdminModel->name 	   = '';
			$newUsersAdminModel->email 	   = '';
			$newUsersAdminModel->role_code = '';
			$newUsersAdminModel->photo_profile = 'admin_photo.png';
			
			$data = [
				'usersAdminModel' => $newUsersAdminModel,
				'base_url' => "admin/usersadmin/save"
			];
		}else{
			$data = [
				'usersAdminModel' => $this->usersAdminModel->getDataWhere('id', $this->input->post('id_update')),
				'base_url' => "admin/usersadmin/update"
			];
		}

		$dataHeader['title'] = "Users Admin";
		$data['usersRoleModel'] = $this->usersRoleModel->getData()->result();
		
		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/user_admin/form', $data);
		$this->load->view('admin/footer');
	}

	public function save()
	{
		$message;
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		$roles = explode('|', $this->input->post('user_role'));
		$usersRole = trim($roles[0], ' ');

		$data = array(
			'user_role'    => $usersRole,
			'name' 		   => $name,
			'email' 	   => $email,
			'password'     => $this->utilityModel->setDefaultPasswordUserAdmin(),
			'created_date' => $this->utilityModel->sysDate(),
			'created_by'   => 'Admin'
			);

		$this->usersAdminModel->insertData($data);

		$this->load->helper('string');
		$randomName = random_string('alnum', 64);

		$config['file_name']     = $randomName;
		$config['upload_path']   = FCPATH.'assets\images\images_user_admin';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('photo_profile'))
			$message = $this->upload->display_errors();
		else 
		{
			$data = array(
				'photo_profile' => $this->upload->data('file_name')
				);

			$newUsersAdminModel = $this->usersAdminModel->getDataWhere('email', $email);

			$this->usersAdminModel->updateData($newUsersAdminModel->id, $data);
			$message = '<strong>Penambahan Data User Admin berhasil dilakukan !</strong>'.
			'<br>'.
			'Data User Admin baru, <strong>'.$name.'</strong> dengan Username <strong>'.$email.'</strong> berhasil ditambahkan !';
		}

		$this->session->set_flashdata('message', $message);
		return redirect('admin/usersadmin');
	}

	public function update()
	{
		$id    = $this->input->post('id');
		$name  = $this->input->post('name');
		$email = $this->input->post('email');
		$photo_profile = $_FILES['photo_profile'];

		$roles = explode('|', $this->input->post('user_role'));
		$usersRole = trim($roles[0], ' ');

		if(!$_FILES['photo_profile']['name'] == '')
		{
			$newUsersAdminModel = $this->usersAdminModel->getDataWhere('id', $id);
			unlink(FCPATH.'assets\images\images_user_admin\\'.$newUsersAdminModel->photo_profile);
			
			$this->load->helper('string');
			$randomName = random_string('alnum', 64);

			$config['file_name']     = $randomName;
			$config['upload_path']   = FCPATH.'assets\images\images_user_admin';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('photo_profile'))
			{
				$message = $this->upload->display_errors();

				$this->session->set_flashdata('message', $message);
        		return redirect('admin/usersadmin');
			}else {
				$data = array(
					'user_role'    => $usersRole,
					'name'         => $name,
					'photo_profile'=> $this->upload->data('file_name'),
					'updated_date' => $this->utilityModel->sysDate(),
					'updated_by'   => 'Admin'
					);
			}
		}else $data = array(
					'user_role'    => $usersRole,
					'name'         => $name,
					'updated_date' => $this->utilityModel->sysDate(),
					'updated_by'   => 'Admin'
					);

		$this->usersAdminModel->updateData($id, $data);

		$message = '<strong>Perubahan Data User Admin berhasil dilakukan !</strong>'.
			'<br>'.
			'Data User Admin, <strong>'.$name.'</strong> dengan Username <strong>'.$email.'</strong> berhasil diubah !';

		$this->session->set_flashdata('message', $message);
        return redirect('admin/usersadmin');
	}

	public function delete()
	{
		$id = $this->input->post('id_delete');

		$usersAdminModel = $this->usersAdminModel->getDataWhere('id', $id);
		$this->usersAdminModel->deleteData($id);
		$path = FCPATH.'assets\images\images_user_admin\\';
		unlink($path.$usersAdminModel->photo_profile);
		
		$message = '<strong>Penghapusan Data User Admin berhasil dilakukan !</strong>'.
			'<br>'.
			'Data User Admin, <strong>'.$usersAdminModel->name.'</strong> dengan Username <strong>'.$usersAdminModel->email.'</strong> berhasil dihapus !';

		$this->session->set_flashdata('message', $message);
		return redirect('admin/usersadmin');
	}
}
