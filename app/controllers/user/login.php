<?php

if (!defined('BASEPATH'))
    die();

class Login extends Main_Controller
{

    public function index()
    {
        // 
        $user_demo_login = 'demo';
        //

        $user = $this->user->login($user_demo_login);

        if (isset($user) && $user != NULL) {
            $data = array(
                'isLoggedIn' => TRUE,
                'user_id' => $user->id,
                'login' => $user_demo_login,
                'tylko_nocny' => $user->tylko_nocny,
            );
            $this->session->set_userdata($data);
        }
        redirect();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }

    /**
     * Check privileges. 
     */
    public function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            redirect('other/uac');
            die();
        }
    }

}
