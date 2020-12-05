<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isClientNotLoginOrEndSession())
			return redirect('client/dashboard');
    }

    public function index()
	{
        $noTrx;
        $data  = '';
        $refNo = $this->input->post('ref_no');

        if(strlen($refNo) == 0)
        {
            if($this->input->post('id_detail') == 0)
            {
                $messageModel = new stdClass;
                $messageModel->id               = '';
                $messageModel->subject          = '';
                $messageModel->body             = '';
                $messageModel->label_attachment = 'Lampiran';
                $messageModel->attachment       = 'assets/images/images_message/message_attachment.jpg'; 
                $messageModel->state            = ''; 

                $data = [
                    'title'        => 'Kirim Pesan',
                    'subTitle'     => 'Hubungi Kami',
                    'messageModel' => $messageModel,
                    'refNo'        => '',
                    'base_url'     => 'client/contact/save'
                ];
            }else{
                $messageModel = $this->messageModel->getDataWhere('id', $this->input->post('id_detail'));
                if($messageModel->read_by == null && $messageModel->message_to == $this->session->userdata('client_data')->email)
                {
                    $data = array(
                        'read_by'   => $this->session->userdata('client_data')->email,
                        'read_date' => $this->utilityModel->sysDate('DATE_TIME')
                        );
            
                    $this->messageModel->updateData($messageModel->id, $data);
                }

                $messageModel    = $this->messageModel->getDataWhere('id', $this->input->post('id_detail'));
                $newMessageModel = new stdClass;
                $newMessageModel->id               = $messageModel->id;
                $newMessageModel->subject          = $messageModel->subject;
                $newMessageModel->body             = $messageModel->body;
                $newMessageModel->label_attachment = 'Lampiran';

                if(empty($messageModel->attachment))
                    $newMessageModel->attachment  = '';
                else $newMessageModel->attachment = 'assets/images/images_message/'.$messageModel->attachment;

                $newMessageModel->state           = '';

                $title;
                if($messageModel->message_to == $this->session->userdata('client_data')->email)
                    $title = 'Pesan ini dibuat oleh '.$messageModel->message_from.' - Admin, pada Tanggal '.$this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageModel->created_date);
                else $title = 'Pesan ini Anda buat pada Tanggal '.$this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageModel->created_date);
                
                if($messageModel->read_by == '')
                    $subTitle = 'Pesan ini belum dibaca';
                else $subTitle = 'Pesan ini sudah dibaca oleh '.$messageModel->read_by.' pada tanggal '.$this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageModel->read_date);;

                $data = [
                    'title'        => $title,
                    'subTitle'     => $subTitle,
                    'messageModel' => $newMessageModel,
                    'refNo'        => '',
                    'base_url'     => 'client/contact/delete'
                ];
            }
        }else{
            $trxState = explode('|', $refNo);
            $state = trim($trxState[0], ' ');
            $newRefNo = trim($trxState[1], ' ');
        
            $messageModel = new stdClass;
            $messageModel->id   = '';
            $messageModel->body = '';
            if($state == 'NO_PAY')
            {
                $messageModel->subject          = 'Kirim Bukti Pembayaran dengan NO REF '.$newRefNo;
                $messageModel->label_attachment = 'Lampiran Gambar Bukti Pembayaran';
                $messageModel->attachment       = 'assets/images/images_message/payment_attachment.jpg';
                $noTrx = '';
            }else{
                $messageModel->subject          = 'Kirim Bukti Barang Sampai dengan NO REF '.$newRefNo;
                $messageModel->label_attachment = 'Lampiran Gambar Bukti Barang Sampai';
                $messageModel->attachment       = 'assets/images/images_message/receive_attachment.jpg'; 
                $noTrx = $newRefNo;
            }
            $messageModel->state = 'NO_EMPTY'; 

            $data = [
                'title'        => 'Kirim Pesan',
                'subTitle'     => 'Hubungi Kami',
                'messageModel' => $messageModel,
                'refNo'        => $noTrx,
                'base_url'     => 'client/contact/save'
			];
        }

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
        $this->load->view('client/contact/form', $data);
        $this->load->view('client/contact/side');
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function data()
	{
        $inOutMessage = $this->input->post('id_message');

        $messageModelArray = array();

        if($inOutMessage == 'OUT_MESSAGE')
            $messageModel = $this->messageModel->getDataWhereAll('message_from', $this->session->userdata('client_data')->email);
        else $messageModel = $this->messageModel->getDataWhereAll('message_to', $this->session->userdata('client_data')->email);

        foreach($messageModel as $message)
        {
            $newMessageModel = new stdClass;
            $newMessageModel->id                = $message->id;

            if($inOutMessage == 'OUT_MESSAGE')
                $newMessageModel->message_from      = $message->message_from;
            else $newMessageModel->message_from     = $message->message_from.' - Admin';

            $newMessageModel->message_to        = $message->message_to;
            $newMessageModel->message_to_string = $this->utilityModel->messageTo($message->message_to);
            $newMessageModel->subject           = $message->subject;
            $newMessageModel->created_date      = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $message->created_date);
            $newMessageModel->read_by           = $this->utilityModel->checkParamIsEmpty('STRING', $message->read_by);
            $newMessageModel->read_date         = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $message->read_date);
            $newMessageModel->inOut             = $inOutMessage;

            array_push($messageModelArray, $newMessageModel);
        }

		$data = [
            'messageModel'  => $messageModelArray,
            'inOutMessage' => $inOutMessage
        ];

        $this->load->view('client/header', $this->utilityModel->dataHeaderCart());
        $this->load->view('client/contact/data', $data);
		$this->load->view('client/footer', $this->utilityModel->dataFooterClient());
    }

    public function save()
	{
        $subject = $this->input->post('subject');
        $body    = $this->input->post('body');
        $refNo   = $this->input->post('refNo');

        echo $refNo;

        $return;
        
        if($_FILES['attachment']['name'] == '')
		{
            $data = array(
                'message_from' => $this->session->userdata('client_data')->email,
                'message_to'   => 'ADO',
                'subject' 	   => $subject,
                'body' 	       => $body,
                'created_date' => $this->utilityModel->sysDate('DATE_TIME')
            );

            $this->messageModel->insertData($data);
            $return = 'client/contact';
        }else{
            $this->load->helper('string');
            $randomName = random_string('alnum', 64);

            $config['file_name']     = $randomName;
            $config['upload_path']   = FCPATH.'assets\images\images_message';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            $imageNameBeforeUploadImage = $this->upload->data('file_name');

            $data = array(
                'message_from' => $this->session->userdata('client_data')->email,
                'message_to'   => 'ADO',
                'subject' 	   => $subject,
                'attachment'   => $imageNameBeforeUploadImage,
                'body' 	       => $body,
                'created_date' => $this->utilityModel->sysDate('DATE_TIME')
            );

            $this->messageModel->insertData($data);

            if(!$this->upload->do_upload('attachment'))
			    $message = $this->upload->display_errors();
            else 
            {
                $data = array(
                    'attachment' => $this->upload->data('file_name')
                    );

                $newMessageModel = $this->messageModel->getDataWhere('attachment', $imageNameBeforeUploadImage);

                $this->messageModel->updateData($newMessageModel->id, $data);
            }

            if($refNo != 0){
                $transactionModel = $this->transactionModel->getDataWhere('ref_no', $refNo);
                if($transactionModel->is_received == 'N'){
                    $data = array(
                        'is_received'   => 'Y',
                        'received_date' => $this->utilityModel->sysDate('DATE_TIME')
                        );
                    $this->transactionModel->updateData($transactionModel->id, $data);
                }
            }

            $return = 'client/checkout';
        }

        return redirect($return);
    }

    public function delete()
	{
		$id = $this->input->post('id_delete');

		$messageModel = $this->messageModel->getDataWhere('id', $id);
        $this->messageModel->deleteData($id);
        
        if(!empty($messageModel->attachment)){
            $path = FCPATH.'assets\images\images_message\\';
		    unlink($path.$messageModel->attachment);
        }
        
		return redirect('client/contact/data');
	}
}