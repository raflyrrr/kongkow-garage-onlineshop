<?php
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
	}
	function index()
	{
		$this->load->view('login');
	}
	function proses_login()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
		$query = $this->Pelanggan_m->login($post);
		if($query->num_rows() > 0){
				$row = $query->row();

				$params = array (
					'id_pelanggan' => $row->id_pelanggan,
					'level' => $row->level,
					'nama_pelanggan' => $row->nama_pelanggan,
					'alamat_pelanggan' => $row->alamat_pelanggan,
					'telepon_pelanggan' => $row->telepon_pelanggan
				);
				$this->session->set_userdata($params);
				if($this->session->userdata("level") == 1){
						
                            redirect('admin/home');
                        }
                        else{
                            redirect('home');
                        }

			}else{
				$this->session->set_flashdata('pesanerror','Login gagal,cek akun ,email dan password anda, apakah akun anda sudah di aktifkan');
				redirect('auth');
			}
		}
	}

	function signup()
	{
		$daftar = $this->Pelanggan_m->process_signup();
		if($daftar)
		{
			$this->session->set_flashdata('signup','Pendaftaran berhasil,tunggu beberapa saat admin mengaktifkan akun anda');
			redirect('auth');
		}
		else{
			$this->session->set_flashdata('signuperor','Pendaftaran gagal');
			redirect('auth');
		}
	}

	function logout()
	{
		session_destroy();
		redirect('auth');
	}
}