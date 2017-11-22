<?php
/**
 * Created by PhpStorm.
 * User: Ik
 * Date: 6/11/2017
 * Time: 14:51
 */

interface contact_dao_interface
{
	public function get_all();

	public function get_by_id($id);

	public function create($object);

	public function update($object);

	public function delete($id);


}
