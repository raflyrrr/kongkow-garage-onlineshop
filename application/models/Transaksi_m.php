<?php
/**
 * 
 */
class Transaksi_m extends CI_Model
{
	
	
	function save_transaction($data)
	{
		$this->db->insert('transaksi',$data);
	}

	function save_detail_transaction($data_rinci)
	{
		$this->db->insert('detail_transaksi',$data_rinci);
	}

	function gethistories($user)
	{
		$query = $this->db->query("SELECT DISTINCT invoice,tanggal_order,id_pelanggan,status_pesanan FROM transaksi WHERE id_pelanggan ='$user' ORDER BY id_transaksi DESC");

		return $query;
	}

	function getnotpayment($invoice)
	{
		
		$user = $this->session->userdata('id_pelanggan');
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi','transaksi.invoice = detail_transaksi.invoice');
		$this->db->join('produk','detail_transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.invoice',$invoice);
		$this->db->where('transaksi.id_pelanggan',$user);

		return $this->db->get();
	}

	function process_confirmation()
	{
		$invoice  = $this->input->post('invoice');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$bank = $this->input->post('bank');
		$atas_nama = $this->input->post('atas_nama');
		$jumlah = $this->input->post('jumlah');
		$status = $this->input->post('status');



		$config['upload_path'] = './assets/img/bukti/';
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
      			'invoice'       => $invoice,
      			'id_pelanggan' => $id_pelanggan,
      			'bank'       => $bank,
      			'atas_nama'       => $atas_nama,
      			'jumlah' => $jumlah,
      			'bukti' => $foto['file_name'],
      			'status'       => $status,
      			


      		);
      		$this->session->set_flashdata('konfirmasi','Terimakasih sudah melakukan konfirmasi');
      		
      		$this->db->insert('konfirmasi',$data);
      		redirect('/');
      	}else {
      		die("gagal upload");
      	}
      }else {
      	echo "tidak masuk";
      }
	}
}