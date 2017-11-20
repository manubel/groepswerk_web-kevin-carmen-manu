<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 6/11/2017
 * Time: 14:53
 */
require_once('contact_repository_interface.php');

class contact_repository extends CI_Model implements contact_repository_interface
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_contacts()
	{
		$query = $this->db->get('contacten');
		$rows = $query->custom_result_object('contact');
		return $rows;
	}

	public function get_contact_by_id($id)
	{
		$query = $this->db->get_where('contacten', array('id' => $id));
		$rows = $query->custom_row_object(0, 'contact');
		return $rows;
	}

	public function create_contact($data)
	{
		return $this->db->insert('contacten', $data);
	}

	public function update_contact($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('contacten', $data);
	}

	public function delete_contact($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('contacten');
	}
}
