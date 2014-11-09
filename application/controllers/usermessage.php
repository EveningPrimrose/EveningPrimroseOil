<?php
    class Usermessage extends CI_Controller{


    	public function changepwd(){
            
    	}

    	public function checkpwd(){
    		$this->load->view('changepwd.html',$data);
    	}
    }