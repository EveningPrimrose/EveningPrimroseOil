<?php

    class Showpaper extends CI_Controller{

    	public function showinformation(){

    		$papername = $this->uri->segment(3);


    		$this->load->library('session');
            $username=$this->session->userdata('username');

            $this->load->database();
    		$sql="select * from ".$username." where papernumber = '".$papername."'";
    		$res=$this->db->query($sql);
    		$resu=$res->result();
    		
    		//分配参数
            $this->load->library('session');
            $username=$this->session->userdata('username');

            $data['username']=$username;
            $data['papernumber']=$resu[0]->papernumber;
            $data['type']=$resu[0]->type;
            $data['location']=$resu[0]->location;
            //echo $data['type'];
            if ($data['type']=='references')
                $this->load->view('showinformation2.html',$data);
            else
    		    $this->load->view('showinformation.html',$data);

    	}

    	public function showcontent(){
    		$this->load->view("showcontent.html");
    	}
    }