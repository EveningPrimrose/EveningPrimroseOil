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
            //--------------------------------------ADD
            $this->load->database();
            $sql="insert into papers (owner,type1,type2,type3,headline,author,origin,keywords,summary,year,month，type,location) values ('".$username."','".$type1."','".$type2."','".$type3."','".$headline."','".$author."','".$origin."','".$keywords."','".$summary."',".$year.",".$month.",'".$type."','".$location."') ";
            $res=$this->db->query($sql);
            //-------------------------------------
            $this->load->view('manage.html',$data);

    	}


    	public function add(){

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();
            //改为添加语句
    		$sql="insert";
    		$res=$this->db->query($sql);
    	}


    	public function delete(){
            
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();
            //改为删除语句
    		$sql="delete from papers where papernumber = ".$papernmuber;
    		$res=$this->db->query($sql);
    	}

        public function revise(){
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();
            //改为修改语句
            $sql="update papers set type1='".$type1."'type2='".$type2."'type3='".$type3."'headline='".$headline."'author='".$author."'origin='".$origin."'keywords='".$keywords."'summary='".$summary."'year=".$year."month=".$month.;
            $res=$this->db->query($sql);
        }
    }