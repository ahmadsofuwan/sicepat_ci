<?php

class Sicepat extends CI_Controller {


	public function index()
	{
		
		$this->Input_Gabungan();
	}

	public function Input_Gabungan()
	{
		$data['title']='Input Gabungan';
		$data['KeyCode']= date("mdhs");
		$this->load->view('header', $data, FALSE);
		$this->load->view('Input/index.php',$data);
		$this->load->view('footer');
	}
	public function Input_Paket()
	{
		$data['title']='Input Paket'; 
		$data['KeyCode']=date("mdhs");
		$this->load->view('header', $data, FALSE);
		$this->load->view('Input/index',$data);
		$this->load->view('footer');
	}

	public function Show_gabungan()
	{
		$data['title']='Show gabungan'; 
		$this->load->view('header', $data, FALSE);
		$this->load->view('Show/index.php');
		$this->load->view('footer');
	}
	public function Show_peket($a)
	{	
		$data['title']='Show paket'; 
		$this->load->view('header', $data, FALSE);
		$this->load->view('Show/index.php');
		$this->load->view('footer');
	}
	public function edit($id='',$dba='')
	{
		$this->load->database();
		$data['title']='Edit_'.$dba; 
		$this->load->model('Output_models');
		$res['datanya'] = $this->Output_models->edit($id,$dba)->result();
		$this->load->view('header', $data);
		$this->load->view('Edit/index.php',$res);
		$this->load->view('footer');
	}




 } ?>