<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contacts extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Groepswerk - Contacts page";
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		// Hier de link naar de contacts view
		$this->load->view('template/footer');
	}
}
