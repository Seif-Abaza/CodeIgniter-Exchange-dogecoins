<?php

if (!defined('BASEPATH'))
    die();

/**
 * Display user offers.
 */
class My extends Main_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        if (!empty($_GET['del'])) {
            $this->load->library('form_validation');
            // CI->Form_validation class validate only POST data
            $_POST['del'] = $_GET['del'];

            $this->form_validation->set_rules('del', 'Usuń', 'required|alpha_numeric');
            if ($this->form_validation->run()) {
                $this->offer->delete($user_id, $this->input->get('del'));
            }
        }

        $data = array(
            'main_content' => 'offer/myoffer',
            'data' => array(
                'offer' => $this->offer->getUserOffers($user_id, 0), // user offers
                'user' => (object) $this->session->all_userdata(), // user info 
            ),
        );
        $this->load->view('include/template1', $data);
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
