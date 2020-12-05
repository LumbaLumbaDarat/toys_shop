<?php 

class DetailTransactionModel extends CI_model{

	private $tableDetailTransactionHist = "transaction_detail";

	//CRUD OPERATION
	public function getData()
	{
		return $this->db->get($this->tableDetailTransactionHist);
	}

	public function getDataWhere($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableDetailTransactionHist, [$paramWhere => $paramValue])->row();
	}

	public function getDataWhereAll($paramWhere, $paramValue)
	{
		return $this->db->get_where($this->tableDetailTransactionHist, [$paramWhere => $paramValue])->result();
	}

	public function insertData($idTrx, $dataHeader)
	{
		$this->db->trans_start();
		$cartModel = $dataHeader['cartModel'];
        foreach($cartModel as $cart)
        {
            $data = array(
                'id_trx_hist'      => $idTrx,
                'id_toy' 	       => $cart->id_toy,
                'toy_name' 	       => $cart->toy_name,
                'toy_price' 	   => $cart->toy_price,
                'quantity' 	       => $cart->quantity,
                'sub_total' 	   => $cart->sub_total,
				);

			$this->db->insert($this->tableDetailTransactionHist, $data);
        }
		$this->db->trans_complete();
	}

	public function updateData($id, $data)
	{
		$this->db->where(array('id' => $id));
		$this->db->update($this->tableDetailTransactionHist, $data);
	}

	public function deleteData($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete($this->tableDetailTransactionHist);
	}

	//COUNT AND REPORT OPERATION
	public function simpleReport($typeReport)
	{
		return $this->utilityModel->getSimpleReportInDashboard($typeReport, $this->tableDetailTransactionHist);
	}
}
?>