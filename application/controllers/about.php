<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller
{
	public function index()
	{
		$data['title'] = "About Us";
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('about');
		$this->load->view('template/footer');
	}
}
