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
		$this->load->model('admin/Transaksi_m');
		if($this->Pelanggan_m->is_role('level') == null){
			redirect('auth');
		}
	}

	function pembayaran_pesanan($invoice)
	{
		$data['title'] ="Admin - Pembayaran pesanan";
		$data['subtitle'] = "Pembayaran Pesanan";
		//menampilkan data yang sudah bayar dan menampilkan barang yag di belinya
		$data['lunas'] = $this->Transaksi_m->getfinishtransaction($invoice)->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/transaksi/pembayaran-lunas',$data);
		$this->load->view('admin/temp/footer');
	}

	function update_status_pesanan($invoice)
	{
		$update_status=$this->Transaksi_m->update_status($invoice);
		if($update_status)
		{
			$this->session->set_flashdata('updatestatus','Status pesanan sudah diubah');
			redirect('admin');
		}else{
			$this->session->set_flashdata('error','Status pesanan gagal diubah');
			redirect('admin');
		}
	}
}