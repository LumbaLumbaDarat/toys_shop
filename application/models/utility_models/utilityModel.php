<?php 

class UtilityModel extends CI_model{

    public function checkParamIsEmpty($data)
	{
		if(empty($data) || $data == null || $data == '')
			return $data = "Tidak Ada";
		else return $data;
	}
}