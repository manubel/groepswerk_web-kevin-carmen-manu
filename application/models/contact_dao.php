<?php

require_once('contact_dao_interface.php');

class contact_dao extends CI_Model implements contact_dao_interface
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$query = $this->db->get('contacten');
		$rows = $query->custom_result_object('contact');
		return $rows;
	}

	public function get_by_id($id)
	{
		$query = $this->db->get_where('contacten', array('id' => $id));
		$rows = $query->custom_row_object(0, 'contact');
		return $rows;
	}

	public function create($object)
	{
		return $this->db->insert('contacten', $object);
	}

	public function update($object)
	{
		$this->db->where('id', $object->id);
		return $this->db->update('contacten', $object);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('contacten');
	}
}
