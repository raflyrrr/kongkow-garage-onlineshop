<?php
/**
 * 
 */
class Transaksi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
		$this->load->model('Produk_m');
		$this->load->model('Kategori_m');
		$this->load->model('Transaksi_m');
	}

	function konfirmasi($invoice)
	{
		if($this->Pelanggan_m->is_role('id_pelanggan') == null){
			redirect('auth');
		}
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$data['kategori'] = $this->Kategori_m->get()->result();
		
		//mengambil data pesanan yang belum konfirmasi sesuai pelanggan yang login
		$data['belumbayar'] =$this->Transaksi_m->getnotpayment($invoice)->result();
		$this->load->view('konfirmasi-pesanan',$data);

	}

	function cara_bayar()
	{
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$data['kategori'] = $this->Kategori_m->get()->result();
		$this->load->view('cara-bayar',$data);
	}

	function proses_konfirmasi()
	{
		$this->Transaksi_m->process_confirmation();
		redirect('/');
	}
}