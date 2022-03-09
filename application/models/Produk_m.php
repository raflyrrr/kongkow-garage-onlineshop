<?php
/**
 * 
 */
class Produk_m extends CI_Model
{
	
	function getproduk()
	{
		$status_produk = "publish";
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('status_produk',$status_produk);
		$this->db->order_by('id_produk','desc');

		$query = $this->db->get();
		return $query;
	}


	function getdetailproduk($slug_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('slug_produk',$slug_produk);

		$query = $this->db->get();
		return $query;
	}


	function getproduklimit()
	{
		$status_produk = "publish";
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('status_produk',$status_produk);
		$this->db->order_by('id_produk','desc');
		$this->db->limit(4);

		$query = $this->db->get();
		return $query;
	}

	function getprodukbykategori($slug_kategori)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('slug_kategori',$slug_kategori);
		$query = $this->db->get();
		return $query;
	}
}