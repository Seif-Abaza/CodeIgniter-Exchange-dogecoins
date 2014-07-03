<?php

if (!defined('BASEPATH'))
    die();

class My404 extends Main_Controller
{

    public function index()
    {

        $data = array(
            'main_content' => 'include/my404',
            'data' => array(
            ),
        );
        $this->load->view('include/template1', $data);
    }

}
