<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_models extends CI_Model
{

    public function _create($data = array(), $table = 'users')
    {
        $this->db->insert($table, $data);
    }
    
    public function _read($id, $table = 'products')
    {
        return $this->db->get_where($table, array('id' => $id))->row();
    }
    
    public function _update($id, $data = array(), $table = 'products')
    {
        if(!empty($id) and !empty($data))
        {
            $this->db->where('id', $id);
            $this->db->update($table, $data);    
        }  
    }

    public function _delete($id, $table = 'products')
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
        return $this->db->get('products')->result_array();
    }


    public function _banner_count()
    {
        return $this->db->get('products')->num_rows();
    }

    public function check_auth($email, $table = 'users')
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email', $email);
        return $query = $this->db->get();
    }    

}