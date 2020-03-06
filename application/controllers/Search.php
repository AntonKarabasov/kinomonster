<?php 

defined('BASEPATH') OR exit('No direc script access allowed');

class Search extends MY_Controller {

	public function __constract() {
		parent::__constract();
	}

	public function index() {
		$this->data['title'] = "Поиск";

		$this->load->model('search_model');
		$this->data['search_result'] = array();

		if($this->input->get('q_search')) {
			$this->data['search_result'] = $this->search_model->search($this->input->get('q_search'));
		}


		$this->load->view('templates/header', $this->data);
		$this->load->view('search', $this->data);
		$this->load->view('templates/footer');

	}

}