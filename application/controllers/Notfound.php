<?php
/**
 * 
 */
class Notfound extends CI_Controller
{
	
	function index()
	{
		$this->load->view('404');
	}
}