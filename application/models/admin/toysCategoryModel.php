<?php 

class ToysCategoryModel extends CI_model{

	private $tableToysCategory = "toys_category";

	public function countData()
	{
		return $this->db->count_all_results($this->tableToysCategory);
	}

	public function getData()
	{
		return $this->db->get($this->tableToysCategory);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableToysCategory, [$paramWhere => $paramValue])->row();
	}

	public function insertData($data)
	{
		$this->db->insert($this->tableToysCategory, $data);
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableToysCategory, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableToysCategory);
	}
}
?>