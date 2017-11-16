<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contacts extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
        $this->load->model('ContactRepository');
        $this->load->model('Contact');
    }

    public function index()
	{
        $data['contact_list'] = $this->ContactRepository->get_contacts();

		$this->load->view('template/header');
		$this->load->view('template/navigation');
        $this->load->view('overzicht', $data);
		$this->load->view('template/footer');
	}

	public function get($id){
        $data['contact'] = $this->ContactRepository->get_contact_by_id($id);

        if(empty($data['contact'])){
            show_404();
        }

        $this->load->view('template/header');
        $this->load->view('template/navigation');
	    $this->load->view('contact', $data);
        $this->load->view('template/footer');
    }

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');

		$this->load->view('template/header');
		$this->load->view('template/navigation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('newContact');
		}
		else
		{
		    $data['naam'] = $_POST["name"];
		    $data['email'] = $_POST["email"];
			$this->ContactRepository->create_contact($data);
			$this->load->view('formsuccess');
		}

		$this->load->view('template/footer');
	}

    public function update($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $person['contact'] = $this->ContactRepository->get_contact_by_id($id);

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        $this->load->view('template/header');
        $this->load->view('template/navigation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('contact', $person);
        }
        else
        {
            $data['naam'] = $_POST["name"];
            $data['email'] = $_POST["email"];
            $this->ContactRepository->update_contact($id, $data);
            $this->load->view('formsuccess');
        }

        $this->load->view('template/footer');
    }

	public function delete($id){
        $data['contact'] = $this->ContactRepository->get_contact_by_id($id);

        if(empty($data['contact'])){
            show_404();
        }

        $this->ContactRepository->delete_contact($id);

        $this->index();
    }

    }
