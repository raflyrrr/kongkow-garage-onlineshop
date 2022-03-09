<?php
/**
 * 
 */
class Pelanggan_m extends CI_Model
{

	function get_customer()
	{
		$status_pelanggan = "nonaktif";
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('status_pelanggan',$status_pelanggan);
		$this->db->order_by('id_pelanggan','desc');

		return $this->db->get();
	}
	
	function login($post)
	{
		$status_pelanggan = "aktif";
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('email_pelanggan', $post['email_pelanggan']);
		$this->db->where('password_pelanggan', sha1($post['password_pelanggan']));
		$this->db->where('status_pelanggan',$status_pelanggan);
		$query = $this->db->get();

		return $query;

	}

	function is_role()
    {
        return $this->session->userdata('level');
    }

    function process_signup()
    {
    	$nama_pelanggan =$this->input->post('nama_pelanggan');
    	$alamat_pelanggan = $this->input->post('alamat_pelanggan');
    	$telepon_pelanggan = $this->input->post('telepon_pelanggan');
    	$email_pelanggan = $this->input->post('email_pelanggan');
    	$password_pelanggan = sha1($this->input->post('password_pelanggan'));
    	$level = $this->input->post('level');
    	$status_pelanggan = $this->input->post('status_pelanggan');
    	$this->form_validation->set_rules('email_pelanggan','Email','required|trim|is_unique[pelanggan.email_pelanggan]',[
			'is_unique' => 'Email sudah pernah didaftarkan,hubungi admin'
		]);
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('notif','Email sudah pernah didaftarkan,hubungi admin');
			redirect('auth');
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
}