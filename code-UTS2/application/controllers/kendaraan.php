<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kendaraan extends CI_Controller {

    //fungsi yang akan dijalankan saat class diintansiasinya
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent(ci_controller)
       parent::__construct();
       $this->load->model('kendaraan_model');
       $this->load->library('form_validation');
       
    }

    public function index()
    {

        // modul untuk load database
        // $this->load->database();
        $data['title']='List Kendaraan';
        $data['kendaraan']=$this->kendaraan_model->getAllkendaraan();//getAllmatakuliah
        if ($this->input->post('keyword')) {
            # code ...
            $data['kendaraan']=$this->kendaraan_model->cariDatakendaraan();//cariDatamatakuliah
        }
        $this->load->view('template/header',$data);
        $this->load->view('kendaraan/index',$data);
        $this->load->view('template/footer');

    }


    public function tambah()
    {
        $data['title']='Form Menambahkan Data Kendaraan';

        //$this->form->validation->set_rules('fieldname', 'fieldlabel', trim|required|min_length[5]max_length[12]');

        $this->form_validation->set_rules('nomorkendaraan', 'Nomorkendaraan', 'required');
        $this->form_validation->set_rules('jeniskendaraan', 'Jeniskendaraan', 'required|min_length[5]');
        $this->form_validation->set_rules('merkkendaraan', 'Merkkendaraan', 'required');
        $this->form_validation->set_rules('tahunbeli', 'Tahunbeli', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('kendaraan/tambah', $data);
            $this->load->view('template/footer');
        } else {
            #code...
            $this->kendaraan_model->tambahdatakendaraan();//tambahdatamatkul
            //untuk flashdata mempunyai parameter (nama flashdata/alias,isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('kendaraan','refresh');
        } 
    }
    public function hapus($id_kendaraan) {
        $this->kendaraan_model->hapusdatakendaraan($id_kendaraan);//hapusdatamatkul

        $this->session->set_flashdata('flash-data','dihapus dari database');
        redirect('kendaraan','refresh');
    }

    public function detail($id_kendaraan)//id_matkul
    {

        $data['title']='Detail Kendaraan';
        $data['kendaraan']=$this->kendaraan_model->getkendaraanByID($id_kendaraan);//getmatkulByID
        $this->load->view('template/header', $data);
        $this->load->view('kendaraan/detail', $data);
        $this->load->view('template/footer');
        
    }

    public function edit($id_kendaraan) {

        $data['title']= 'Form Edit Data Kendaraan';
        $data['kendaraan']=$this->kendaraan_model->getkendaraanByID($id_kendaraan);
        
        $this->form_validation->set_rules('nomorkendaraan', 'Nomorkendaraan', 'required');
        $this->form_validation->set_rules('merkkendaraan', 'Merkkendaraan', 'required');
        $this->form_validation->set_rules('tahunbeli', 'Tahunbeli', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code ...
            $this->load->view('template/header', $data);
            $this->load->view('kendaraan/edit', $data);
            $this->load->view('template/footer');
        } else {
            #code ...
            $this->kendaraan_model->ubahdatakendaraan();//ubahdatamatkul
            $this->session->set_flashdata('flash-data','diedit');
            redirect('kendaraan','refresh');

        }
    }
}

/* End of file Controllername.php */

?>