<?php

    header("Content-Type:text/html; charset=UTF-8");
    class Papermanage extends CI_Controller{

    	public function upload(){
            
            
    		$config['upload_path']='./thesis/';
    		$config['allowed_types']='pdf|doc|txt|docx';
            //$config['file_name']=$nid;
    		$this->load->library('upload',$config);
    		$this->upload->do_upload("upp");
    		
            $uploaddata=$this->upload->data();
           // var_dump($uploaddata);
            

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            //--------------------------------------ADD
            $username=$data['username'];
            $type1=$this->input->post('type1');
            $type2=$this->input->post('type2');
            $type3=$this->input->post('type3');
            $headline=$this->input->post('headline');
            $author=$this->input->post('author');
            $origin=$this->input->post('origin');
            $keywords=$this->input->post('keywords');
            $summary=$this->input->post('summary');
            $year=$this->input->post('year');
            $month=$this->input->post('month');


            $this->load->database();
            $sql="insert into papers (owner,type1,type2,type3,headline,author,origin,keywords,summary,year,month,type,location) values ('".$username."','".$type1."','".$type2."','".$type3."','".$headline."','".$author."','".$origin."','".$keywords."','".$summary."',".$year.",".$month.",'thesis','".$uploaddata['file_name']."') ";
            $res=$this->db->query($sql);
            //-------------------------------------

            $this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();
    //        var_dump($typetable);
        //    foreach ($typetable as $key => $value) {
        //        # code...
        //    }

            
            $data['types']=$types;
            $this->load->view('manage.html',$data);

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
            //$sql="update papers set type1='".$type1."'type2='".$type2."'type3='".$type3."'headline='".$headline."'author='".$author."'origin='".$origin."'keywords='".$keywords."'summary='".$summary."'year=".$year."month=".$month;
           // $res=$this->db->query($sql);
        }


        public function uploads(){
            $config['upload_path']='./thesis/';
            $config['allowed_types']='pdf|doc|txt|docx';
            //$config['file_name']=$nid;
            $this->load->library('upload',$config);
            $this->upload->do_upload("upps");
            
            $uploaddata=$this->upload->data();
            var_dump($uploaddata);
        }

    }