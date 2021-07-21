<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Week2 extends CI_Controller {


	#第二週程式
	public function index()
	{
		$this->load->helpers('uri');
		$this->load->view('Week2');
	}


	#URI 設定
	public function dog()
	{
		//echo "dog".$number;
		#segment 為取出網址上之數值(1:controller, 2:function , 3:參數)
		echo $product_id = $this->uri->segment(1, '無');
		//$this->load->view('welcome_message');
	}

	#INPUT 傳遞驗證
	#public 供所有網頁使用、private 只供此controller使用。
	public function confirm()
	{
		#$this->load->helper('cookie');//載入CI的cookie輔助函式

		#若要自動載入，則到 C:\wamp64\www\CI316\application\config\autoload.php
		#將 $autoload['helper'] = array();
		#改為 $autoload['helper'] = array('cookie');
		#即可自動載入。

		#先刪除錯誤訊息cookie
		if($this->input->cookie('error'))
		{
			delete_cookie('error');
		}

		#預設帳密
		$ac = "yuhua";
		$passwd = "loveluan";

		#POST方式

		//$a = $this->input->post(NULL); //post(NULL) 為讀取所有POST參數
		$account = $this->input->post('account', true); //post('參數',true) 為讀取post[account]的參數，並且進行xss_clean()安全過濾，若用false則為不使用安全過濾。
		$password = $this->input->post('password', true); //post('參數',true) 為讀取post[password]的參數
		//var_dump($account);
		//var_dump($password);


		#GET方式
		/*
		$account = $this->input->get('account', true);
		$password = $this->input->get('password', true);
		var_dump($account);
		var_dump($password);
		*/

		#比對帳密是否正確
		if($account == $ac && $password == $passwd)
		{
			echo "登入成功!!";
		}
		else
		{
			#記錄cookie錯誤訊息
			$cookie['name'] = 'error';
			$cookie['value'] = 'Warning!! Account or password is wrong.';
			$cookie['expire'] = 0;//cookie執行時間，0代表永久
			$this->input->set_cookie($cookie);

			$error = $this->input->cookie('error');
			//delete_cookie('error');

			echo $error;

		}


		//var_dump($this->input->server(array('SERVER_PROTOCOL', 'REQUEST_URI')));
	}


}
