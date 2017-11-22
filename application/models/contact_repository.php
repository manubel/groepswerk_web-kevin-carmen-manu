<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 20/11/2017
 * Time: 13:58
 */
require_once ('contact_repository_interface.php');
require_once ('contact_dao.php');

class contact_repository implements contact_repository_interface
{
    private $contact_dao = null;

    public function __construct( contact_dao_interface $contact_dao = null)
    {
        if($contact_dao!=null){
            $this->contact_dao = $contact_dao;

        } else{
            $this->contact_dao = new contact_dao();
        }
    }

    public function get_contacts()
    {
        $contacts = null;
        $contacts = $this->contact_dao->get_all();
        return $contacts;
    }

    public function get_contact_by_id($id)
    {
        $contact =null;
        if ($this->isValidId($id)) {
            $contact = $this->contact_dao->get_by_id($id);
        }
        return $contact;
    }

    public function create_contact($contact)
    {
        $this->contact_dao->create($contact);
    }

    public function update_contact($contact)
    {
        if ($this->isValidId($contact->id)) {
            $this->contact_dao->update($contact);
        }

    }

    public function delete_contact($id)
    {
        if ($this->isValidId($id)) {
            $this->contact_dao->delete($id);
        }

    }

    private function isValidId($id)
    {
        if (is_string($id) && ctype_digit(trim($id))) {
            $id=(int)$id;
        }
        return is_integer($id) and $id >= 0;
    }

}