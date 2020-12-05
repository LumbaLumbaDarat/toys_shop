<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isNotLoginOrEndSession())
			return redirect('admin/login');
	}

	public function index()
	{
		$simpleReportArray = array();
		$simpleReportModel = new stdClass;
		$simpleReportModel->name_report        = 'User Admin';
		$simpleReportModel->icon               = 'users';
		$simpleReportModel->count_data         = $this->usersAdminModel->simpleReport('COUNT_DATA');
		$simpleReportModel->count_today_data   = $this->usersAdminModel->simpleReport('COUNT_TODAY_DATA');
		$simpleReportModel->last_inserted_data = $this->usersAdminModel->simpleReport('LAST_INSERTED_DATE');

		array_push($simpleReportArray, $simpleReportModel);

		$simpleReportModel = new stdClass;
		$simpleReportModel->name_report        = 'Kategori Mainan';
		$simpleReportModel->icon               = 'tag';
		$simpleReportModel->count_data         = $this->toysCategoryModel->simpleReport('COUNT_DATA');
		$simpleReportModel->count_today_data   = $this->toysCategoryModel->simpleReport('COUNT_TODAY_DATA');
		$simpleReportModel->last_inserted_data = $this->toysCategoryModel->simpleReport('LAST_INSERTED_DATE');

		array_push($simpleReportArray, $simpleReportModel);

		$simpleReportModel = new stdClass;
		$simpleReportModel->name_report        = 'Mainan';
		$simpleReportModel->icon               = 'gift';
		$simpleReportModel->count_data         = $this->toysModel->simpleReport('COUNT_DATA');
		$simpleReportModel->count_today_data   = $this->toysModel->simpleReport('COUNT_TODAY_DATA');
		$simpleReportModel->last_inserted_data = $this->toysModel->simpleReport('LAST_INSERTED_DATE');

		array_push($simpleReportArray, $simpleReportModel);

		$dataHeader = $this->utilityModel->dataHeader('');
		$data = [
			'simpleReportModel'    		  => $simpleReportArray,
			'lastInquiry'    			  => $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $this->utilityModel->sysDate('DATE_TIME'))
		];

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');
	}
}
