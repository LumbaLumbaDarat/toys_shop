<?php 

class UtilityModel extends CI_model{

    public function checkParamIsEmpty($typeData, $data)
	{
		if(empty($data) || $data == null || $data == '')
			return $data = "Tidak Ada";
		else 
		{
			if($typeData == 'DATETIME')
				return $this->converterMonthNameForDateTime('DATE_TIME', $data);
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
				else return $this->converterMonthNameForDateTime('DATE_TIME', $this->db->get_where($tableName, ['id' => $resultLastData[0]->id])->row()->created_date);
		  	break;
		  }
	}
	
	public function converterMonthNameForDateTime($type, $dateTime)
	{
		if(empty($dateTime) || $dateTime == null || $dateTime == '')
			return $data = "Tidak Ada";
		else
		{
			if($type == "DATE_TIME")
			{
				$times = explode(" ", $dateTime);

				$dateArray = date_parse_from_format('Y/m/d', $dateTime);
				$month = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
				$dateString = $dateArray['day'] . " " . $month  . " " . $dateArray['year'];

				return $dateString.' '.$times[1];
			}else{
				$dateArray = date_parse_from_format('Y/m/d', $dateTime);
				$month = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
				$dateString = $dateArray['day'] . " " . $month  . " " . $dateArray['year'];

				return $dateString;
			}
		}
	}

	public function converterCurrencyIDR($currency)
	{
		if(empty($currency) || $currency == null || $currency == '')
			return $currency = "Tidak Ada";
		else return number_format($currency, 2, ',', '.');
	}

	public function sysDate($type)
	{
		switch ($type) {
			case 'DATE':
					return date('Y-m-d');
			  break;
			case 'TIME':
					return date('H:i:s');
			  break;
			case 'DATE_TIME':
					return date('Y-m-d H:i:s');
			  break;
		}
	}

	public function setDefaultPasswordUserAdmin()
	{
		return $this->hashPassword("admin");
	}

	public function hashPassword($pass_user) 
	{
		return password_hash($pass_user, PASSWORD_BCRYPT);
	}

	public function passwordVerify($inputPassword, $passwordFromDatabase) 
	{
		if(password_verify($inputPassword, $passwordFromDatabase))
			return true;
		else return false;
	}

	public function getSex() 
	{
		$sexTypeArray = array();

		$sexTypeModel       = new stdClass;
		$sexTypeModel->id   = "L";
		$sexTypeModel->name = "Laki-Laki";

		array_push($sexTypeArray, $sexTypeModel);

		$sexTypeModel 		= new stdClass;
		$sexTypeModel->id 	= "P";
		$sexTypeModel->name = "Perempuan";

		array_push($sexTypeArray, $sexTypeModel);

		return $sexTypeArray;
	}

	public function getSexName($sex) 
	{
		if($sex == "L")
			return "Laki-Laki";
		else return "Perempuan";
	}
}