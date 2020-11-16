<?php 

class ToysModel extends CI_model{

	private $tableToys = "toys";

	//CRUD OPERATION
	public function getData()
	{
		return $this->db->get($this->tableToys);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableToys, [$paramWhere => $paramValue])->row();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tableToys, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableToys, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableToys);
	}

	//COUNT AND REPORT OPERATION
	public function simpleReport($typeReport)
	{
		return $this->utilityModel->getSimpleReportInDashboard($typeReport, $this->tableToys);
	}
}
?>