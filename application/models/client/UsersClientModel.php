<?php 

class UsersClientModel extends CI_model{

	private $tableUsersClient = "user_client";

	//CRUD OPERATION
	public function getData()
	{
		return $this->db->get($this->tableUsersClient);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableUsersClient, [$paramWhere => $paramValue])->row();
	}

	public function getDataWhereAll($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableUsersClient, [$paramWhere => $paramValue])->result();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tableUsersClient, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableUsersClient, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableUsersClient);
	}

	//COUNT AND REPORT OPERATION
	public function simpleReport($typeReport)
	{
		return $this->utilityModel->getSimpleReportInDashboard($typeReport, $this->tableUsersClient);
	}
}
?>