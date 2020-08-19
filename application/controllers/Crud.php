<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

// comen
	}

	public function index()
	{
		echo "pilih perintah crud";
	}
	public function tambah()
	{
		header('Content-Type: application/json');
		$data= $this->input->post('data');
		$code= $this->input->post('code');
		$this->load->model('Input_models');
		if ($this->Input_models->tambah($data,$code)) {
		 	$respont = array('responce' => 'success','massage' => 'data berhasil di simpan');
		 }else{
		 	$respont = array('responce' => 'error', 'massage' => 'data gagal di simpan');
		 }
		echo json_encode($respont);
	}

	public function getcode()
	{
		$this->load->model('Output_models');
		$ajax_data = $this->input->post();
		if ($this->input->is_ajax_request()) {
			$respont = $this->Output_models->getcode($ajax_data);
		}else{
			$respont = array(
				'responce' => 'error',
				'pesan'=>'gagal');
			
		}
		echo json_encode($respont);
	}
	public function simpan()
	{
		$this->load->model('Output_models');
		$ajax_data = $this->input->post();
		if ($this->input->is_ajax_request()) {
			 $req = $this->Output_models->simpan($ajax_data);
			if ($req) {
			 	$respont = array(
				'responce' => 'success',
				'pesan'=>'berhasil');
			 }else{
			 	$respont = array(
				'responce' => 'error',
				'pesan'=>'gagal menyimpan');
			 }
			
		}
	echo json_encode($respont);
	}

	public function ceknama()
	{
		$this->load->model('Output_models');
		$ajax_data = $this->input->post();
		$qr = $this->Output_models->cekname($ajax_data);
		echo json_encode($qr);
	}
	public function Show()
	{
		$ajax_data = $this->input->post();
		$this->load->model('Output_models');
		$res = $this->Output_models->show($ajax_data);
		echo json_encode($res);

	}


















}?>