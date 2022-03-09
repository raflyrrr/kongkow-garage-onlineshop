<?php
/**
 * 
 */
class Transaksi_m extends CI_Model
{
	
	function getnotpayment()
	{
		$status ="pending";
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pelanggan','transaksi.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('status_pesanan',$status);
		$this->db->order_by('id_transaksi','desc');
		$this->db->limit(20);

		$query = $this->db->get();
		return $query;
	}

	function getpayment()
	{
		$status ="konfirmasi";
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pelanggan','transaksi.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('status_pesanan',$status);
		$this->db->order_by('id_transaksi','desc');
		$this->db->limit(20);

		$query = $this->db->get();
		return $query;
	}

	function getfinishtransaction($invoice)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('konfirmasi','transaksi.invoice = konfirmasi.invoice');
		$this->db->join('detail_transaksi','transaksi.invoice = detail_transaksi.invoice');
		$this->db->join('produk','detail_transaksi.id_produk = produk.id_produk');

		$this->db->join('pelanggan','transaksi.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('transaksi.invoice',$invoice);
		

		$query = $this->db->get();
		return $query;
	}

	function update_status($invoice)
	{
		$status_pesanan = $this->input->post('status_pesanan');

		$data = array(

			'status_pesanan'=>$status_pesanan
		);
		$this->db->where('invoice',$invoice);
		$this->db->update('transaksi',$data);
		return true;
	}
}