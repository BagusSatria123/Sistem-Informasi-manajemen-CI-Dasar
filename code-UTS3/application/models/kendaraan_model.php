<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kendaraan_model extends CI_Model
{
    public function getkendaraan($id_kendaraan = null)
    {
        if ($id_kendaraan === null) {
            return $this->db->get('kendaraan')->result_array();
        } else {
            return $this->db->get_where('kendaraan', ['id_kendaraan' => $id_kendaraan])->result_array();
        }
    }
    public function deletekendaraan($id_kendaraan)
    {

        $this->db->delete('kendaraan', ['id_kendaraan' => $id_kendaraan]);
        return $this->db->affected_rows();
    }

    public function createkendaraan($data)
    {

        $this->db->insert('kendaraan', $data);
        return $this->db->affected_rows();
    }

    public function updatekendaraan($data, $id_kendaraan)
    {

        $this->db->update('kendaraan', $data, ['id_kendaraan' => $id_kendaraan]);
        return $this->db->affected_rows();
    }
}