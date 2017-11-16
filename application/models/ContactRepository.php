<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 6/11/2017
 * Time: 14:53
 */
require_once ('IContactRepository.php');

class ContactRepository extends CI_Model implements IContactRepository
{
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
    }

    public function get_contacts()
    {
        $query = $this->db->get('contacten');
        $rows =  $query->custom_result_object('Contact');

        return $rows;
    }

    public function get_contact_by_id($id)
    {
        $query = $this->db->get_where('contacten', array('id'=>$id));
        $rows =  $query->custom_row_object(0,'Contact');

        return $rows;
    }

    public function create_contact($data)
    {


        // Als functie opgeroepen wordt zonder id (vanuit create functie uit controller) dan inserten via CI
		// Anders als id aanwezig is (vanuit update functie uit controller) dan updaten via CI
        return $this->db->insert('contacten', $data);

    }

    public function update_contact($id,$data)
    {

        $this->db->where('id', $id);
        return $this->db->update('contacten', $data);

    }



    public function delete_contact($id){
    	$this->db->where('id', $id);
    	return $this->db->delete('contacten');
	}
}
