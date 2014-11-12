<?php

    header("Content-Type:text/html; charset=UTF-8");
    class User extends CI_Controller{

    

    	public function login()
        {

    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
            
    		$this->load->database();

    		$sql="select password from users where username = '".$username."'";
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

        public function home()
        {
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->view('home.html',$data);
        }
        public function search()
        {
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->view('search.html',$data);
        }



        public function manage()
        {
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $this->load->view('manage.html',$data);
        }

        public function usermessage()
        {
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
            $data['password']=$this->session->userdata('password');
            
            $this->load->view('usermessage.html',$data);
        }
    }