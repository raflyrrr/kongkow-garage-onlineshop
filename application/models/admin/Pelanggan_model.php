<?php
/**
 * 
 */
class Pelanggan_model extends CI_Model
{
	
	function get()
	{
		$status_pelanggan ="aktif";
		$level = "2";
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('level',$level);
		$this->db->where('status_pelanggan',$status_pelanggan);

		$query = $this->db->get();
		return $query;
	}

	function post()
	{
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$telepon_pelanggan = $this->input->post('telepon_pelanggan');
		$email_pelanggan = $this->input->post('email_pelanggan');
		$password_pelanggan = sha1($this->input->post('password_pelanggan'));
		$level = $this->input->post('level');
		$status_pelanggan = $this->input->post('status_pelanggan');
		$this->form_validation->set_rules('email_pelanggan','Email','required|is_unique[pelanggan.email_pelanggan]',[
			'is_unique' => 'Email Sudah Terdaftar'
		]);
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('eror','Email Sudah Terdaftar,Gunakan Email Yang Lain');
			redirect('admin/pelanggan');
		}

		$data = array (

			'nama_pelanggan'=>$nama_pelanggan,
			'alamat_pelanggan'=>$alamat_pelanggan,
			'telepon_pelanggan'=>$telepon_pelanggan,
			'email_pelanggan'=>$email_pelanggan,
			'password_pelanggan'=>$password_pelanggan,
			'level'=>$level,
			'status_pelanggan'=>$status_pelanggan,
		);
		$this->db->insert('pelanggan',$data);
		return true;
	}

	function editpelanggan($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan',$id_pelanggan);

		$query = $this->db->get();
		return $query;
	}

	function editprosespelanggan($id_pelanggan)
	{
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$telepon_pelanggan = $this->input->post('telepon_pelanggan');
		$email_pelanggan = $this->input->post('email_pelanggan');
		$password_pelanggan = sha1($this->input->post('password_pelanggan'));
		$level = $this->input->post('level');
		$status_pelanggan = $this->input->post('status_pelanggan');

		$data = array (

			'nama_pelanggan'=>$nama_pelanggan,
			'alamat_pelanggan'=>$alamat_pelanggan,
			'telepon_pelanggan'=>$telepon_pelanggan,
			'email_pelanggan'=>$email_pelanggan,
			'password_pelanggan'=>$password_pelanggan,
			'level'=>$level,
			'status_pelanggan'=>$status_pelanggan,
		);
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->update('pelanggan',$data);
		return true;
	}

	function hapuspelanggan($id_pelanggan)
	{
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->delete('pelanggan');
		return true;
	}

	function getpelangganbaru()
	{
		$status_pelanggan ="nonaktif";
		$level = "2";
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('level',$level);
		$this->db->where('status_pelanggan',$status_pelanggan);

		$query = $this->db->get();
		return $query;
	}

	function editpelangganbaru($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan',$id_pelanggan);

		$query = $this->db->get();
		return $query;
	}

	function updatepelanggannonaktif($id_pelanggan)
	{
		$status_pelanggan = $this->input->post('status_pelanggan');

		$data = array (

			'status_pelanggan'=>$status_pelanggan,
		);

		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->update('pelanggan',$data);
		return true;
	}
}