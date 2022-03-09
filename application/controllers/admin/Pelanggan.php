<?php
/**
 * 
 */
class Pelanggan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
		$this->load->model('admin/Pelanggan_model');
		if($this->Pelanggan_m->is_role('level') == null){
			redirect('auth');
		}
	}

	function index()
	{
		//mendapatkan data pelanggan
		$data['pelanggan'] = $this->Pelanggan_model->get()->result();
		$data['title'] = "Admin - Pelanggan";
		$data['subtitle'] = "Pelanggan";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/pelanggan/index',$data);
		$this->load->view('admin/temp/footer');
	}

	function tambah()
	{
		//form tambah pelanggan
		$data['title'] = "Admin -Tambah Pelanggan";
		$data['subtitle'] = "Tambah Pelanggan";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/pelanggan/tambah-pelanggan',$data);
		$this->load->view('admin/temp/footer');
	}

	function proses_tambah()
	{
		//proses tambah pelanggan
		$tambah = $this->Pelanggan_model->post();
		if($tambah)
		{
			$this->session->set_flashdata('pesan','Pelanggan Berhasil Ditambahkan');
			redirect('admin/pelanggan');
		}else{
			$this->session->set_flashdata('eror','Pelanggan Gagal Ditambahkan');
			redirect('admin/pelanggan');
		}
	}

	function edit($id_pelanggan)
	{
		//mendaptkan id pelanggan yang akan diubah
		$data['pelanggan'] = $this->Pelanggan_model->editpelanggan($id_pelanggan)->row();
		$data['title'] = "Admin -Edit Pelanggan";
		$data['subtitle'] = "Edit Pelanggan";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/pelanggan/edit-pelanggan',$data);
		$this->load->view('admin/temp/footer');

	}

	function proses_edit($id_pelanggan)
	{
		//proses edit pelanggan
		$edit = $this->Pelanggan_model->editprosespelanggan($id_pelanggan);
		if($edit)
		{
			$this->session->set_flashdata('pesan','Pelanggan Berhasil Diubah');
			redirect('admin/pelanggan');
		}else{
			$this->session->set_flashdata('eror','Pelanggan Gagal Diubah');
			redirect('admin/pelanggan');
		}

	}

	function proses_hapus($id_pelanggan)
	{
		//proses hapus pelanggan
		$hapus = $this->Pelanggan_model->hapuspelanggan($id_pelanggan);
		if($hapus)
		{
			$this->session->set_flashdata('pesan','Pelanggan Berhasil Dihapus');
			redirect('admin/pelanggan');
		}else{
			$this->session->set_flashdata('eror','Pelanggan Gagal Dihapus');
			redirect('admin/pelanggan');
		}
	}

	function pelanggan_baru()
	{
		//mendapatkan data pelanggan baru dan yang tidak aktif
		$data['pelanggan'] = $this->Pelanggan_model->getpelangganbaru()->result();
		$data['title'] = "Admin - Pelanggan Baru";
		$data['subtitle'] = "Pelanggan Baru";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/pelanggan/pelanggan-baru',$data);
		$this->load->view('admin/temp/footer');
	}

	function edit_pelanggan_nonaktif($id_pelanggan)
	{
		//mendapatkan data pelanggan baru dan yang tidak aktif
		$data['pelanggan'] = $this->Pelanggan_model->editpelangganbaru($id_pelanggan)->row();
		$data['title'] = "Admin -Edit Pelanggan Nonaktif";
		$data['subtitle'] = "Edit Pelanggan Nonaktif";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/pelanggan/edit-pelanggan-nonaktif',$data);
		$this->load->view('admin/temp/footer');
	}

	function edit_status_pelanggan_nonaktif($id_pelanggan)
	{
		//proses update status pelanggan nonaktif
		$update = $this->Pelanggan_model->updatepelanggannonaktif($id_pelanggan);
		if($update)
		{
			$this->session->set_flashdata('pesan','Pelanggan Berhasil Diaktifkan');
			redirect('admin/pelanggan');
		}else{
			$this->session->set_flashdata('eror','Pelanggan Gagal Diaktifkan');
			redirect('admin/pelanggan');
		}
	}

}