<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contacts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact_repository');
		$this->load->model('contact');
	}

	public function index()
	{
		$data['title'] = "Groepswerk Web Advanced - contacts";
		$data['contact_list'] = $this->contact_repository->get_contacts();
		$data['javascripts'] = ["assets/js/getcontacts.js"];

		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('contacts/contacts_overview');
		$this->load->view('template/footer');
	}


	public function create()
	{
		$data['javascripts'] = ["assets/js/createcontact.js"];
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('contacts/new_contact');
		$this->load->view('template/footer');
	}

	public function update($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$person['contact'] = $this->contact_repository->get_contact_by_id($id);

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');

		$this->load->view('template/header');
		$this->load->view('template/navigation');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('contacts/edit_contact', $person);
		} else {
			$data['naam'] = $_POST["name"];
			$data['email'] = $_POST["email"];
			$this->contact_repository->update_contact($id, $data);
			$this->load->view('contacts/contact_form_success');
		}

		$this->load->view('template/footer');
	}

	public function delete()
	{
		$data['javascripts'] = ["assets/js/removecontact.js"];
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('contacts/remove_contact');
		$this->load->view('template/footer');
	}
}
