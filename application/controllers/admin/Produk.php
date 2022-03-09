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
		$this->load->model('admin/Produk_m');
		$this->load->model('admin/Kategori_m');
		if($this->Pelanggan_m->is_role('level') == null){
			redirect('auth');
		}
	}

	function index()
	{
		$data['title'] = "Admin - Produk";
		$data['subtitle'] = "Data Produk";
		//mendapatkan data produk
		$data['produk'] = $this->Produk_m->get()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/produk/index',$data);
		$this->load->view('admin/temp/footer');
	}

	function tambah()
	{
		///form tambah produk
		$data['title'] = "Admin -Tambah Produk";
		$data['subtitle'] = "Tambah Produk";
		$data['kategori'] = $this->Kategori_m->get()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/produk/tambah-produk',$data);
		$this->load->view('admin/temp/footer');

	}

	function proses_tambah()
	{
		//proses tambah produk
		$tambah = $this->Produk_m->post();
		if($tambah)
		{
			$this->session->set_flashdata('pesan','Produk Berhasil Ditambahkan');
			redirect('admin/produk');
		}else{
			$this->session->set_flashdata('eror','Produk Gagal Ditambahkan');
			redirect('admin/produk');
		}
	}

	function edit($id_produk)
	{
		$data['title'] = "Admin - Edit Produk";
		$data['subtitle'] = "Edit Produk";
		//mendapatkan id data produk yang akan di edit
		$data['produk'] = $this->Produk_m->getdata($id_produk)->row();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/produk/edit-produk',$data);
		$this->load->view('admin/temp/footer');
	}

	function proses_edit($id_produk)
	{
		//proses edit produk
		$edit = $this->Produk_m->updateproduk($id_produk);
		if($edit)
		{
			$this->session->set_flashdata('pesan','Produk Berhasil Ditambahkan');
			redirect('admin/produk');
		}else{
			$this->session->set_flashdata('eror','Produk Gagal Ditambahkan');
			redirect('admin/produk');
		}
	}
	
	function proses_hapus($id_produk)
	{
		$hapus = $this->Produk_m->hapusproduk($id_produk);
		if($hapus)
		{
			$this->session->set_flashdata('pesan','Produk Berhasil Dihapus');
			redirect('admin/produk');
		}else{
			$this->session->set_flashdata('eror','Produk Gagal Dihapus');
			redirect('admin/produk');
		}
	}

	function unpublish()
	{
		$data['title'] = "Admin - Produk Unpublish";
		$data['subtitle'] = "Data Produk Unpublish";
		//mendapatkan data produk unpublish
		$data['produk'] = $this->Produk_m->getunpublish()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/produk/produk-unpublish',$data);
		$this->load->view('admin/temp/footer');
	}

	function edit_status($id_produk)
	{
		$data['title'] = "Admin - Edit Status Produk";
		$data['subtitle'] = "Edit Status Produk";
		//mendapatkan id data produk yang akan di edit status produknya
		$data['produk'] = $this->Produk_m->getdataproduk($id_produk)->row();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/produk/edit-status-produk',$data);
		$this->load->view('admin/temp/footer');
	}

	function edit_status_produk($id_produk)
	{
		//proses edit status produk dari unpublish ke pblish
		$editstatus = $this->Produk_m->editstatusproduk($id_produk);
		if($editstatus)
		{
			$this->session->set_flashdata('pesan','Produk Berhasil Dipublish');
			redirect('admin/produk');
		}else{
			$this->session->set_flashdata('eror','Produk Gagal Dipublish');
			redirect('admin/produk');
		}
	}

	function tambah_stok()
	{
		$data['title'] = "Admin -Tambah Stok Produk";
		$data['subtitle'] = "Tambah Stok Produk";
		//mendapatkan data produk
		$data['produk'] = $this->Produk_m->get()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/produk/tambah-stok',$data);
		$this->load->view('admin/temp/footer');
	}

	function proses_tambah_stok()
	{
		//proses tambah stok
		$tambahstok = $this->Produk_m->tambahstokproduk();
		if($tambahstok)
		{
			$this->session->set_flashdata('pesan','Stok Produk Berhasil Ditambah');
			redirect('admin/produk');
		}else{
			$this->session->set_flashdata('eror','Stok Produk Gagal Ditambah');
			redirect('admin/produk');
		}
	}


}