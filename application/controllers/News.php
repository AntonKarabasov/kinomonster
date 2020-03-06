<?php 

defined('BASEPATH') OR exit('No direc script access allowed');

class News extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index() {
		if(!$this->dx_auth->is_admin()) {
			show_404();
		}


		$this->data['title'] = "Все новости";
		$this->data['news'] = $this->news_model->getNews();

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/index', $this->data);
		$this->load->view('templates/footer');

	}

	public function view($slug = NULL) {
			$this->data['news_item'] = $this->news_model->getNews($slug);

			/*if(empty($this->data['news_item'])) {
				show_404();
			}*/

			$this->data['title'] = $this->data['news_item']['title'];
			$this->data['content'] = $this->data['news_item']['text'];

			$this->load->view('templates/header', $this->data);
			$this->load->view('news/view', $this->data);
			$this->load->view('templates/footer');
		}

	public function create() {

		if(!$this->dx_auth->is_admin()) {
			//show_404();
			$this->load->helper('url_helper');
			redirect('/', 'location');
		}

		$data['title'] = "добавить новость";

		if($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {

			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$text = $this->input->post('text');

			if($this->news_model->setNews($slug, $title, $text)) {
				$this->load->view('templates/header', $this->data);
				$this->load->view('news/success', $this->data);
				$this->load->view('templates/footer');
			}
		} else {
			$this->load->view('templates/header', $this->data);
			$this->load->view('news/create', $this->data);
			$this->load->view('templates/footer');
		}

	}


	public function edit($slug = NULL) {
		if(!$this->dx_auth->is_admin()) {
			show_404();
		}


		$this->data['title'] = "редактировать новость";
		$this->data['news_item'] = $this->news_model->getNews($slug);

/*		if(empty($data['news_item'])) {
			show_404();
		}*/

		$this->data['title_news'] = $this->data['news_item']['title'];
		$this->data['content_news'] = $this->data['news_item']['text'];
		$this->data['slug_news'] = $this->data['news_item']['slug'];

		if($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$text = $this->input->post('text');

			if($this->news_model->updateNews($slug, $title, $text)) {
				echo "Новость успешно отредактирована";
			}
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/edit', $this->data);
		$this->load->view('templates/footer');

	}

	public function delete($slug = NULL) {
		if(!$this->dx_auth->is_admin()) {
			show_404();
		}


		$this->data['news_delete'] = $this->news_model->getNews($slug);

/*		if(empty($data['news'])) {
			show_404();
		}*/

		$this->data['title'] = "удалить новость";
		$this->data['result'] = "Ошибка удаления ".$this->data['news_delete']['title'];

		if($this->news_model->deleteNews($slug)) {
			$this->data['result'] = $this->data['news_delete']['title']." успешно удалена";
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/delete', $this->data);
		$this->load->view('templates/footer');

	}


}