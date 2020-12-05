<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isClientNotLoginOrEndSession())
            return redirect('client/dashboard');
    }
    
    public function index()
	{
        $transactionModelArray = array();
        $transactionModel = $this->transactionModel->getDataWhereAll('id_user', $this->session->userdata('client_data')->id);
        foreach($transactionModel as $transaction)
        {
            $newTransactionModel = new stdClass;
            $newTransactionModel->id                   = $transaction->id;
            $newTransactionModel->id_user              = $transaction->id_user;
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

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/checkout/data', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function transaction()
	{
        $data = [
            'usersClientModel' => $this->usersClientModel->getDataWhere('id', $this->session->userdata('client_data')->id)
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/checkout/view', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function save()
	{
        $dataHeader = $this->utilityModel->dataHeaderCart();
        $refNo = date('dmY').mt_rand();

        $data = array(
			'id_user'          => $this->session->userdata('client_data')->id,
			'ref_no' 	       => $refNo,
			'total_payment'    => $dataHeader['cartSum'],
            'is_payment'       => 'N',
            'is_received'      => 'N',
            'transaction_date' => $this->utilityModel->sysDate('DATE_TIME')
            );

        $this->transactionModel->insertData($data);

        $transactionModel = $this->transactionModel->getDataWhere('ref_no', $refNo);

        $this->detailTransactionModel->insertData($transactionModel->id, $dataHeader);

        $data = array(
			'state_cart' => 'Y'
            );
        
        $this->cartModel->updateClearCart($this->session->userdata('client_data')->id, $data);
        
        return redirect('client/checkout');
    }

    public function detail()
	{
        $transactionModel = $this->transactionModel->getDataWhere('ref_no', $this->input->post('ref_no'));
        
        $detailTransactionModelArray = array();
        $detailTransactionModel = $this->detailTransactionModel->getDataWhereAll('id_trx_hist', $transactionModel->id);
        foreach($detailTransactionModel as $detailTransaction)
        {
            $newDetailTransaction = new stdClass;
            $newDetailTransaction->id               = $detailTransaction->id;
            $newDetailTransaction->id_trx_hist      = $detailTransaction->id_trx_hist;
            $newDetailTransaction->id_toy           = $detailTransaction->id_toy;
            $newDetailTransaction->toy_name         = $detailTransaction->toy_name;
            $newDetailTransaction->toy_price        = $detailTransaction->toy_price;
            $newDetailTransaction->toy_price_string = $this->utilityModel->converterCurrencyIDR($detailTransaction->toy_price);
            $newDetailTransaction->quantity         = $detailTransaction->quantity;
            $newDetailTransaction->sub_total        = $detailTransaction->sub_total;
            $newDetailTransaction->sub_total_string = $this->utilityModel->converterCurrencyIDR($detailTransaction->sub_total);

            array_push($detailTransactionModelArray, $newDetailTransaction);
        }

        $buttonName = '';
        $refNo = '';
        if($transactionModel->is_payment == 'N' && $transactionModel->is_received == 'N')
        {
            $refNo = 'NO_PAY | '.$transactionModel->ref_no;
            $buttonName = 'Kirim Bukti Pembayaran';
        }else if($transactionModel->is_payment == 'Y' && $transactionModel->is_received == 'N')
        {
            $refNo = 'NO_REC | '.$transactionModel->ref_no;
            $buttonName = 'Kirim Bukti Barang Sampai';
        }
        

        $data = [
            'detailTransactionModel' => $detailTransactionModelArray,
            'is_payment'             => $transactionModel->is_payment,
            'is_received'            => $transactionModel->is_received,
            'ref_no'                 => $refNo,
            'button_submit_name'     => $buttonName,
            'cartSumString'          => $this->utilityModel->converterCurrencyIDR($transactionModel->total_payment)
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
		$this->load->view('client/checkout/detail', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }
}