<?php

    header("Content-Type:text/html; charset=UTF-8");
    class Addtype extends CI_Controller{
    	public function addtype1(){
    		$this->load->database();

    		$typename=$this->input->post('typename');
    		$sql="insert into types (typename,parenttype,typelevel) values ('".$typename."',0,1)";
    		$res=$this->db->query($sql);




            $this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();
    //        var_dump($typetable);
        //    foreach ($typetable as $key => $value) {
        //        # code...
        //    }

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $data['types']=$types;
            $this->load->view('manage.html',$data);

    	}

    	public function addtype2(){
    		$this->load->database();

    		$typename=$this->input->post('typename');
    		$parentid=$this->input->post('parentid');
    		
    		
    		$sql="insert into types (typename,parenttype,typelevel) values ('".$typename."',".$parentid.",2)";
    		$res=$this->db->query($sql);




    		$this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();
    //        var_dump($typetable);
        //    foreach ($typetable as $key => $value) {
        //        # code...
        //    }

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $data['types']=$types;
            $this->load->view('manage.html',$data);
    	}



    	public function addtype3(){
    		$this->load->database();

    		$typename=$this->input->post('typename');
    		$parentid=$this->input->post('parentid');
    		
    		
    		$sql="insert into types (typename,parenttype,typelevel) values ('".$typename."',".$parentid.",3)";
    		$res=$this->db->query($sql);




    		$this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();
    

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $data['types']=$types;
            $this->load->view('manage.html',$data);
    	}
    }