<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Contacten extends REST_Controller {


    private $repo;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('ContactRepository');
        $this->load->model('Contact');

        $this->repo = new ContactRepository();
    }

    public function users_get()
    {
        // Users from a data store e.g. database

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id == NULL)
        {
            $users['contact_list'] = $this->repo->get_contacts();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        $user['contact'] = $this->repo->get_contact_by_id($id);


        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function users_post() //create
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // Data uit POST ophalen via CI
        /*$data = [
            'naam' => $this->input->post('naam'),
            'email' => $this->input->post('email')
        ];*/
        /*$this->set_response($data, REST_Controller::HTTP_CREATED);*/
        $this->ContactRepository->create_contact($data);

        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function users_put() //edit
    {

        // Data uit POST ophalen via CI
        $id = $this->get('id');
        /*$data = array(
            'naam' => isset($_POST['naam']) ? $_POST['naam'] : NULL,
            'email' => $this->input->put('email')
        );*/
        $data = json_decode(file_get_contents('php://input'), true);
        $this->ContactRepository->update_contact($id,$data);

        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }



    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];
        $this->ContactRepository->delete_contact($id);
        $this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
    }

}
