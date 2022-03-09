<?php
/**
 * 
 */
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
		$this->load->model('admin/Transaksi_m');
		if($this->Pelanggan_m->is_role('level') == null){
			redirect('auth');
		}
	}
	
	function index()
	{

		$data['title'] ="Pesanan";
		$data['subtitle'] = "Home";
		//menampilkan data pelanggan baru daftar maupun pelanggan status nonaktif
		$data['pelanggan'] = $this->Pelanggan_m->get_customer()->result();
		//menampilkan data yang sudah checkout tapi belumbayar
		$data['belumbayar'] = $this->Transaksi_m->getnotpayment()->result();

		//menampilkan data yang sudah checkout dan sdah konfirmasi
		$data['sudahbayar'] = $this->Transaksi_m->getpayment()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/temp/footer');
	}
}