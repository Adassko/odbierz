<?php

class Links extends CI_Controller
{
	public function index()
	{
		$data = Array("title" => "Odbierz.tk");
		
		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->view('footer');
	}
}