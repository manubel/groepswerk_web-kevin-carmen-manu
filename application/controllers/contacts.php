<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contacts extends CI_Controller
{
    public function __construct()
    {
        $this->load->model('ContactRepository');
        $this->load->model('Contact');
    }

    public function index()
	{
        $data['contact_list'] = $this->ContactRepository->get_contacts();
		$data['title'] = "All Contacts";

		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
        $this->load->view('overzicht', $data);
		$this->load->view('template/footer');
	}

	public function get($id){
        $data['contact'] = $this->ContactRepository->get_contact_by_id($id);

        if(empty($data['contact'])){
            show_404();
        }
        $data['title'] = "Single Contact";

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
	    $this->load->view('contact', $data);
        $this->load->view('template/footer');
    }

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = "Create a contact";

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');

		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('contactform');
		}
		else
		{
			$this->ContactRepository->set_contact();
			$this->load->view('formsuccess');
		}

		$this->load->view('template/footer');
	}
}
