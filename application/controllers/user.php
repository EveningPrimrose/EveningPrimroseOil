<?php

    header("Content-Type:text/html; charset=UTF-8");
    class User extends CI_Controller{

    

    	public function login()
        {

    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
            
    		$this->load->database();

    		$sql="select * from users where username = '".$username."'";
    		$getpwd=$this->db->query($sql);
    		$pwd=$getpwd->result();
        
    		if (empty($pwd))
    			echo "No this user!<br>";//可增错误页面
    	
            
      		else if ($pwd[0]->password==$password)
    		{
                //$usermessage=array('username' =>$username ,'password'=>$password );
                $this->load->library('session');
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('password',$password);
                $this->session->set_userdata('email',$pwd[0]->email);
    			$this->home();
    		}
    		else
    		{
    			echo "Password is wrong!<br>";//可增页面
    		}
    	}

        
        public function signupcheck(){
            $signupname= $this->input->post('signname');
            $signupemail= $this->input->post('signemail');
            $signuppwd= $this->input->post('signpwd');
            $signuppwd2= $this->input->post('signpwd2');
            echo $signupname;
            if ($signuppwd!=$signuppwd2)
            {
                echo "密码错误！<br>";//可增页面
            }
            else
            {
                $this->load->database();
                $sql="select * from users where username = '".$signupname."';";
                $res=$this->db->query($sql);
                $exist=$res->result();
                if (empty($exist)){

                    $sql="insert into users (username,password,email) values ('".$signupname."','".$signuppwd."','".$signupemail."');";
                    $res=$this->db->query($sql);

                    if ($res)
                    echo "注册成功<br>";
                }
                else
                {
                    echo "用户已存在！<br>";
                } 
            }
            
        }


        public function signup(){
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->view('signup.html',$data);
        }


        public function changepwd(){
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');

            $newpwd=$this->input->post('newpwd');

            $this->load->database();
            $sql="update users set password ='".$newpwd."' where username='".$data['username']."'";
            $res=$this->db->query($sql);

            $this->session->set_userdata('password',$newpwd);
            $this->usermessage();
        }





        public function home()
        {
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->view('home.html',$data);
        }
        public function search()
        {
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



        public function manage()
        {
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

        public function usermessage()
        {
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $data['password']=$this->session->userdata('password');
            $data['email']=$this->session->userdata('email');
            $this->load->view('usermessage.html',$data);
        }
    }