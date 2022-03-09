<?php
/**
 * 
 */
class Produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
		$this->load->model('Produk_m');
		$this->load->model('Kategori_m');
	}
	
	public function detail($slug_produk)
	{
		//menampilkan kategori di navbar
		$data['kategori'] = $this->Kategori_m->get()->result();
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		//menampilkan semua produk
		$data['produk'] =$this->Produk_m->getproduk()->result();
		//menampilkan detail produk
		$data['detail'] = $this->Produk_m->getdetailproduk($slug_produk)->row();
		$this->load->view('detail-produk',$data);
	}

	public function produk_kategori($slug_kategori)
	{	
		//menampilkan kategori di navbar
		$data['kategori'] = $this->Kategori_m->get()->result();
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		//menampilkan produk dengan kategori tertentu
		$data['produk'] = $this->Produk_m->getprodukbykategori($slug_kategori)->result();
		$this->load->view('produk-kategori',$data);
	}
}