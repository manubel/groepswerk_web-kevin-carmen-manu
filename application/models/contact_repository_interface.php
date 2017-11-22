<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 20/11/2017
 * Time: 13:52
 */

interface contact_repository_interface
{
    public function get_contacts();

    public function get_contact_by_id($id);

    public function create_contact($contact);

    public function update_contact($contact);

    public function delete_contact($id);
}