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
        $this->load->database();
    }

    public function get_all()
    {
        $query = $this->db->get('contacten');
        $rows =  $query->custom_result_object('Contact');

//        foreach ($rows as $row){
//            echo $row->id;
//            echo $row->naam;
//            echo $row->email;
//        }

        return $rows;
    }

    public function get($id)
    {
        $query = $this->db->get_where('contacten', array('ID'=>$id));
        $rows =  $query->custom_row_object(0,'Contact');

//        if (isset($row)){
//            echo $row->id;
//            echo $row->naam;
//            echo $row->email;
//        }
        return $rows;
    }

    public function update($contact)
    {
        //return contact::update($input);
    }
}