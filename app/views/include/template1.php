<?php

$this->load->view('include/header');

$this->load->view('include/top', $data);

$this->load->view($main_content, $data);

$this->load->view('include/footer', $data);
