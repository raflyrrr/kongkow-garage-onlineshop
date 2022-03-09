<?php
/**
 * 
 */
class Setting_m extends CI_Model
{
	
	function getbanner()
	{
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->order_by('id_banner','desc');

		$query = $this->db->get();
		return $query;
	}

	function uploadbanner()
	{
		$teks  = $this->input->post('teks');
		
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
      			'gambar' => $foto['file_name'],
      			'teks'       => $teks,


      		);
      		$this->db->insert('banner',$data);
      		redirect('admin/pengaturan/banner');
      	}else {
      		die("gagal upload");
      	}
      }else {
      	echo "tidak masuk";
      }
  }

  function getbannerfooter()
  {
      $this->db->select('*');
            $this->db->from('banner_footer');
            $this->db->order_by('id_footer','desc');

            $query = $this->db->get();
            return $query;
  }

  function uploadbannerfooter()
  {
    $teks  = $this->input->post('teks');
    
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
            'gambar' => $foto['file_name'],
            'teks'       => $teks,


          );
          $this->db->insert('banner_footer',$data);
          redirect('admin/pengaturan/banner/footer');
        }else {
          die("gagal upload");
        }
      }else {
        echo "tidak masuk";
      }
  }

}