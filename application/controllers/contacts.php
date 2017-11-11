<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contacts extends CI_Controller
{
    private $repo;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ContactRepository');
        $this->load->model('Contact');

        $this->repo = new ContactRepository();
    }

    public function index()
	{
        $data['contact_list'] = $this->repo->get_all();
		$data['title'] = "All Contacts";

		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
        $this->load->view('overzicht', $data);
		$this->load->view('template/footer');
	}

	public function get($id){
        $data['contact'] = $this->repo->get($id);

        if(empty($data['contact'])){
            show_404();
        }
        $data['title'] = "Single Contact";

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
	    $this->load->view('contact', $data);
        $this->load->view('template/footer');
    }

}
