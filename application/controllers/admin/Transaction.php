<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isNotLoginOrEndSession())
			return redirect('admin/login');
    }

    public function index()
	{
        $dataHeader = $this->utilityModel->dataHeader('Riwayat Transaksi');

        $transactionModelArray = array();
        $transactionModel = $this->transactionModel->getData()->result();
        foreach($transactionModel as $transaction)
        {
            $newTransactionModel = new stdClass;
            $newTransactionModel->id                   = $transaction->id;
            $newTransactionModel->id_user              = $transaction->id_user;

            $usersClient = $this->usersClientModel->getDataWhere('id', $transaction->id_user);

            $newTransactionModel->user_name            = $usersClient->name.' ( '.$usersClient->email.' )';
            $newTransactionModel->ref_no               = $transaction->ref_no;
            $newTransactionModel->total_payment        = $transaction->total_payment;
            $newTransactionModel->total_payment_string = $this->utilityModel->converterCurrencyIDR($transaction->total_payment);
            $newTransactionModel->is_payment           = $transaction->is_payment;
            $newTransactionModel->is_payment_string    = $this->utilityModel->transactionStatus($transaction->is_payment);
            $newTransactionModel->is_received          = $transaction->is_received;
            $newTransactionModel->is_received_string   = $this->utilityModel->transactionStatus($transaction->is_received);;
            $newTransactionModel->transaction_date     = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $transaction->transaction_date);
            $newTransactionModel->payment_date         = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $transaction->payment_date);
            $newTransactionModel->received_date        = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $transaction->received_date);

            array_push($transactionModelArray, $newTransactionModel);
        }

        $data = [
            'transactionModel' => $transactionModelArray
        ];

        $this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/transaction/data', $data);
		$this->load->view('admin/footer');
    }

    public function update()
	{
        $id = $this->input->post('id_update');
        $transactionModel = $this->transactionModel->getDataWhere('id', $id);
        
        $data = array(
			'is_payment'   => 'Y',
			'payment_date' => $this->utilityModel->sysDate('DATE_TIME')
			);
        $this->transactionModel->updateData($id, $data);
        
        $usersClientModel = $this->usersClientModel->getDataWhere('id', $transactionModel->id_user);
        $dataMessage = array(
            'message_from' => $this->session->userdata('user_data')->email,
            'message_to'   => $usersClientModel->email,
            'subject' 	   => 'Pembayaran dengan No. Transaksi '.$transactionModel->ref_no,
            'body' 	       => 'Pembayaran dengan No. Transaksi '.$transactionModel->ref_no.' Sudah diterima, dan Pengiriman Barang akan dilakukan paling lambar 1 x 24 Jam, Terima Kasih.',
            'created_date' => $this->utilityModel->sysDate('DATE_TIME')
        );
        $this->messageModel->insertData($dataMessage);
        
		$message = '<strong>Perubahan Data Transaksi berhasil dilakukan !</strong>'.
			'<br>'.
			'Status Pembayaran Transaksi dengan No. Transaksi <strong>'.$transactionModel->ref_no.'</strong> berhasil diubah !';

		$this->session->set_flashdata('message', $message);
        return redirect('admin/transaction');
	}
}