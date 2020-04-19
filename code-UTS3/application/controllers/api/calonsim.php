<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class calonsim extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('calonsim_model', 'calonsim');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === NULL) {
            $calonsim = $this->calonsim->getcalonsim();
        } else {
            $calonsim = $this->calonsim->getcalonsim($id);
        }

        if ($calonsim) {
            $this->response([
                'status' => true,
                'data' => $calonsim
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tidak Ditemukan calonsim'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {

            if ($this->calonsim->deletecalonsim($id) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);
            } else {
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    public function index_post()
    {

        $data = [
            'nopol' => $this->post('nopol'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'provinsi' => $this->post('provinsi'),
        ];

        if ($this->calonsim->createcalonsim($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new calonsim has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failede to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nopol' => $this->put('nopol'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'provinsi' => $this->put('provinsi'),
        ];

        if ($this->calonsim->updatecalonsim($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data calonsim has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failede to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}