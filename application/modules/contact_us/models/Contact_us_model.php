<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us_model extends CI_Model
{
    public function _create($data = array(), $table = 'contact_us')
    {
        $this->db->insert($table, $data);
    }
    
    public function _read($id, $table = 'contact_us')
    {
        return $this->db->get_where($table, array('id' => $id))->row();
    }
    
    public function _update($id, $data = array(), $table = 'contact_us')
    {
        if(!empty($id) and !empty($data))
        {
            $this->db->where('id', $id);
            $this->db->update($table, $data);    
        }  
    }

    public function _delete($id, $table = 'contact_us')
    {
        if(!empty($id))
        {
            $this->db->where('id', $id);
            $this->db->delete($table);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function _datatable_index()
    {
        return $this->db->get('contact_us')->result_array();
    }
}