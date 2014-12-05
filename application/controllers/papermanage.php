<?php

    header("Content-Type:text/html; charset=UTF-8");
    class Papermanage extends CI_Controller{

    	public function upload(){
            
            
    		$config['upload_path']='./thesis/';
    		$config['allowed_types']='pdf|doc|txt|docx';
            $config['file_name']=uniqid();
    		$this->load->library('upload',$config);
    		$this->upload->do_upload("upp");
    		
            $uploaddata=$this->upload->data();
           // var_dump($uploaddata);
            

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            //--------------------------------------GET TYPE
            $typeid=$this->input->post('typeid');
            $this->load->database();
            $sql="select * from types where typeid=".$typeid;
            $res=$this->db->query($sql);
            $type3=$res->result();
            $sql="select * from types where typeid=".$type3[0]->parenttype;
            $res=$this->db->query($sql);
            $type2=$res->result();
            $sql="select * from types where typeid=".$type2[0]->parenttype;
            $res=$this->db->query($sql);
            $type1=$res->result();





            //--------------------------------------ADD
            $username=$data['username'];
            
            $headline=$this->input->post('headline');
            $author=$this->input->post('author');
            $authortwo=$this->input->post('authortwo');
            $authorthree=$this->input->post('authorthree');
            $origin=$this->input->post('origin');
            $keywords=$this->input->post('keywords');
            $summary=$this->input->post('summary');
            $year=$this->input->post('year');
            $month=$this->input->post('month');


            $this->load->database();
            $sql="insert into papers (owner,type1,type2,type3,headline,author,authortwo,authorthree,origin,keywords,summary,year,month,type,location) values ('".$username."','".$type1[0]->typename."','".$type2[0]->typename."','".$type3[0]->typename."','".$headline."','".$author."','".$authortwo."','".$authorthree."','".$origin."','".$keywords."','".$summary."',".$year.",".$month.",'thesis','".$uploaddata['file_name']."') ";
            $res=$this->db->query($sql);
            //-------------------------------------ADD author the second and the third author
            








            //-----------------------------------

            $this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();
    

            
            $data['types']=$types;
            $this->load->view('manage.html',$data);

    	}


    	


    	public function delete(){
            
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();
            $papernumber=$this->uri->segment(3);
    		$sql="delete from papers where papernumber = ".$papernumber;
    		$res=$this->db->query($sql);




//------------------user/search
            $this->load->database();
            $sql="select * from types";
            $res=$this->db->query($sql);
            $types=$res->result();

            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $data['types']=$types;
            $data['typenumber']=count($types);
            $this->load->view('search.html',$data);

    	}

        public function revise(){
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->database();

            
            $number=$this->uri->segment(3);
            $newheadline=$this->input->post('headline');
            $newauthor=$this->input->post('author');
            $neworigin=$this->input->post('origin');
            $newyear=$this->input->post('year');
            $newmonth=$this->input->post('month');
            $newkeyword=$this->input->post('keyword');
            $newsummary=$this->input->post('summary');
            

            //修改分类

            $sql="update papers set ".$changecol."= '".$changeval."' where papernumber=".$changenumber;
            $res=$this->db->query($sql);
            $sql="update papers set ".$changecol."= '".$changeval."' where papernumber=".$changenumber;
            $res=$this->db->query($sql);
            $sql="update papers set ".$changecol."= '".$changeval."' where papernumber=".$changenumber;
            $res=$this->db->query($sql);
            $sql="update papers set ".$changecol."= '".$changeval."' where papernumber=".$changenumber;
            $res=$this->db->query($sql);
            $sql="update papers set ".$changecol."= '".$changeval."' where papernumber=".$changenumber;
            $res=$this->db->query($sql);
            $sql="update papers set ".$changecol."= '".$changeval."' where papernumber=".$changenumber;
            $res=$this->db->query($sql);





            //------------------showpaper/showinformation
            $this->load->library('session');
            $username=$this->session->userdata('username');

            $this->load->database();
            $sql="select * from papers where papernumber = ".$changenumber;
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
            $data['origin']=$resu[0]->origin;
            $data['keywords']=$resu[0]->keywords;
            $data['summary']=$resu[0]->summary;
            $data['year']=$resu[0]->year;
            $data['month']=$resu[0]->month;
            $data['type']=$resu[0]->type;
            $data['location']=$resu[0]->location;
            //echo $data['type'];
            if ($data['type']=='references')
                $this->load->view('showinformation2.html',$data);
            else
                $this->load->view('showinformation.html',$data);
        }



//----------unused----------------
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