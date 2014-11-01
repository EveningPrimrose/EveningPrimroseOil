<?php
    class Showpaper extends CI_Controller{

    	public function showinformation(){

    		$papername = $this->uri->segment(3);


    		$this->load->library('session');
            $username=$this->session->userdata('username');

            $this->load->database();
    		$sql="select * from ".$username." where headline = '".$papername."'";
    		$res=$this->db->query($sql);
    		$resu=$res->result();
    		var_dump($resu);
    		//分配参数
    		$this->load->view('showinformation.html',$data);

    	}

    	public function showcontent(){
    		$this->load->view("showcontent.html");
    	}
    }