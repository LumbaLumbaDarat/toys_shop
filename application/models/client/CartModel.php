<?php 

class CartModel extends CI_model{

	private $tableCart = "cart";

	//CRUD OPERATION
	public function getData()
	{
		return $this->db->get($this->tableCart);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableCart, [$paramWhere => $paramValue])->row();
	}

	public function getDataCartWithStatus($arrayWhere)
	{
		$this->db->where($arrayWhere);
		$query = $this->db->get($this->tableCart);

		return $query->result();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tableCart, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableCart, $data);
	}

	public function updateClearCart($id, $data)
	{
		$this->db->where(array('id_user' => $id, 'state_cart' => 'N'));
		$this->db->update($this->tableCart, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableCart);
	}

	//COUNT AND REPORT OPERATION
	public function simpleReport($typeReport, $param)
	{
		return $this->utilityModel->getSimpleReportInDashboard($typeReport, $this->tableCart.' | '.$param);
	}
}
?>