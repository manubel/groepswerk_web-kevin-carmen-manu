<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 6/11/2017
 * Time: 13:50
 */

class Contact extends CI_Model
{
    public $id;
    public $naam;
    public $email;

    public function __construct($data = null)
    {
        if(is_array($data)){
            if(isset($data['id'])) $this->id = $data['id'];

            $this->naam = $data['naam'];
            $this->email = $data['email'];
        }
    }
}