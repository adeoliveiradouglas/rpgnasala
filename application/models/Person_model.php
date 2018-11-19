<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH . 'entities/Person.php';

class Person_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getPersonByLoginAndPassword($postData)
    {
        $result = $this->db->get_where(Person::TABLE_NAME, $postData);
        return $result->row();
    }

    function insert($data)
    {
        try {
            $this->db->from(Person::TABLE_NAME);
            $this->db->where('email', $data['email']);
            $result = $this->db->count_all_results();

            if ($result > 0) {
                throw new Exception('e-mail ' . $data['email'] . ' já está cadastrado!');
            }

            $this->db->insert(Person::TABLE_NAME, $data);
            return $this->db->affected_rows();
        } catch (ErrorException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    function getAll()
    {
        $query = $this->db->get(Person::TABLE_NAME);
        return $query->result();
    }

    function deleteById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(Person::TABLE_NAME);
        return $this->db->affected_rows();
    }

    function update($person)
    {
        try {
            $this->db->where('id', $person['id']);
            $this->db->update(Person::TABLE_NAME, $person);
            return $this->db->affected_rows();
        } catch (ErrorException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    function getById($person)
    {
        $data = [
            'id' => $person['id']
        ];
        $result = $this->db->get_where(Person::TABLE_NAME, $data);
        return $result->row();
    }
    
    function getByEmail($email)
    {
        $data = [
            'email' => $email
        ];
        $result = $this->db->get_where(Person::TABLE_NAME, $data);
        return $result->row();
    }
}

