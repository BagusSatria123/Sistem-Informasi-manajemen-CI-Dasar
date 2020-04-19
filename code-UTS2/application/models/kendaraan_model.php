<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kendaraan_model extends CI_Model {

    public function getAllkendaraan()
    {
        $query=$this->db->get('kendaraan');
        return $query->result_array();
    }

    public function tambahdatakendaraan(){
        $data=[
        "nomorkendaraan" => $this->input->post('nomorkendaraan',true),
        "jeniskendaraan" => $this->input->post('jeniskendaraan',true),
        "merkkendaraan" => $this->input->post('merkkendaraan',true),
        "tahunbeli" => $this->input->post('tahunbeli',true),
        ];
        $this->db->insert('kendaraan', $data);
    }

    public function hapusdatakendaraan($id_kendaraan) {
        $this->db->where('id_kendaraan', $id_kendaraan);
        $this->db->delete('kendaraan');
    }

    public function getkendaraanByID($id_kendaraan)
    {
        return $this->db->get_where('kendaraan',['id_kendaraan'=> $id_kendaraan])->row_array();
    }

    public function ubahdatakendaraan() {
        $data=[
            "nomorkendaraan" => $this->input->post('nomorkendaraan',true),
            "jeniskendaraan" => $this->input->post('jeniskendaraan',true),
            "merkkendaraan" => $this->input->post('merkkendaraan',true),
            "tahunbeli" => $this->input->post('tahunbeli',true),
            ];
        $this->db->where('id_kendaraan', $this->input->post('id_kendaraan'));
        $this->db->update('kendaraan', $data);
    }

    public function cariDatakendaraan() {
        $keyword=$this->input->post('keyword');
        $this->db->like('jeniskendaraan',$keyword);
        $this->db->or_like('tahunbeli',$keyword);
        return $this->db->get('kendaraan')->result_array();
    }
}


/* End on file matakuliah_model.php */

?>