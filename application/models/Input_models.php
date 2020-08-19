<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_models extends CI_Model {

	public function index()
	{
			echo"connect";
	}
	public function s()
	{
		return json_encode(array(
				'kode' => '1',
				'msg' => 'berhasil di simpan'
			));
	}
	public function tambah($data,$code)
	{
		$object=array(	
			'code'=> $code,
			'file'=> $data
		);
		return $this->db->insert('file_sementara', $object);
	}
	public function simpan($code,$namadb,$namafile,$tgl)
	{
		// $select = $this->db->query('SELECT `file` FROM `file_sementara` WHERE code="$code"');
		// $query->result() as $row;
		// $object =array(
		// 	'namafile'=>$namafile,
		// 	'file'=> $row,
		// 	'tgl'=>$tgl
		// );
		// $this->db->insert('file_$namadb', $object);
		// return json_decode($row);
	}

}

/* End of file Input_models.php */
/* Location: ./application/models/Input_models.php */


 ?>