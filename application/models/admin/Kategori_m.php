<?php
/**
 * 
 */
class Kategori_m extends CI_Model
{
	
	function get()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori','desc');

		$query = $this->db->get();
		return $query;
	}

	function post()
	{
		$nama_kategori = $this->input->post('nama_kategori');
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

		$data = array(

			'nama_kategori'=>$nama_kategori,
			'slug_kategori'=>$slug_kategori,
		);
		$this->db->insert('kategori',$data);
		return true;
	}

	function editkategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id_kategori);

		$query = $this->db->get();
		return $query;
	}

	function updatekategori($id_kategori)
	{
		$nama_kategori= $this->input->post('nama_kategori');
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

		$data = array(

			'nama_kategori'=>$nama_kategori,
			'slug_kategori'=>$slug_kategori,
		);

		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori',$data);
		return true;
	}

	function hapuskategori($id_kategori)
	{
		$this->db->where('id_kategori',$id_kategori);
		$this->db->delete('kategori');
		return true;
	}

	function getkategorigambar()
	{
		$this->db->select('*');
		$this->db->from('poto_kategori');
		$this->db->order_by('id_poto','desc');

		$query = $this->db->get();
		return $query;
	}

	function tambahkategorigambar()
	{
		$slug_kategori  = $this->input->post('slug_kategori');
		



		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '3000';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['foto']['name'];

      $this->upload->initialize($config);

      if (!empty($_FILES['foto']['name'])) {
      	if ( $this->upload->do_upload('foto') ) {
      		$foto = $this->upload->data();
      		$data = array(
      			'slug_kategori'       => $slug_kategori,
      			'gambar' => $foto['file_name'],
      			


      		);
      		$this->db->insert('poto_kategori',$data);
      		redirect('admin/kategori/gambar');
      	}else {
      		die("gagal upload");
      	}
      }else {
      	echo "tidak masuk";
      }
	}

	function getgambarkategori($id_poto)
	{
		$this->db->select('*');
		$this->db->from('poto_kategori');
		$this->db->where('id_poto',$id_poto);

		$query = $this->db->get();
		return $query;
	}

	function editkategorigambar($id_poto)
	{
		$slug_kategori  = $this->input->post('slug_kategori');
		



		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '3000';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['foto']['name'];

      $this->upload->initialize($config);

      if (!empty($_FILES['foto']['name'])) {
      	if ( $this->upload->do_upload('foto') ) {
      		$foto = $this->upload->data();
      		$data = array(
      			'slug_kategori'       => $slug_kategori,
      			'gambar' => $foto['file_name'],
      			


      		);
      		$this->db->where('id_poto',$id_poto);
      		$this->db->update('poto_kategori',$data);
      		redirect('admin/kategori/gambar');
      	}else {
      		die("gagal upload");
      	}
      }else {
      	echo "tidak masuk";
      }
	}

	


	function hapuskategorigambar($id_poto)
	{
		$this->db->where('id_poto',$id_poto);
		$this->db->delete('poto_kategori');
		return true;
	}

	
}