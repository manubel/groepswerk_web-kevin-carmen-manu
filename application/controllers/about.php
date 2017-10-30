<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Groepswerk - About page";
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		// Hier de link naar de about view
		$this->load->view('template/footer');
	}
}
