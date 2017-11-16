<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 6/11/2017
 * Time: 14:51
 */

interface IContactRepository
{
    public function get_contacts();
    public function get_contact_by_id($id);

    public function create_contact($data);
    public function update_contact($id,$data);
    public function delete_contact($id);


}
