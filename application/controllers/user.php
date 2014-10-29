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
    	//	else 
    	//		echo "Succeed<br>";
    	//	var_dump($pwd);
      		else if ($pwd[0]->password==$password)
    		{
    			$this->home();
    		}
    		else
    		{
    			echo "Password is wrong!<br>";
    		}
    	}



        public function home()
        {
            $this->load->view('home.html');
        }
        public function search()
        {
            $this->load->view('search.html');
        }



        public function manage()
        {
            $this->load->view('manage.html');
        }

        public function usermessage()
        {
            $this->load->view('usermessage.html');
        }
    }