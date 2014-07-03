<?php

if (!defined('BASEPATH'))
    die();

/**
 * Display all offers. 
 */
class Home extends Main_Controller
{

    public function index($warning = NULL)
    {
        $this->load->library('form_validation');

        // bid form
        if (!empty($_POST['bid'])) {
            $this->form_validation->set_rules('dogeprice', 'Cena 1 ÐOGE w PLN', 'callback_str_comma_replace|required|less_than[100]|greater_than[0.00000001]|numeric');
            $this->form_validation->set_rules('dogeamount', 'Ilość ÐOGE', 'callback_str_comma_replace|required|less_than[100000000]|greater_than[0.00000001]|numeric');
            $this->form_validation->set_rules('method', 'Opis transkacji', 'required|max_length[70]');

            if ($this->form_validation->run()) {
                $warning = $this->offer->add($this->session->userdata('user_id'), 1, $this->input->post('dogeprice'), $this->input->post('dogeamount'), $this->input->post('method'));
                if ($warning === NULL) {
                    $this->form_validation->unset_field_data();
                }
            } else {
                $warning = 'Popełniłeś błąd w formularzu!';
            }
        }
        // ask form
        if (!empty($_POST['ask'])) {
            $this->form_validation->set_rules('dogeprice2', 'Cena 1 ÐOGE w PLN', 'callback_str_comma_replace|required|less_than[100]|greater_than[0.00000001]|numeric');
            $this->form_validation->set_rules('dogeamount2', 'Ilość ÐOGE', 'callback_str_comma_replace|required|less_than[100000000]|greater_than[0.00000001]|numeric');
            $this->form_validation->set_rules('method2', 'Opis transkacji ASK', 'required|max_length[70]');

            if ($this->form_validation->run()) {
                $warning = $this->offer->add($this->session->userdata('user_id'), 2, $this->input->post('dogeprice2'), $this->input->post('dogeamount2'), $this->input->post('method2'));
                if ($warning === NULL) {
                    $this->form_validation->unset_field_data();
                }
            } else {
                $warning = 'Popełniłeś błąd w formularzu!';
            }
        }

        $data = array(
            'main_content' => 'offer/home',
            'data' => array(
                'offer' => $this->offer->getOffers(), // all offers
                'warning' => $warning, // warnings, errors
                'user' => (object) $this->session->all_userdata(), // user info 
            ),
        );
        $this->load->view('include/template1', $data);
    }

    /**
     * Custome validation function. Replace comma with dots.
     * 
     * @param string
     * @return double
     */
    public function str_comma_replace($str)
    {
        return (double) str_replace(",", ".", $str);
    }

}
