<?php
/**
 * 
 */
class Kategori extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
		$this->load->model('admin/Kategori_m');
		if($this->Pelanggan_m->is_role('level') == null)
		{
			redirect('auth');
		}
	}

	function index()
	{
		//mendapatkan data kategori
		$data['kategori'] = $this->Kategori_m->get()->result();
		$data['title'] = "Admin - Kategori";
		$data['subtitle'] = "Kategori";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/kategori/index',$data);
		$this->load->view('admin/temp/footer');
	}

	function tambah()
	{
		///form tambah kategori
		$data['title'] = "Admin - Tambah Kategori";
		$data['subtitle'] = "Tambah Kategori";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/kategori/tambah-kategori',$data);
		$this->load->view('admin/temp/footer');
	}

	function proses_tambah()
	{
		//proses tambah kategori

		$tambah = $this->Kategori_m->post();
		if($tambah)
		{
			$this->session->set_flashdata('pesan','Kategori Berhasil Ditambahkan');
			redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('eror','Kategori Gagal Ditambahkan');
			redirect('admin/kategori');
		}
	}

	function edit($id_kategori)
	{
		//mendapatkan data kategori yang akan di edit
		$data['kategori'] = $this->Kategori_m->editkategori($id_kategori)->row();
		$data['title'] = "Admin - Edit Kategori";
		$data['subtitle'] = "Edit Kategori";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/kategori/edit-kategori',$data);
		$this->load->view('admin/temp/footer');

	}

	function proses_edit($id_kategori)
	{
		//proses edit kategori
		$edit = $this->Kategori_m->updatekategori($id_kategori);
		if($edit)
		{
			$this->session->set_flashdata('pesan','Kategori Berhasil Diubah');
			redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('eror','Kategori Gagal Diubah');
			redirect('admin/kategori');
		}

	}

	function proses_hapus($id_kategori)
	{
		//proses hapus kategori
		$hapus = $this->Kategori_m->hapuskategori($id_kategori);
		if($hapus)
		{
			$this->session->set_flashdata('pesan','Kategori Berhasil Dihapus');
			redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('eror','Kategori Gagal Dihapus');
			redirect('admin/kategori');
		}
	}


	function gambar_kategori()
	{
		//mendapatkan data gambar kategori
		$data['gambar'] =$this->Kategori_m->getkategorigambar()->result();
		$data['title'] = "Admin - Kategori Gambar";
		$data['subtitle'] = "Kategori Gambar";
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/kategori/kategori-gambar',$data);
		$this->load->view('admin/temp/footer');
	}

	function tambah_gambar_kategori()
	{
		//form tambah kategori

		$data['title'] = "Admin - Tambah Kategori Gambar";
		$data['subtitle'] = "Tambah Kategori Gambar";
		//mendaptkan data kategori
		$data['kategori'] = $this->Kategori_m->get()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/kategori/tambah-kategori-gambar',$data);
		$this->load->view('admin/temp/footer');
	}

	function proses_tambah_gambar_kategori()
	{
		//proses tambah gambar kategori
		$tambah = $this->Kategori_m->tambahkategorigambar();
		if($tambah)
		{
			$this->session->set_flashdata('pesan','Kategori Gambar Berhasil Ditambahkan');
			redirect('admin/kategori/gambar');
		}else{
			$this->session->set_flashdata('eror','Kategori Gambar Gagal Ditambahkan');
			redirect('admin/kategori/gambar');
		}

	}

	function edit_gambar_kategori($id_poto)
	{
		
		$data['title'] = "Admin - Edit Kategori Gambar";
		$data['subtitle'] = "Edit Kategori Gambar";
		//mendapatkan kategori gambar yang akan di edit
		$data['kategorigambar'] = $this->Kategori_m->getgambarkategori($id_poto)->row();
		//mendaptkan data kategori 
		$data['kategori'] = $this->Kategori_m->get()->result();
		$this->load->view('admin/temp/sidebar',$data);
		$this->load->view('admin/temp/header');
		$this->load->view('admin/kategori/edit-kategori-gambar',$data);
		$this->load->view('admin/temp/footer');
	}

	function proses_edit_gambar_kategori($id_poto)
	{
		//proses edit kategori gambar
		$edit = $this->Kategori_m->editkategorigambar($id_poto);
		if($edit)
		{
			$this->session->set_flashdata('pesan','Kategori Gambar Berhasil Diubah');
			redirect('admin/kategori/gambar');
		}else{
			$this->session->set_flashdata('eror','Kategori Gambar Gagal Diubah');
			redirect('admin/kategori/gambar');
		}

	}

	function hapus_gambar_kategori($id_poto)
	{
		//proses hapus gambar kategori
		$hapus = $this->Kategori_m->hapuskategorigambar($id_poto);
		if($hapus)
		{
			$this->session->set_flashdata('pesan','Kategori Gambar Berhasil Dihapus');
			redirect('admin/kategori/gambar');
		}else{
			$this->session->set_flashdata('eror','Kategori Gambar Gagal Dihapus');
			redirect('admin/kategori/gambar');
		}
	}
}