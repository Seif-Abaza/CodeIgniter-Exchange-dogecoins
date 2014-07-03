<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Create tables in DB: users, offers
 * 
 * BEFORE MIGRATE, USE THIS SQL IN YOUR DB
 * IT WILL CREATE ci_sessions TABLE
 
CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);

 * 
 */
class Migration_Create_users_offers extends CI_Migration
{

    public function up()
    {
        // users table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => FALSE,
            ),
            'ip' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => TRUE,
                'default' => NULL,
            ),
            'tylko_nocny' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => 0,
            ),
            'datatime_create' => array(
                'type' => 'TIMESTAMP',
                'current_timestamp' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        // offers table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'type' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => 0,
            ),
            'method' => array(
                'type' => 'VARCHAR',
                'constraint' => 70,
                'null' => FALSE,
                'default' => '',
            ),
            'price_doge' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,8',
            ),
            'amount' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,8',
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ),
            'status' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => 0,
            ),
            'datatime_create' => array(
                'type' => 'TIMESTAMP',
                'current_timestamp' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('offers');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
        $this->dbforge->drop_table('offers');
    }

}
