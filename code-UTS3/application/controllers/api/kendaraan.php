<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class kendaraan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kendaraan_model', 'kendaraan');
    }

    public function index_get()
    {
        $id_kendaraan = $this->get('id_kendaraan');
        if ($id_kendaraan === NULL) {
            $kendaraan = $this->kendaraan->getkendaraan();
        } else {
            $kendaraan = $this->kendaraan->getkendaraan($id_kendaraan);
        }

        if ($kendaraan) {
            $this->response([
                'status' => true,
                'data' => $kendaraan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tidak Ditemukan kendaraan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete()
    {
        $id_kendaraan = $this->delete('id_kendaraan');

        if ($id_kendaraan === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {

            if ($this->kendaraan->deletekendaraan($id_kendaraan) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id_kendaraan' => $id_kendaraan,
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
            'nomorkendaraan' => $this->post('nomorkendaraan'),
            'jeniskendaraan' => $this->post('jeniskendaraan'),
            'namakendaraan' => $this->post('namakendaraan'),
            'tahunbeli' => $this->post('tahunbeli'),
        ];

        if ($this->kendaraan->createkendaraan($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new kendaraan has been created'
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
        $id_kendaraan = $this->put('id_kendaraan');
        $data = [
            'nomorkendaraan' => $this->put('nomorkendaraan'),
            'jeniskendaraan' => $this->put('jeniskendaraan'),
            'namakendaraan' => $this->put('namakendaraan'),
            'tahunbeli' => $this->put('tahunbeli'),
        ];

        if ($this->kendaraan->updatekendaraan($data, $id_kendaraan) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data kendaraan has been updated'
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