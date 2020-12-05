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
			case 'COUNT_ACTIVE_USER_CART':
				$datas = explode('|', $tableName);
				$newTableName = trim($datas[0], ' ');
				$idUserInCart = trim($datas[1], ' ');

				return $this->db->simple_query('SELECT count(*) AS data_cart FROM '.$newTableName.' WHERE `id_user` = '.$idUserInCart.' AND `state_cart` = \'N\'')->fetch_assoc()['data_cart'];
			break;
			case 'COUNT_ACTIVE_TOY_CART':
				$datas = explode('|', $tableName);
				$newTableName = trim($datas[0], ' ');
				$idToyInCart = trim($datas[1], ' ');
				
				return $this->db->simple_query('SELECT sum(`quantity`) AS data_cart FROM '.$newTableName.' WHERE `id_toy` = '.$idToyInCart.' AND `state_cart` = \'N\'')->fetch_assoc()['data_cart'];
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

	public function isNotLoginOrEndSession()
	{
        return $this->session->userdata('user_data') === null;
	}
	
	public function dataHeader($titleName)
	{
		$arrayWhere = array(
			'message_to' => 'ADO',
            'read_by'    => null
        );

		$countMessage = 0;
        $messageModelArray = array();
        $messageModel = $this->messageModel->getDataWhereArray($arrayWhere);
        foreach($messageModel as $message)
        {
			$countMessage++;
            $newMessageModel = new stdClass;
            $newMessageModel->id                = $message->id;
            $newMessageModel->message_from      = $message->message_from;
            $newMessageModel->message_to_string = $this->utilityModel->messageTo($message->message_to);
            $newMessageModel->subject           = $message->subject;
            $newMessageModel->created_date      = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $message->created_date);
            $newMessageModel->read_by           = $this->utilityModel->checkParamIsEmpty('STRING', $message->read_by);
            $newMessageModel->read_date         = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $message->read_date);

            array_push($messageModelArray, $newMessageModel);
		}
		
		$dataHeader = [
			'title' 		  => $titleName,
			'countMessage'	  => $countMessage,
			'messageModel'	  => $messageModelArray,
			'usersAdminModel' => $this->session->userdata('user_data') 
		];

		return $dataHeader;
	}

	public function isClientNotLoginOrEndSession()
	{
        return $this->session->userdata('client_data') === null;
	}

	public function dataHeaderCart()
	{
		$dataHeader;
		if($this->isClientNotLoginOrEndSession())
		{
			$dataHeader = [
				'cartModel' 		   => '',
				'cartSum'			   => '',
				'cartSumString' 	   => '',
				'cartCount' 		   => '',
				'base_url_delete_cart' => '',
				'icon' 				   => 'icon_name.png'
			];
		}else{
			$usersClientModel = $this->session->userdata('client_data');

			$cartModelArray = array();
			$cartSumArray = array();
			$arrayWhere = array('id_user' => $usersClientModel->id, 'state_cart' => 'N');
			$cartModel = $this->cartModel->getDataCartWithStatus($arrayWhere);
			foreach($cartModel as $cart)
			{ 
				$newCartModel = new stdClass;
				$newCartModel->id = $cart->id;
				$newCartModel->id_user = $cart->id_user;
				$newCartModel->id_toy = $cart->id_toy;

				$newToysModel = $this->toysModel->getDataWhere('id', $cart->id_toy);

				$newCartModel->toy_image = $newToysModel->toy_image;
				$newCartModel->toy_name = $cart->toy_name;
				$newCartModel->toy_price = $cart->toy_price;
				$newCartModel->toy_price_string = $this->utilityModel->converterCurrencyIDR($cart->toy_price);
				$newCartModel->quantity = $cart->quantity;
				$newCartModel->state_cart = $cart->state_cart;
				$newCartModel->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $cart->created_date);
			
				$subTotal = $cart->quantity * $cart->toy_price;

				$newCartModel->sub_total = $subTotal;
				$newCartModel->sub_total_string = $this->utilityModel->converterCurrencyIDR($subTotal);
				
				array_push($cartSumArray, $subTotal);
				array_push($cartModelArray, $newCartModel);
			}

			$arrayWhere = array(
				'message_to' => $usersClientModel->email,
				'read_by'    => null
			);
	
			$countMessage = 0;
			$messageModel = $this->messageModel->getDataWhereArray($arrayWhere);
			foreach($messageModel as $message)
			{
				$countMessage++;
			}

			$dataHeader = [
				'cartModel' 		   => $cartModelArray,
				'cartSum' 			   => array_sum($cartSumArray),
				'cartSumString' 	   => $this->utilityModel->converterCurrencyIDR(array_sum($cartSumArray)),
				'cartCount' 		   => $this->cartModel->simpleReport('COUNT_ACTIVE_USER_CART', $usersClientModel->id),
				'countMessage' 		   => $countMessage++,
				'base_url_delete_cart' => 'client/cart/delete',
				'icon' 			       => 'icon_name.png'
			];
		}
		
		return $dataHeader;
	}

	public function dataFooterClient()
	{
        $dataFooter = [
            'icon' => 'icon_light.png'
		];
		
		return $dataFooter;
	}

	public function transactionStatus($status) 
	{
		if($status == "N")
			return "Menunggu";
		else return "Sudah";
	}

	public function messageTo($messageTo) 
	{
		if($messageTo == "ADO")
			return "Admin Operator";
		else return $messageTo;
	}

	public function createDefaultAdmin(){

		if($this->usersAdminModel->simpleReport('COUNT_DATA') == 0)
		{
			$data = array(
				'user_role'    => 'ADM',
				'name' 		   => 'Admin Master',
				'email' 	   => 'admin@email.com',
				'sex' 	   	   => 'L',
				'birthday' 	   => $this->utilityModel->sysDate('DATE_TIME'),
				'address' 	   => 'Admin ini digenerate oleh sistem, saat Aplikasi pertama kali di Install sebagai Admin Master.',
				'photo_profile'=> 'admin_photo.png',
				'password'     => $this->utilityModel->setDefaultPasswordUserAdmin(),
				'created_date' => $this->utilityModel->sysDate('DATE_TIME'),
				'created_by'   => 'SYSTEM'
				);
	
			$this->usersAdminModel->insertData($data);
		}
	}
}