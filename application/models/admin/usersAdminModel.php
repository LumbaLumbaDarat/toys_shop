<?php 

class UsersAdminModel extends CI_model{

	private $tabelUsersAdmin = "user_admin";

	public function countData()
	{
		return $this->db->count_all_results($this->tabelUsersAdmin);
	}

	public function getData()
	{
		return $this->db->get($this->tabelUsersAdmin);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tabelUsersAdmin, [$paramWhere => $paramValue])->row();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tabelUsersAdmin, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tabelUsersAdmin, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tabelUsersAdmin);
	}
}
?>