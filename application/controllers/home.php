<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Home";
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('home');
		$this->load->view('template/footer');
	}
}
