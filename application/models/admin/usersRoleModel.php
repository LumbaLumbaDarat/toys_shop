<?php 

class UsersRoleModel extends CI_model{

	private $tabelUsersRole = "user_role";

	public function countData()
	{
		return $this->db->count_all_results($this->tabelUsersRole);
	}

	public function getData()
	{
		return $this->db->get($this->tabelUsersRole);
	}

	public function getDataWhere($roleCode)
	{
		return $this->db->get_where($this->tabelUsersRole, ["role_code" => $roleCode])->row();
	}
}
?>