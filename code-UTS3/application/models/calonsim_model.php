<?php

defined('BASEPATH') or exit('No direct script access allowed');

class calonsim_model extends CI_Model
{
    public function getcalonsim($id = null)
    {
        if ($id === null) {
            return $this->db->get('calonsim')->result_array();
        } else {
            return $this->db->get_where('calonsim', ['id' => $id])->result_array();
        }
    }
    public function deletecalonsim($id)
    {

        $this->db->delete('calonsim', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createcalonsim($data)
    {

        $this->db->insert('calonsim', $data);
        return $this->db->affected_rows();
    }

    public function updatecalonsim($data, $id)
    {

        $this->db->update('calonsim', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}