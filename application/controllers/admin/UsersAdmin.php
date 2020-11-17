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
			$newUsersAdminModel->sex = $usersAdmin->sex;
			$newUsersAdminModel->sex_name = $this->utilityModel->getSexName($usersAdmin->sex);
			$newUsersAdminModel->birthday = $this->utilityModel->converterMonthNameForDateTime('DATE', $usersAdmin->birthday);
			$newUsersAdminModel->address = $usersAdmin->address;
			$newUsersAdminModel->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $usersAdmin->created_date);
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
			$newUsersAdminModel->sex 	   = 'L';
			$newUsersAdminModel->birthday  = $this->utilityModel->sysDate('DATE');
			$newUsersAdminModel->address   = '';
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
		$data['sexTypeModel'] = $this->utilityModel->getSex();

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/user_admin/form', $data);
		$this->load->view('admin/footer');
	}

	public function save()
	{
		$message;
		$name 	  = $this->input->post('name');
		$email    = $this->input->post('email');
		$sex  	  = $this->input->post('sex');
		$birthday = $this->input->post('birthday');
		$address  = $this->input->post('address');

		$roles = explode('|', $this->input->post('user_role'));
		$usersRole = trim($roles[0], ' ');

		$data = array(
			'user_role'    => $usersRole,
			'name' 		   => $name,
			'email' 	   => $email,
			'sex' 	   	   => $sex,
			'birthday' 	   => $birthday,
			'address' 	   => $address,
			'password'     => $this->utilityModel->setDefaultPasswordUserAdmin(),
			'created_date' => $this->utilityModel->sysDate('DATE_TIME'),
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
		$ids = explode('|', $this->input->post('id'));
		$updateVia = trim($ids[0], ' ');
		$id = trim($ids[1], ' ');

		switch ($updateVia) {
			case 'EDIT_ADDRESS_VIA_PROFILE':
				$address  = $this->input->post('address');
				$data = array(
						'address'      => $address,
						'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
						'updated_by'   => 'Admin'
					);
				$this->usersAdminModel->updateData($id, $data);
				
				$message = 'alert-success | <strong>Perubahan Data Alamat berhasil dilakukan !</strong>';
				
				$this->session->set_flashdata('message', $message);
				return redirect('admin/usersadmin/profil');
			break;
			case 'EDIT_PHOTO_PROFILE_VIA_PROFILE':
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
					$message = 'alert-danger | '.$this->upload->display_errors();

					$this->session->set_flashdata('message', $message);
					return redirect('admin/usersadmin/profil');
				}else {
					$data = array(
						'photo_profile'=> $this->upload->data('file_name'),
						'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
						'updated_by'   => 'Admin'
						);
				}

				$this->usersAdminModel->updateData($id, $data);
				
				$message = 'alert-success | <strong>Perubahan Foto Profil berhasil dilakukan !</strong>';
				
				$this->session->set_flashdata('message', $message);
				return redirect('admin/usersadmin/profil');
			break;
			case 'EDIT_GENERAL_VIA_EDIT':
				$name  	  = $this->input->post('name');
				$email 	  = $this->input->post('email');
				$sex      = $this->input->post('sex');
				$birthday = $this->input->post('birthday');
				$address  = $this->input->post('address');
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
						$message = 'alert-danger | '.$this->upload->display_errors();

						$this->session->set_flashdata('message', $message);
						return redirect('admin/usersadmin');
					}else {
						$data = array(
							'user_role'    => $usersRole,
							'name'         => $name,
							'sex'          => $sex,
							'birthday'     => $birthday,
							'address'      => $address,
							'photo_profile'=> $this->upload->data('file_name'),
							'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
							'updated_by'   => 'Admin'
							);
					}
				}else $data = array(
							'user_role'    => $usersRole,
							'name'         => $name,
							'sex'          => $sex,
							'birthday'     => $birthday,
							'address'      => $address,
							'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
							'updated_by'   => 'Admin'
							);

				$this->usersAdminModel->updateData($id, $data);

				$message = 'alert-success | <strong>Perubahan Data User Admin berhasil dilakukan !</strong>'.
					'<br>'.
					'Data User Admin, <strong>'.$name.'</strong> dengan Username <strong>'.$email.'</strong> berhasil diubah !';

				$this->session->set_flashdata('message', $message);
				return redirect('admin/usersadmin');
			break;
			case 'EDIT_PASSWORD_VIA_PASSWORD':
				$oldPassword = $this->input->post('old_password');
				$newPassword = $this->input->post('password');

				$usersAdminModel = $this->usersAdminModel->getDataWhere('id', $id);

				$message;
				if($this->utilityModel->passwordVerify($oldPassword, $usersAdminModel->password))
				{
					$data = array(
						'password' 	   => $this->utilityModel->hashPassword($newPassword),
						'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
						'updated_by'   => 'Admin'
						);
					
					$this->usersAdminModel->updateData($id, $data);
					$message = 'alert-success | <strong>Anda berhasil mengganti Password Lama Anda, gunakan Password Baru Anda ketika Anda kembali Login</strong>';
				}else{
					$message = 'alert-danger | <strong>Password Anda Invalid !</strong>';
				}

				$this->session->set_flashdata('message', $message);
				return redirect('admin/usersadmin/password');
			break;
			case 'RESET_PASSWORD':
				$usersAdminModel = $this->usersAdminModel->getDataWhere('id', $id);

				$data = array(
					'password'     => $this->utilityModel->setDefaultPasswordUserAdmin(),
					'updated_date' => $this->utilityModel->sysDate('DATE_TIME'),
					'updated_by'   => 'Admin'
				);

				$this->usersAdminModel->updateData($id, $data);
				
				$message = 'alert-success | Password User Admin dengan Nama <strong>'.
							$usersAdminModel->name.'</strong> dengan Username <strong>'.
							$usersAdminModel->email.'</strong> Berhasil direset !';
				
				$this->session->set_flashdata('message', $message);
				return redirect('admin/usersadmin/');
			break;
		}
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

	public function profil()
	{
		$usersAdminModel = $this->usersAdminModel->getDataWhere('id', 86);
		$newUsersAdminModel = new stdClass;
		$newUsersAdminModel->id = $usersAdminModel->id;
		$newUsersAdminModel->name = $usersAdminModel->name;
		$newUsersAdminModel->email = $usersAdminModel->email;
		$newUsersAdminModel->user_role_code = $usersAdminModel->user_role;

		$newUserRoleModel = $this->usersRoleModel->getDataWhere($usersAdminModel->user_role);

		$newUsersAdminModel->user_role = $newUserRoleModel->role_name;
		$newUsersAdminModel->sex = $usersAdminModel->sex;
		$newUsersAdminModel->sex_name = $this->utilityModel->getSexName($usersAdminModel->sex);
		$newUsersAdminModel->birthday = $this->utilityModel->converterMonthNameForDateTime('DATE', $usersAdminModel->birthday);
		$newUsersAdminModel->address = $usersAdminModel->address;
		$newUsersAdminModel->photo_profile = $usersAdminModel->photo_profile;
		$newUsersAdminModel->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $usersAdminModel->created_date);
		$newUsersAdminModel->created_by = $usersAdminModel->created_by;
		$newUsersAdminModel->updated_date = $this->utilityModel->checkParamIsEmpty('DATETIME', $usersAdminModel->updated_date);
		$newUsersAdminModel->updated_by = $this->utilityModel->checkParamIsEmpty('STRING', $usersAdminModel->updated_by);

		$dataHeader['title'] = "Users Admin";
		$data = [
			'usersAdminModel' => $newUsersAdminModel,
			'base_url' => "admin/usersadmin/update"
		];
		
		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/user_admin/profile', $data);
		$this->load->view('admin/footer');
	}

	public function password()
	{
		$dataHeader['title'] = "Users Admin";
		$data['usersAdminModel'] = $this->usersAdminModel->getDataWhere('id', 86);

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/user_admin/password', $data);
		$this->load->view('admin/footer');
	}
}
