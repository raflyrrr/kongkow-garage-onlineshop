<?php
/**
 * 
 */
class Cart extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_m');
		$this->load->model('Produk_m');
		$this->load->model('Kategori_m');
		$this->load->model('Transaksi_m');
	}
	public function tambah()
	{
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'weight'      => $this->input->post('weight'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name')
		);

		$this->cart->insert($data);
		redirect($redirect_page,'refresh');
	}

	public function keranjang()
	{
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$data['kategori'] = $this->Kategori_m->get()->result();
		$this->load->view('keranjang',$data);
	}
	public function checkout()
	{
		if($this->Pelanggan_m->is_role('id_pelanggan') == null){
			redirect('auth');
		}
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$data['kategori'] = $this->Kategori_m->get()->result();
		$this->load->view('checkout',$data);
	}


	// public function checkout()
	// {
		
	// 	$this->load->model('front/Product_m');
	// 	if ($cart = $this->cart->contents())
	// 		$inv = "INV".date('Ymd').rand();
	// 	$user_id = $this->input->post('user_id');
	// 	$city = $this->input->post('city');
	// 	$address = $this->input->post('address');
	// 	$ekspedisi = $this->input->post('ekspedisi');
	// 	{
	// 		foreach ($cart as $item)
	// 		{
	// 			$data_detail = array('product_id' =>$item['id'],
	// 				'user_id' =>$user_id,
	// 				'invoice' =>$inv,
	// 				'name_product' => $item['name'],
					
	// 				'price_product' => $item['price'],
	// 				'qty' => $item['qty'],
	// 				'total' => $item['subtotal'],
	// 				'city'=>$city,
	// 				'address'=>$address,
	// 				'ekspedisi'=>$ekspedisi,

	// 			);

				
	// 			$proses = $this->Product_m->finish_transaction($data_detail);
	// 			$this->cart->destroy();


				

				
	// 		}
	// 		if($proses){

	// 			$this->session->set_flashdata('message','Transaction Success');
	// 			redirect('/');
	// 		}else{
	// 			$this->session->set_flashdata('message','Transaction Success');
	// 			redirect('/');
	// 		}
	// 	}
	// }

	function proses()
	{
		

		$invoice = "INV".date('Ymd').rand();
		$data = array(
			'invoice' =>$invoice,
			'id_pelanggan'=>$this->input->post('id_pelanggan'),
			'nama_penerima'=>$this->input->post('nama_penerima'),
			'telepon_penerima'=>$this->input->post('telepon_penerima'),
			'province'=>$this->input->post('province'),
			'city'=>$this->input->post('city'),
			'alamat_penerima'=>$this->input->post('alamat_penerima'),
			'kode_pos'=>$this->input->post('kode_pos'),
			'expedisi'=>$this->input->post('expedisi'),
			'package'=>$this->input->post('package'),
			'ongkir'=>$this->input->post('ongkir'),
			'grand_total'=>$this->input->post('total'),
			'total_bayar'=>$this->input->post('total_bayar'),



		);
		$this->Transaksi_m->save_transaction($data);
		
		$i =1;
		foreach($this->cart->contents() as $item){
			$data_rinci = array(
				'invoice'=>$invoice,
				'id_produk'=>$item['id'],
				'qty'=>$this->input->post('qty'.$i++),
			);
			$this->Transaksi_m->save_detail_transaction($data_rinci);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('pesan','Pesananan Berhasil Silahkan Lakukan Konfirmasi Pembayaran');
		redirect('/');
	}

	function hapus($rowid)
	{

		$data = array(
        'rowid' => $rowid,
        'qty'   => 0
	);
		$this->cart->update($data);
		redirect('/');
		
	}

	function riwayat()
	{
		if($this->Pelanggan_m->is_role('id_pelanggan') == null){
			redirect('auth');
		}
		$data['produkfooter']= $this->Produk_m->getproduklimit()->result();
		$data['kategori'] = $this->Kategori_m->get()->result();
		//menangkap id pelanggan yang login
		$user = $this->session->userdata('id_pelanggan');
		//menampilkan riwayat pesanan belum dikonfirmasi 
		$data['riwayat'] = $this->Transaksi_m->gethistories($user)->result();
		$this->load->view('riwayat',$data);
	}
}
