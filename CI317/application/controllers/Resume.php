<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Resume extends CI_Controller
{

    function __construct(){

		parent::__construct();

		$this->load->model("Resume_model");
	}

    public function index()
    {

        $data = array();

		$data['message'] = $this->input->cookie('message', TRUE);

        delete_cookie('message');

        if( $data['message'] )
		{
			$data['message_flag'] = TRUE;
		}
        else
		{
			$data['message_flag'] = FALSE;
		}


        //請同學從資料庫的about資料表中，讀取資料，並呈現到about畫面上。
        $data['about'] = $this->Resume_model->select_about();

        $this->load->view('Resume',	$data);
    }

    public function login()
    {
        //接收帳號密碼
        $account = $this->input->post('account',TRUE);
        $password = $this->input->post('password',TRUE);

        //比對資料庫account帳密是否正確
        $result = $this->Resume_model->select_db($account,$password);
        if (!empty($result))
        {
            $about = $this->Resume_model->select_about();

            $this->session->set_userdata($result);
            $this->session->set_userdata($about);
        }
        redirect(base_url('Resume'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('Resume'));
    }

    public function update()
    {
		$lastname 		= $this->input->post('lastname', TRUE);
		$firstname		= $this->input->post('firstname', TRUE);
        $address		= $this->input->post('address', TRUE);
        $phone		    = $this->input->post('phone', TRUE);
        $email	     	= $this->input->post('email', TRUE);
        $introduction	= $this->input->post('introduction', TRUE);

        $data = array(
            'lastname' => $lastname,
            'firstname' => $firstname,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'introduction' => $introduction,
            'modify_date' => date("Y-m-d H:i:s")
        );

        $temp = $this->Resume_model->update_db($data);

        if($temp)
        {
            $_SESSION['lastname'] = $lastname;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['address'] = $address;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['introduction'] = $introduction;

            $this->input->set_cookie('message', '修改成功!!', 0);
        }
        else
        {
            $this->input->set_cookie('message', '修改失敗!!', 0);
        }
        redirect(base_url('Resume'));
    }
}
