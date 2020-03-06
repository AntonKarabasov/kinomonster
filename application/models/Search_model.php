<?php 

class Search_Model extends CI_Model {

	public function search($q) {
		$array_search = array(
			'name' => $q,
			'descriptions' => $q
		);

		$query = $this->db
			->or_like($array_search)
			->limit(100)
			->get('movie');

		//echo $this->db->last_query();	

		return $query->result_array();	
	}
}