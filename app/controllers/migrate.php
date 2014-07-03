<?php

if (!defined('BASEPATH'))
    die();

class Migrate extends Main_Controller
{

    public function index()
    {
        $this->load->library('migration');

        if (!$this->migration->current()) {
            echo '<h3>Can\'t migrated!</h3>';
            show_error($this->migration->error_string());
        } else {
            $info = '<h3>Successfully migrated!</h3>';
            $info .= 'Now you delete this file from controllers.';
            echo $info;
        }
    }

}
