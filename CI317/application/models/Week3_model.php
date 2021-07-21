<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Week3_model extends CI_Model {


	//建立一個查詢資料庫function
	function select_db($user_account)
	{
		$this->db->select('*');

		if($user_account)
		{
			$this->db->where('account',$user_account);
		}

		$query = $this->db->get('user');
		//return $query->result(); //回傳物件
		return $query->result_array(); //回傳陣列
	}

	//新增資料function
	function insert_db($data)
	{

		$this->db->insert('user', $data);

		//返回新增之後的資料庫 id
		return $this->db->insert_id();

	}

	//修改資料function
	function update_db($account, $data)
	{
		$this->db->where('account', $account);
		$this->db->update('user', $data);
		//返回資料庫受影響數 判斷與法是否正確執行
		return $this->db->affected_rows(); //回傳影響筆數
	}

	//刪除資料
	function remove_db($account)
	{
		$this->db->where('account', $account);
		$this->db->delete('user');
		//返回資料庫受影響數 判斷與法是否正確執行
		return $this->db->affected_rows();
	}

}
