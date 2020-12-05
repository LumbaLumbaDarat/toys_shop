<?php 

class TransactionModel extends CI_model{

	private $tableTransactionHist = "transaction_hist";

	//CRUD OPERATION
	public function getData()
	{
		return $this->db->get($this->tableTransactionHist);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableTransactionHist, [$paramWhere => $paramValue])->row();
	}

	public function getDataWhereAll($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableTransactionHist, [$paramWhere => $paramValue])->result();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tableTransactionHist, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableTransactionHist, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableTransactionHist);
	}

	//COUNT AND REPORT OPERATION
	public function simpleReport($typeReport)
	{
		return $this->utilityModel->getSimpleReportInDashboard($typeReport, $this->tableTransactionHist);
	}
}
?>