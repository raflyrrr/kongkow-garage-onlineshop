<?php
/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_m');
		$this->load->model('Produk_m');
		$this->load->model('Pelanggan_m');
	}

	function index()
	{	
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$data['produk']= $this->Produk_m->getproduk()->result();
		$data['kategori'] = $this->Kategori_m->get()->result();
		$data['kategori_gambar'] = $this->Kategori_m->getkategori()->result();
		$this->load->view('home',$data);
	}

	function tentang()
	{
		$data['kategori'] = $this->Kategori_m->get()->result();
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$this->load->view('tentang-kami',$data);
	}

	function kontak()
	{	
		$data['kategori'] = $this->Kategori_m->get()->result();
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$this->load->view('kontak-kami',$data);
	}

	function register()
	{
		$this->load->view('register');
	}
}