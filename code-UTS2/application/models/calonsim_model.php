<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class calonsim_model extends CI_Model {

    public function getAllcalonsim()
    {
        $query=$this->db->get('calonsim');
        return $query->result_array();
    }

    public function tambahdatacalonsim(){
        $data=[
        "nama" => $this->input->post('nama',true),
        "nomorktp" => $this->input->post('nomorktp',true),
        "email" => $this->input->post('email',true),
        "provinsi" => $this->input->post('provinsi',true),
        "jeniskelamin" => $this->input->post('jeniskelamin',true),
        "foto" => $this->uploadFoto(),
        ];
        $this->db->insert('calonsim', $data);
    }
    private function uploadFoto()
    {
        $config['upload_path']          = './foto';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|svg';
        $config['max_size']             = '2048';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
    }
        private function ubahFoto()
    {
        $id = $this->input->post('id');
        $calonsim = $this->getcalonsimByID($id);

        if ($calonsim['foto'] == null) {
            # code...
            $foto = $this->uploadFoto();

        }else if (empty($_FILES['foto']['name'])) {
            $foto = $this->input->post('fotoLama');
        } else {
            $this->deleteFoto($this->input->post('id'));
            $foto = $this->uploadFoto();
        }
        return $foto;
    }
    private function deleteFoto($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('calonsim');
        $row = $query->row();
        unlink(".foto/$row->foto");
    }

    public function hapusdatacalonsim($id) {
        $this->db->where('id', $id);
        $this->db->delete('calonsim');
        $this->deleteFoto($id);
    }

    public function getcalonsimByID($id)
    {
        return $this->db->get_where('calonsim',['id'=> $id])->row_array();
    }

    public function ubahdatacalonsim() {
        $data=[
            "nama" => $this->input->post('nama',true),
            "nomorktp" => $this->input->post('nomorktp',true),
            "email" => $this->input->post('email',true),
            "provinsi" => $this->input->post('provinsi',true),
            "jeniskelamin" => $this->input->post('jeniskelamin',true),
            "foto" => $this->ubahFoto(),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('calonsim', $data);
    }

    public function cariDatacalonsim() {
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        $this->db->or_like('provinsi',$keyword);
        return $this->db->get('calonsim')->result_array();
    }
    public function datatabels(){
        $query = $this->db->order_by('id','DESC')->get('calonsim');
        return $query->result();
    }
}

/* End on file calonsim_model.php */

?>