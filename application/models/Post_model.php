<?php

class Post_model extends CI_model {

	public function __construct() {
		$this->load->database();
	}

	public function getPost($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->get('post');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('post', array('slug'=> $slug));
		return $query->row_array();

	}

	public function setPost($slug, $title, $text) {

		$data = array(
			'title' => $title,
			'slug' => $slug,
			'text' => $text
		);

		return $this->db->insert('post', $data);

	}

	public function updatePost($slug, $title, $text) {

		$data = array(
			'title' => $title,
			'slug' => $slug,
			'text' => $text
		);

		return $this->db->update('post', $data, array('slug' => $slug));

	}

	public function deletePost($slug) {
		return $this->db->delete('post', array('slug' => $slug));
	}

}