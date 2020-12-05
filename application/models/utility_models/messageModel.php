<?php 

class MessageModel extends CI_model{

	private $tableMessages = "message";

	//CRUD OPERATION
	public function getData()
	{
		return $this->db->get($this->tableMessages);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableMessages, [$paramWhere => $paramValue])->row();
	}

	public function getDataWhereAll($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableMessages, [$paramWhere => $paramValue])->result();
	}

	public function getDataWhereArray($arrayWhere)
	{
		$this->db->where($arrayWhere);
		$query = $this->db->get($this->tableMessages);

		return $query->result();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tableMessages, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableMessages, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableMessages);
	}

	//COUNT AND REPORT OPERATION
	public function simpleReport($typeReport)
	{
		return $this->utilityModel->getSimpleReportInDashboard($typeReport, $this->tableMessages);
	}
}
?>