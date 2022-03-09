<?php 
/**
 * 
 */
class Kategori_m extends CI_Model
{
	
	function getkategori()
	{	//kategori gambar
		$this->db->select('*');
		$this->db->from('poto_kategori');
		$this->db->limit(4);
		$this->db->order_by('id_poto','desc');

		$query = $this->db->get();
		return $query;
	}

	function get()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori','desc');

		$query = $this->db->get();
		return $query;
	}
}