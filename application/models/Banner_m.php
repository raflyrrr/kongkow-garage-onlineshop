<?php
/**
 * 
 */
class Banner_m extends CI_Model
{
	
	function getbanner()
	{
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->order_by('id_banner','desc');
		$this->db->limit(1);

		$query = $this->db->get();
		return $query;
	}

	function getfooterbanner()
	{
		$this->db->select('*');
		$this->db->from('banner_footer');
		$this->db->order_by('id_footer','desc');
		$this->db->limit(1);

		$query = $this->db->get();
		return $query;
	}
}