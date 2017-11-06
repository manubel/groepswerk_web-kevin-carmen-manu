<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 6/11/2017
 * Time: 14:51
 */

interface IContactRepository
{
    public function get_all();
    public function get($id);
    public function update($contact);
}