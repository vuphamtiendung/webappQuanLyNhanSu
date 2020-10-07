<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model 
{
	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDataToMysql($ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang)
	{
		// Xử lý thông tin nhận về và upload vào mySql.
		// tạo mảng dữ liệu.
		$dulieu = array(
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->insert('nhan_vien', $dulieu);
		// trả về 1 giá trị chính là id của phần tử.
		return $this->db->insert_id();
	}

	// Lấy dữ liệu
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function getDataByID($key)
	{
		$this->db->select('*');
		$this->db->where('id', $key);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array(); // lấy về dữ liệu dạng mảng.
		return $dulieu;
		
		//echo "<pre>";
		//var_dump($dulieu);
	}
	public function updateByID($id, $ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang)
	{
		// đóng gói toàn bộ dữ liệu
		$data = array(
			'id' => $id,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);

	}
	public function removeDataByID($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('nhan_vien');
	}
}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */