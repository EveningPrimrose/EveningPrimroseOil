<?php

    class Papermanage extends CI_Controller{

    	public function upload(){
            
            
    		$config['upload_path']='./thesis/';
    		$config['allowed_types']='pdf|doc|txt|docx';
            //$config['file_name']=$nid;
    		$this->load->library('upload',$config);
    		$this->upload->do_upload("upp");
    		$this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->view('manage.html',$data);

    	}


    	public function add(){

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();
            //改为添加语句
    		//$sql="select * from ".$username." where headline like '%".$title."%' and author like '%".$author."%' and keywords like '%".$keywords."%' and year>".$year1." and year<".$year2;
    		//$res=$this->db->query($sql);
    	}


    	public function delete(){
            
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();
            //改为删除语句
    		//$sql="select * from ".$username." where headline like '%".$title."%' and author like '%".$author."%' and keywords like '%".$keywords."%' and year>".$year1." and year<".$year2;
    		//$res=$this->db->query($sql);
    	}
    }