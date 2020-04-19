<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class calonsim extends CI_Controller {

   public function __construct(){
       parent::__construct();
        $this->load->model('calonsim_models');
        $this->load->library('form_validation');

        if($this->session->userdata['level']!="admin"){
            redirect('login','refresh');
        }
        
   }

    public function index()
    {
        //$this->load->model('mahasiswa_model');
        //$this->load->database();
        $data['title']='List Calon Sim';
        $data['calonsim']=$this->calonsim_models->getAllcalonsim();
        if($this->input->post('keyword')){
            $data['calonsim']=$this->calonsim_models->cariDatacalonsim();//cariDataMahasiswa
        }
        $this->load->view('template/header',$data);
        $this->load->view('calonsim/index',$data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['title']='Form Menambahakan Data calonsim';
        $data['provinsi'] = ['jawa timur','jawa tengah','jawa barat','sulawesi selatan','sulawesi utara','sumatra barat'];
        $data['jeniskelamin']=['Perempuan','Laki-laki'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomorktp', 'Nomorktp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header',$data);
            $this->load->view('calonsim/tambah',$data);
            $this->load->view('template/footer');
        } else {
            $this->calonsim_models->tambahdatacalonsim();//tambahdatamhs
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('calonsim','refresh');
        }
        
    }

    public function hapus($id){
        $this->calonsim_models->hapusdatacalonsim($id);//hapusdatamhs
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('calonsim','refresh');
    }

    public function detail($id){
        $data['title']='Detail Calon Sim';
        $data['calonsim']=$this->calonsim_models->getcalonsimByID($id);//getmahasiswaByID
        $this->load->view('template/header',$data);
        $this->load->view('calonsim/detail',$data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Calon Sim';
        $data['calonsim'] =$this->calonsim_models->getcalonsimByID($id);
        $data['provinsi'] = ['jawa timur','jawa tengah','jawa barat','sulawesi selatan','sulawesi utara','sumatra barat'];
        $data['jeniskelamin']=['Perempuan','Laki-laki'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomorktp', 'Nomorktp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required');
        
        if ($this->form_validation->run() == FALSE)
                {
                    $this ->load-> view('template/header',$data);
                    $this ->load-> view('calonsim/edit',$data);
                    $this ->load-> view('template/footer');
                }
                else
                {
                        $this->calonsim_models->ubahdatacalonsim();//ubahdatamhs
                        $this->session->set_flashdata('flash-data', 'diedit');
                        redirect('calonsim','refresh');
                        
                }
    }

}

/* End of file Controllername.php */

?>