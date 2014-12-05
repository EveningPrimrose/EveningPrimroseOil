<?php
    class Showpaper extends CI_Controller{

    	public function showinformation(){

    		$papername = $this->uri->segment(3);


    		$this->load->library('session');
            $username=$this->session->userdata('username');

            $this->load->database();
    		$sql="select * from papers where papernumber = '".$papername."'";
    		$res=$this->db->query($sql);
    		$resu=$res->result();
    		
    		//分配参数
            $this->load->library('session');
            $username=$this->session->userdata('username');

            $data['username']=$username;
            $data['papernumber']=$resu[0]->papernumber;
            $data['type1']=$resu[0]->type1;
            $data['type2']=$resu[0]->type2;
            $data['type3']=$resu[0]->type3;
            $data['headline']=$resu[0]->headline;
            $data['author']=$resu[0]->author;
            $data['authortwo']=$resu[0]->authortwo;
            $data['authorthree']=$resu[0]->authorthree;
            $data['origin']=$resu[0]->origin;
            $data['keywords']=$resu[0]->keywords;
            $data['summary']=$resu[0]->summary;
            $data['year']=$resu[0]->year;
            $data['month']=$resu[0]->month;
            $data['type']=$resu[0]->type;
            $data['location']=$resu[0]->location;

            //-----------------types
            $this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();
            $data['types']=$types;






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