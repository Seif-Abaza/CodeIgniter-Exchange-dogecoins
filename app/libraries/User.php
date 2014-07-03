<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User
 * 
 * Manage Users
 *
 * @author Arek PC
 */
class User
{

    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->model('users_model');
    }

    /**
     * This method is created only for this demo
     * 
     * @param string
     * @return object
     */
    public function login($user_login)
    {
        $exist = $this->ci->users_model->getByLogin($user_login);
        if ($exist->num_rows() == 0) {
            // user don't have acc, add user
            $add_user = array(
                'login' => $user_login,
            );
            $this->ci->users_model->add($add_user);
            $exist = $this->ci->users_model->getByLogin($user_login);
        }
        return $exist->row();
    }

    /**
     * Get user information from DB.
     * 
     * @param int
     * @return object
     */
    public function info($user_id)
    {
        $user = $this->ci->users_model->getById($user_id);
        return $user->row();
    }

    /**
     * Toggle 'tylko_nocny' option in DB. 
     * 
     * @param int
     * @param bool
     */
    public function toggleTylkoNocny($user_id, $tylko_nocny)
    {
        $result = !$tylko_nocny;
        $this->ci->users_model->toggleTylkoNocny($user_id, $result);
        return $result;
    }

}
