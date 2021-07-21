<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Week4 extends CI_Controller {

    function index (){

        $this->load->model("Week4_model");
        $this->load->library('pagination');

        //頁碼
        $page_number = (int)$this->input->get('per_page', TRUE);

        //設定網址
        $config['base_url'] = base_url('Week4');
        //最大筆數
        $config['total_rows'] = $this->Week4_model->max_count();
        //每頁有幾筆
        $config['per_page'] = 20;
        //設 TRUE 的話，網址變為GET形式
        $config['page_query_string'] = TRUE;
        //將網址列的頁碼數字，由資料列數修正為頁數。
        $config['use_page_numbers'] = TRUE;
        //設定每頁讀取起始資料列數
        if ($page_number==0){
            $start_number=0;
        }else{
            $start_number = $config['per_page']*($page_number-1);
        }


        //設定分頁
        $this->pagination->initialize($config);
        //搜尋資料
        $data = $this->Week4_model->db_search($start_number, $config['per_page']);
        var_dump($start_number);
        var_dump($config['per_page']);
        var_dump($data);

        echo $this->pagination->create_links(); //回傳分頁介面


    }



}
