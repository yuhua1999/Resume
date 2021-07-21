<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Week3 extends CI_Controller {

	#第二週程式
	public function index()
	{
		$this->load->database(); 
		$this->load->view('Week3');
	}


	#讀取資料庫
	public function select()
	{
		$this->load->model("Week3_model");
		$account = $this->input->post('select_account',TRUE);
		$data = $this->Week3_model->select_db($account);


		/*
		//回傳物件之讀取格式
		foreach ($data as $row)
        {
                echo $row->account;
                echo $row->password;
                echo $row->name;
				echo $row->modify_date;
				echo "<br>";
        }
		*/

		/*
		//回傳陣列之讀取格式
		foreach ($data as $row)
        {
                echo $row['account'];
                echo $row['password'];
                echo $row['name'];
				echo $row['modify_date'];
				echo "<br>";
        }
		*/

		//回傳陣列之讀取格式
        $user_data['user_file']=$data;

		$this->load->view('week3_result', $user_data);
		//var_dump($user_data);

	}

	#新增資料
	public function add()
	{
		$this->load->model("Week3_model");

		$account 		= $this->input->post('account', TRUE);
		$name			= $this->input->post('name', TRUE);
		$password 		= $this->input->post('password', TRUE);
		$confirm_password = $this->input->post('confirm_password', TRUE);

		if( empty($account) || empty($password) || empty($confirm_password) || empty($name) || $password!=$confirm_password)
		{
			$message['error'] = "請確認欄位內容是否正確！！";
		}
		else
		{
			//查詢是否有帳號重複
			$check_account = $this->Week3_model->select_db($account);
			if($check_account)
			{
				$message['error'] = "已有此帳號，無法新增!!";
			}
			else
			{
				$data = array(
					'account' => $account,
					'password' => md5($password),
					'name' => $name,
					'modify_date' => date("Y-m-d H:i:s")
				);

				$temp = $this->Week3_model->insert_db($data);

				if($temp)
				{
					$message['success'] = "新增成功!!";
				}
				else
				{
					$message['error'] = "新增失敗!!";
				}
			}
		}
		$this->load->view('week3_result', $message);
	}

	#修改資料
	public function update()
	{
		$this->load->model("Week3_model");

		$account 		= $this->input->post('account', TRUE);
		$name			= $this->input->post('name', TRUE);

		if( empty($account) || empty($name))
		{
			$message['error'] = "請確認欄位內容是否正確！！";
		}
		else
		{
			$data = array(
				'name' => $name,
				'modify_date' => date("Y-m-d H:i:s")
			);

			$temp = $this->Week3_model->update_db($account,$data);

			if($temp)
			{
				$message['success'] = "修改成功!!";
			}
			else
			{
				$message['error'] = "修改失敗!!";
			}
		}

		$this->load->view('week3_result', $message);

	}

	#刪除資料
	public function db_delete()
	{
		$this->load->model("Week3_model");
		$account 		= $this->input->post('account', TRUE);

		if( empty($account) )
		{
			$message['error'] = "請確認欄位內容是否正確！！";
		}
		else
		{
			$temp = $this->Week3_model->remove_db($account);

			if($temp)
			{
				$message['success'] = "刪除成功!!";
			}
			else
			{
				$message['error'] = "刪除失敗!!";
			}
		}

		$this->load->view('week3_result', $message);

	}
}
