<?php
    class Search extends CI_Controller
    {
    	public function index()
    	{
    		$title = $this->input->post('title');
    		$author = $this->input->post('author');
    		$keywords = $this->input->post('keywords');
    		$year = $this->input->post('year');

    		if ($year!="")
    		{
    			echo "not blank<br>";
    			$yeararr=explode(' ', $year);

    		}
    		else
    		{
    			$yeararr=array('0000','9999');
    		}
    		$year1=$yeararr[0];
    		$year2=$yeararr[1];


            $this->load->library('session');
            $username=$this->session->userdata('username');


    		$this->load->database();
    		$sql="select * from papers where headline like '%".$title."%' and (author = '".$author."'or authortwo='".$author."' or authorthree = '".$author."') and keywords like '%".$keywords."%' and year>".$year1." and year<".$year2;
    		$res=$this->db->query($sql);
    		$resu=$res->result();
    		foreach ($resu as $key => $value) {
    			$list[$key]['papernumber']=$value->papernumber;
    		    $list[$key]['headline']=$value->headline;
    		    $list[$key]['author']=$value->author;
    		    $list[$key]['keywords']=$value->keywords;
    		    $list[$key]['year']=$value->year;
    		}
            $data['list']=$list;
    		
            $this->load->library('session');
            $data['username']=$this->session->userdata('username');
           
    		$this->load->view('searchresult.html',$data);


    	}
    }