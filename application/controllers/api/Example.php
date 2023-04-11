<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

// Include Rest controller libaray

require(APPPATH . '/libraries/REST_Controller.php');

// use Restserver\Libraries\REST_Controller;

class Example extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('loginmodel');
    }

    public function user_get($id = 0)
    {

        $users = $this->user->getRows($id);

        if (!empty($users)) {
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No user were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function user_post()
    {
        $userdata = array();
        $userdata['username'] = $this->post('username');
        $userdata['password'] = $this->post('password');
        // $userdata['email'] = $this->post('email');
        // $userdata['phone'] = $this->post('phone');
        if (!empty($userdata['username']) && !empty($userdata['password'])) {

            $insert = $this->user->insert($userdata);

            if ($insert) {
                $this->response([
                    'status' => false,
                    'message' => 'User has been added successfully'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response("Some Problems occured,please try again", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response("Provide complete user information to create", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_put()
    {
        $userdata = array();
        $id = $this->put('id');
        $userdata['username'] = $this->put('username');
        $userdata['password'] = $this->put('password');
        // $userdata['email'] = $this->put('email');
        if (!empty($userdata['username']) && !empty($userdata['password'])) {
            $update = $this->loginmodel->update($userdata);

            if ($update) {
                $this->response([
                    'status' => TRUE,
                    'message' => "User has been update successfully"
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response("Somrthing went wrong please try again", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response("Provide User information to update", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function user_delete($id)
    {
        if ($id) {
            $delete = $this->loginmodel->delete($id);
            if ($delete) {
                $this->response([
                    'status' => TRUE,
                    'message' => "User has been removed successfully"

                ], REST_Controller::HTTP_OK);
            } else {
                $this->response("Somethinf went wrong please try again", REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}