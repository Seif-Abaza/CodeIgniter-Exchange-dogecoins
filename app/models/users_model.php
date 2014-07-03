<?php

/**
 * Description of user_model
 *
 * @author Arek PC
 */
class Users_model extends CI_Model
{

    private $table_name = 'users';

    public function getById($user_id)
    {
        $this->db->where('id', $user_id);
        return $this->db->get($this->table_name);
    }

    public function getByLogin($user_login)
    {
        $this->db->where('login', $user_login);
        return $this->db->get($this->table_name);
    }

    public function add($add_user)
    {
        return $this->db->insert($this->table_name, $add_user);
    }

    public function toggleTylkoNocny($user_id, $toggle)
    {
        return $this->db->update($this->table_name, array('tylko_nocny' => $toggle), array('id' => $user_id));
    }

}
