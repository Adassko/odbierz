<?php

class Link_model extends CI_Model
{
	public $id;
	public $latitude;
	public $longitude;
	public $accuracy;
	public $ip;
	public $ttl;
	public $expiration_date;
	public $link;
	public $title;
	public $removal_key;
	public $hashcode;
	public $flags;
	
	function save_link($link, $title)
	{
		$this -> link = $link;
		$this -> title = $title;
		
		$this -> hashcode = md5($this -> link . $this -> title);
		$this -> removal_key = bin2hex(openssl_random_pseudo_bytes(8));
		
		$this -> longitude = 50;
		$this -> latitude = 60;
		$this -> accuracy = 0;
		$this -> flags = 0;
		$this -> ip = $this->input->server('REMOTE_ADDR');
		
		$success = $this->db->insert('links', $this);

		return $success ? $this -> removal_key : false;
	}
}
