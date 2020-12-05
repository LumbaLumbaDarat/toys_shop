<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->utilityModel->isNotLoginOrEndSession())
			return redirect('admin/login');
	}

    public function index()
	{
        $dataHeader = $this->utilityModel->dataHeader('Pesan');
        
        $arrayWhere = array(
            'message_to' => 'ADO',
            'read_by'    => null
        );

        $messageModelArrayNonRead = array();
        $messageModelNonRead = $this->messageModel->getDataWhereArray($arrayWhere);
        foreach($messageModelNonRead as $messageNonRead)
        {
            $newMessageModelNonRead = new stdClass;
            $newMessageModelNonRead->id           = $messageNonRead->id;
            $newMessageModelNonRead->message_from = $messageNonRead->message_from;
            $newMessageModelNonRead->subject      = $messageNonRead->subject;
            $newMessageModelNonRead->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageNonRead->created_date);

            array_push($messageModelArrayNonRead, $newMessageModelNonRead);
        }

        $arrayReadWhere = array(
            'message_to' => 'ADO',
            'read_by != ' => null
        );

        $messageModelArrayRead = array();
        $messageModelRead = $this->messageModel->getDataWhereArray($arrayReadWhere);
        foreach($messageModelRead as $messageRead)
        {
            $messageModelRead = new stdClass;
            $messageModelRead->id           = $messageRead->id;
            $messageModelRead->message_from = $messageRead->message_from;
            $messageModelRead->subject      = $messageRead->subject;
            $messageModelRead->body         = $messageRead->body;
            $messageModelRead->read_by      = $this->utilityModel->checkParamIsEmpty('STRING', $messageRead->read_by);
            $messageModelRead->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageRead->created_date);
            $messageModelRead->read_date    = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageRead->read_date);

            array_push($messageModelArrayRead, $messageModelRead);
        }

        $arraySendWhere = array(
            'message_from' => $this->session->userdata('user_data')->email
        );

        $messageModelArraySend = array();
        $messageModelSend = $this->messageModel->getDataWhereArray($arraySendWhere);
        foreach($messageModelSend as $messageSend)
        {
            $newMessageModelSend = new stdClass;
            $newMessageModelSend->id           = $messageSend->id;
            $newMessageModelSend->message_to   = $messageSend->message_to;
            $newMessageModelSend->subject      = $messageSend->subject;
            $newMessageModelSend->body         = $messageSend->body;
            $newMessageModelSend->read_by      = $this->utilityModel->checkParamIsEmpty('STRING', $messageSend->read_by);
            $newMessageModelSend->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageSend->created_date);
            $newMessageModelSend->read_date    = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageSend->read_date);

            array_push($messageModelArraySend, $newMessageModelSend);
        }

        $data = [
            'messageModelNonRead' => $messageModelArrayNonRead,
            'messageModelRead'    => $messageModelArrayRead,
            'messageModelSend'    => $messageModelArraySend
        ];

		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/message/data', $data);
		$this->load->view('admin/footer');
    }

    public function form()
	{
        $id = $this->input->post('id_detail');
		$data = "";
		if($id == 0)
		{
            $newMessageModel 		     = new stdClass;
            $newMessageModel->id         = '';
			$newMessageModel->message_to = '';
            $newMessageModel->subject    = '';
            $newMessageModel->attachment = 'message_attachment.jpg';
			
			$data = [
				'messageModel' => $newMessageModel,
				'base_url'     => "admin/message/save"
			];
		}else{
            $messageModel = $this->messageModel->getDataWhere('id', $id);

            $newMessageModel 		     = new stdClass;
            $newMessageModel->id         = $messageModel->id;
            $newMessageModel->message_to = $messageModel->message_from;
            $newMessageModel->subject    = $messageModel->subject;
            $newMessageModel->attachment = 'message_attachment.jpg';

			$data = [
				'messageModel' => $newMessageModel,
				'base_url'     => "admin/message/save"
			];
		}

		$dataHeader = $this->utilityModel->dataHeader('Kategori Mainan');
		
		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/message/form', $data);
		$this->load->view('admin/footer');
	}

    public function read()
	{
        $id = $this->input->post('id_detail');
        $messageModel = $this->messageModel->getDataWhere('id', $id);

        $dataHeader = $this->utilityModel->dataHeader('Pesan');
        
        if($messageModel->read_by == null && $messageModel->message_to == 'ADO')
        {
            $data = array(
                'read_by'   => $this->session->userdata('user_data')->email,
                'read_date' => $this->utilityModel->sysDate('DATE_TIME')
                );
    
            $this->messageModel->updateData($id, $data);
        }

        $newMessageModel = new stdClass;
        $newMessageModel->id           = $messageModel->id;

        if($messageModel->message_to == 'ADO')
            $messageTitle = 'Pesan ini dikirim oleh <strong>'.$messageModel->message_from.'</strong> pada Tanggal '.$this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageModel->created_date);
        else
            $messageTitle = 'Pesan ini dikirim kepada <strong>'.$messageModel->message_to.'</strong> pada Tanggal '.$this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageModel->created_date);

        $newMessageModel->message_from = $messageModel->message_from;
        $newMessageModel->message_to   = $messageModel->message_to;
        $newMessageModel->subject      = $messageModel->subject;
        $newMessageModel->body         = $messageModel->body;
        $newMessageModel->attachment   = $messageModel->attachment;
        $newMessageModel->created_date = $this->utilityModel->converterMonthNameForDateTime('DATE_TIME', $messageModel->created_date);

        $data = [
            'messageModel' => $newMessageModel,
            'messageTitle' => $messageTitle
        ];
        
		$this->load->view('admin/header', $dataHeader);
		$this->load->view('admin/message/view', $data);
		$this->load->view('admin/footer');
    }

    public function save()
	{
        $messageTo = $this->input->post('message_to');
        $subject   = $this->input->post('subject');
        $body      = $this->input->post('body');
        $return;
        
        if($_FILES['attachment']['name'] == '')
		{
            $data = array(
                'message_from' => $this->session->userdata('user_data')->email,
                'message_to'   => $messageTo,
                'subject' 	   => $subject,
                'body' 	       => $body,
                'created_date' => $this->utilityModel->sysDate('DATE_TIME')
            );

            $this->messageModel->insertData($data);
            $return = 'admin/message';
        }else{
            $this->load->helper('string');
            $randomName = random_string('alnum', 64);

            $config['file_name']     = $randomName;
            $config['upload_path']   = FCPATH.'assets\images\images_message';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            $imageNameBeforeUploadImage = $this->upload->data('file_name');

            $data = array(
                'message_from' => $this->session->userdata('user_data')->email,
                'message_to'   => $messageTo,
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
            $return = 'admin/message';
        }

        $message = '<strong>Berhasil mengirim Pesan !</strong>'.
			'<br>'.
			'Pesan dikirim kepada, <strong>'.$messageTo.'</strong> !';

		$this->session->set_flashdata('message', $message);
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
        
        if($messageModel->message_to == 'ADO')
            $message = '<strong>Penghapusan Data Pesan berhasil dilakukan !</strong>'.
			'<br>'.
            'Data Pesan dengan Subjek, <strong>'.$messageModel->subject.'</strong> dari <strong>'.$messageModel->message_from.'</strong> berhasil dihapus !';
        else $message = '<strong>Penghapusan Data Pesan berhasil dilakukan !</strong>'.
        '<br>'.
        'Data Pesan dengan Subjek, <strong>'.$messageModel->subject.'</strong> untuk <strong>'.$messageModel->message_to.'</strong> berhasil dihapus !';

		$this->session->set_flashdata('message', $message);
		return redirect('admin/message');
	}
}