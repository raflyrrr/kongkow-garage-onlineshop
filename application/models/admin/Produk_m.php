<?php
/**
 * 
 */
class Produk_m extends CI_Model
{
	
	function get()
	{
		$status_produk = "publish";
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('status_produk',$status_produk);
		$this->db->order_by('id_produk','desc');

		$query = $this->db->get();
		return $query;
	}

	function post()
	{
		$nama_produk  = $this->input->post('nama_produk');
		$slug_produk = url_title($this->input->post('nama_produk'), 'dash', TRUE);
		$slug_kategori = $this->input->post('slug_kategori');
		$deskripsi_produk = $this->input->post('deskripsi_produk');
		$berat = $this->input->post('berat');
		$harga_produk = $this->input->post('harga_produk');
		$status_produk = $this->input->post('status_produk');
		$this->form_validation->set_rules('nama_produk','Nama produk','required|trim|is_unique[produk.nama_produk]',[
			'is_unique' => 'Nama Produk Sudah Ada,Tambahkan Varian Warna Atau Size Sebagai Pembeda'
		]);
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan','Nama Produk Sudah Ada,Tambahkan Varian Warna Atau Size Sebagai Pembeda');
			redirect('admin/produk');
		}



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
      			'nama_produk'       => $nama_produk,
      			'slug_produk' => $slug_produk,
      			'slug_kategori'       => $slug_kategori,
      			'deskripsi_produk'       => $deskripsi_produk,
      			'berat' => $berat,
      			'harga_produk'       => $harga_produk,
      			'gambar' => $foto['file_name'],
      			'status_produk'       => $status_produk,


      		);
      		$this->db->insert('produk',$data);
      		redirect('admin/produk');
      	}else {
      		die("gagal upload");
      	}
      }else {
      	echo "tidak masuk";
      }
  }

  function getdata($id_produk)
  {
  	
  	$this->db->select('*');
  	$this->db->from('produk');
  	$this->db->where('id_produk',$id_produk);

  	$query = $this->db->get();
  	return $query;
  }

  function updateproduk($id_produk)
  {

  	$nama_produk  = $this->input->post('nama_produk');
		$slug_produk = url_title($this->input->post('nama_produk'), 'dash', TRUE);
		$slug_kategori = $this->input->post('slug_kategori');
		$deskripsi_produk = $this->input->post('deskripsi_produk');
		$berat = $this->input->post('berat');
		$harga_produk = $this->input->post('harga_produk');
		



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
      			'nama_produk'       => $nama_produk,
      			'slug_produk' => $slug_produk,
      			'slug_kategori'       => $slug_kategori,
      			'deskripsi_produk'       => $deskripsi_produk,
      			'berat' => $berat,
      			'harga_produk'       => $harga_produk,
      			'gambar' => $foto['file_name'],
      			


      		);
      		$this->session->set_flashdata('pesan','Produk Berhasil Diubah');
      		$this->db->where('id_produk',$id_produk);
      		$this->db->update('produk',$data);
      		redirect('admin/produk');
      	}else {
      		die("gagal upload");
      	}
      }else {
      	echo "tidak masuk";
      }
  }

  function hapusproduk($id_produk)
  {
  	$this->db->where('id_produk',$id_produk);
  	$this->db->delete('produk');
  	return true;
  }


  function getunpublish()
  {
    $status_produk = "unpublish";
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->where('status_produk',$status_produk);
    $this->db->order_by('id_produk','desc');

    $query = $this->db->get();
    return $query;
  }

function getdataproduk($id_produk)
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->where('id_produk',$id_produk);
   

    $query = $this->db->get();
    return $query;
  }

  function editstatusproduk($id_produk)
  {
    $status_produk = $this->input->post('status_produk');

    $data = array(

      'status_produk'=>$status_produk,
    );
    $this->db->where('id_produk',$id_produk);
    $this->db->update('produk',$data);
    return true;
  }


  function tambahstokproduk()
  {
    $id_produk = $this->input->post('id_produk');
    $stok = $this->input->post('stok');

    $data = array(

      'id_produk'=>$id_produk,
      'stok'=>$stok,
    );
    $this->db->insert('stok_masuk',$data);
    return true;
  }
  

}
