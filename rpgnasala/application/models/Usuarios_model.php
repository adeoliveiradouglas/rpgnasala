<?php
/**
 * Created by PhpStorm.
 * User: fgtorres
 * Date: 12/10/2018
 * Time: 08:56
 */

class Usuarios_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }
    public function insert($data) {
        return $this->db->insert('usuarios',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('usuarios');
    }
    public function selectAll()
    {
        $sql = "select * from usuarios as u ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByID($id)
    {
        $sql = "select * from usuarios as u where  u.id = {$this->db->escape_like_str($id)}  ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByEmailSenha($email, $senha)
    {
        $sql = "select * from usuarios as u where  u.email LIKE '{$this->db->escape_like_str($email)}' AND 
                 u.senha LIKE '{$this->db->escape_like_str($senha)}' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}