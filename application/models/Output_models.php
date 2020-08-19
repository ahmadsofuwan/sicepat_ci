<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class  Output_models extends CI_Model
{
	
	public function getcode($code)
	{
		$this->db->where('code',$code["code"]);
		$this->db->select('file');
		$query = $this->db->get('file_sementara');
		if ($query) {
			return $query->result();
		}
	}
	public function simpan($u)
	{
		
		$arr = $this->db->query("SELECT file FROM file_sementara WHERE code =".$u["code"])->result();

		$temp = array();
			foreach ($arr as $key => $value) {
				array_push($temp, $value->file);
			}

			$temp = join("\r\n", $temp);
			$data = array(
				'namafile'=> $u["namafile"],
				'file'=> $temp,
				'tgl'=>$u["tgl"]
			);
		
		return $this->db->insert('file_'.$u['db'], $data);
	}
	public function cekname($tr)
	{	
		return $this->db->get_where('file_'.$tr['db'],array('namafile'=>$tr['namafile'],'tgl'=>$tr['tgl']))->result();
		
		
	}
	public function show($y)
	{
		return $this->db->get_where('file_'.$y['db'],array('tgl' =>$y['tgl']))->result();

	}












}
 ?>