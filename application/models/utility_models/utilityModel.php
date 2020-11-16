<?php 

class UtilityModel extends CI_model{

    public function checkParamIsEmpty($typeData, $data)
	{
		if(empty($data) || $data == null || $data == '')
			return $data = "Tidak Ada";
		else 
		{
			if($typeData == 'DATETIME')
				return $this->converterMonthNameForDateTime($data);
			else return $data;
		}
	}

	public function getSimpleReportInDashboard($typeReport, $tableName)
	{
		switch ($typeReport) {
			case 'COUNT_DATA':
					return $this->db->count_all_results($tableName);
			  break;
			case 'COUNT_TODAY_DATA':
					return $this->db->simple_query('SELECT count(*) AS today FROM '.$tableName.' WHERE `created_date` >= CURDATE()')->fetch_assoc()['today'];
			  break;
			case 'LAST_INSERTED_DATA':
					$this->db->select_max('id');
					$resultLastData = $this->db->get($tableName)->result();
			
					return $this->db->get_where($tableName, ['id' => $resultLastData[0]->id])->row();
			  break;
			case 'LAST_INSERTED_DATE':
				$this->db->select_max('id');
				$resultLastData = $this->db->get($tableName)->result();

				if(is_null($resultLastData[0]->id))	
					return "Tidak Ada";
				else return $this->converterMonthNameForDateTime($this->db->get_where($tableName, ['id' => $resultLastData[0]->id])->row()->created_date);
		  	break;
		  }
	}
	
	public function converterMonthNameForDateTime($dateTime)
	{
		if(empty($dateTime) || $dateTime == null || $dateTime == '')
			return $data = "Tidak Ada";
		else
		{
			$times = explode(" ", $dateTime);

			$dateArray = date_parse_from_format('Y/m/d', $dateTime);
			$month = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
			$dateString = $dateArray['day'] . " " . $month  . " " . $dateArray['year'];

			return $dateString.' '.$times[1];
		}
	}

	public function converterCurrencyIDR($currency)
	{
		if(empty($currency) || $currency == null || $currency == '')
			return $currency = "Tidak Ada";
		else return number_format($currency, 2, ',', '.');
	}

	public function sysDate()
	{
		return date('Y-m-d H:i:s');
	}

	public function setDefaultPasswordUserAdmin()
	{
		return "admin";
	}
}