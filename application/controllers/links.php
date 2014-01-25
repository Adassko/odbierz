<?php

class Links extends CI_Controller
{
	public function index()
	{
		$data = Array("title" => "Odbierz.tk");
		
		$data["links"] = Array("a", "b", "c");
		$data["validation"] = $this->session->flashdata('validation');
		
		$this->load->view('header', $data);
		$this->load->view('links');
		$this->load->view('footer');
	}
	
	public function sendlink()
	{
		$this->load->library('form_validation');
		$this->load->model('Link_model');
		
		$this->form_validation->set_rules('link', 'Link', 'required');
		
		if ($this->form_validation->run() === false)
		{
			$this->session->set_flashdata('validation', validation_errors());
		}
		else
		{
			$url = $this->input->get_post('link');
			$title = $this->input->get_post('title');
			$key = $this->Link_model->save_link($url, $title);
			$this->session->set_flashdata('validation', $key);
		}
		
		redirect('/', 'location');
	}
}