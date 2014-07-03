<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Offer
 * 
 * Manage Offers
 *
 * @author Arek PC
 */
class Offer
{

    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->config->load('offer_config');
        $this->ci->load->library('code');
        $this->ci->lang->load('offer', 'polish');
    }

    /**
     * Add user offer
     * 
     * @param   int 
     * @param   int  (1 - bid, 2 - ask)
     * @param   double 
     * @param   double 
     * @param   string 
     * @return  string
     */
    public function add($user_id, $type, $dogeprice, $dogeamount, $description)
    {
        $warning = NULL;
        $user_offers = $this->ci->offers_model->countUserOnOffers($user_id);

        // get offer limit from config
        $offer_limit = $this->ci->config->item('offer_limit');

        if ($user_offers < $offer_limit) {
            $price = $this->countPrice($dogeprice, $dogeamount);
            if (!($price < 0.01)) {
                $this->ci->offers_model->add($user_id, $type, $description, $dogeprice, $dogeamount, $price);
                return NULL;
            } else {
                $warning = 'Cena transakcji musi być większa niż 1 grosz !'; //$this->ci->lang->line['offer_incorrect_amount'];
            }
        } else {
            $warning = 'Nie możesz dodać więcej ofert !'; //$this->ci->lang->line['offer_to_many_items'];
        }
        return $warning;
    }

    /**
     * Count price and round 
     * 
     * @param   double $dogeprice
     * @param   double $dogeamount
     * @return  double
     */
    public function countPrice($dogeprice, $dogeamount)
    {
        return round($dogeprice * $dogeamount, 2);
    }

    /**
     * Get all not removed offers and code IDs
     * 
     * @return  object
     */
    public function getOffers()
    {
        $offers = $this->ci->offers_model->get();
        foreach ($offers->result() as $row) {
            $row->offer_id = $this->ci->code->toBase($row->id); // code id
        }
        return $offers;
    }

    /**
     * Get all user not removed offers and code IDs
     * 
     * @param   int
     * @param   int 0-on, 2-deleted
     * @return  object
     */
    public function getUserOffers($user_id, $status)
    {
        $offers = $this->ci->offers_model->getUserOffers($user_id, $status);
        foreach ($offers->result() as $row) {
            $row->offer_id = $this->ci->code->toBase($row->id); // code id
        }
        return $offers;
    }

    /**
     * Decode ID and delete user offer
     * 
     * @param   int 
     * @param   string
     */
    public function delete($user_id, $offer_id)
    {
        $offer_id2 = $this->ci->code->to10($offer_id);
        $this->ci->offers_model->delete($user_id, $offer_id2);
    }

}
