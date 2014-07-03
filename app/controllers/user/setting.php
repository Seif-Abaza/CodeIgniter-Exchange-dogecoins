<?php

if (!defined('BASEPATH'))
    die();

class Setting extends Main_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
    }

    function index($param = NULL)
    {
        $data = array(
            'main_content' => 'user/setting',
            'data' => array(
                'user' => (object) $this->session->all_userdata(), // user info 
            ),
        );
        $this->load->view('include/template1', $data);
    }

    /**
     * Turn on/off dark theme. Toggle 'tylko nocny' option in session and DB. 
     */
    public function toggleTylkoNocny()
    {
        $tylko_nocny = $this->user->toggleTylkoNocny($this->session->userdata('user_id'), $this->session->userdata('tylko_nocny'));
        $this->session->set_userdata('tylko_nocny', $tylko_nocny);
        redirect('user/setting');
    }

    /**
     * Check privileges. User need to be logged in.
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
