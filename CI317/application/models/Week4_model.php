<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Week4_model extends CI_Model {


	//查詢資料最大筆數
	function max_count()
	{
			$this->db->select('id');
			$query = $this->db->get('mdl_logstore_standard_log');

			return $query -> num_rows(); //回傳筆數數字
	}

	//搜尋資料
  function db_search($startnumber, $perpage)
  {

      $this->db->select("id,eventname");
      $this->db->limit($perpage,$startnumber);
      $query = $this->db->get('mdl_logstore_standard_log');

      return $query -> result_array();
  }

}
