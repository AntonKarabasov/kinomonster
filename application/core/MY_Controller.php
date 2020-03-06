<?php 

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['title'] = "КиноМонстр - сайт о кино";

		$this->load->model('news_model');
		$this->data['news'] = $this->news_model->getNews();

		$this->load->model('post_model');
		$this->data['post'] = $this->post_model->getPost();

		$this->load->model('films_model');
		$this->data['films'] = $this->films_model->getFilmsByRating(10);
	}

}

?>