<?php
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
    			echo "No this user!<br>";
    	
            
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
    			echo "Password is wrong!<br>";
    		}
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