<?php

/**
 * Description of offer_model
 *
 * @author Arek PC
 */
class offers_model extends CI_Model
{

    private $table_name = 'offers';

    public function get()
    {
        $this->db->select('`offers`.`id`, `type`, `users`.`login`, `price_doge`, `amount`, `price`, `status`, `method`, `offers`.`datatime_create`');
        $this->db->join('users', 'offers.user_id = users.id');
        $this->db->where('status', 0);
        $this->db->order_by('price_doge', 'asc');
        return $this->db->get($this->table_name);
    }

    public function add($user_id, $type, $description, $dogeprice, $dogeamount, $price)
    {
        $offer = array(
            'user_id' => $user_id,
            'type' => $type,
            'method' => $description,
            'price_doge' => $dogeprice,
            'amount' => $dogeamount,
            'price' => $price,
        );
        return $this->db->insert($this->table_name, $offer);
    }

    public function getUserOffers($user_id, $status = 0)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('status', $status);
        $this->db->order_by('price_doge', 'asc');
        return $this->db->get($this->table_name);
    }

    public function delete($user_id, $offer_id)
    {
        $where = array(
            'id' => $offer_id,
            'user_id' => $user_id,
        );
        $this->db->where($where);
        return $this->db->update($this->table_name, array('status' => 2));
    }

    public function countUserOnOffers($user_id)
    {
        $this->db->select('count(*) AS offerAmount');
        $res = $this->db->get_where($this->table_name, array('user_id' => $user_id, 'status' => 0));
        return $res->row()->offerAmount;
    }

}
