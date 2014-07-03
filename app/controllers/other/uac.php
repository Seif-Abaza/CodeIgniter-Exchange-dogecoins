<?php

if (!defined('BASEPATH'))
    die();

class Uac extends Main_Controller
{

    public function index()
    {
        $data = array(
            'main_content' => 'include/uac',
            'data' => array(
            ),
        );
        $this->load->view('include/template1', $data);
    }

}
