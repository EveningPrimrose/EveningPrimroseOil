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
    			$yeararr=split(' ', $year);

    		}
    		else
    		{
    			$yeararr=array('0000','9999');
    		}
    		$year1=$yeararr[0];
    		$year2=$yeararr[1];

    		$this->load->database();
    		$sql="select * from paper where headline like '%".$title."%' and author like '%".$author."%' and keywords like '%".$keywords."%' and year>".$year1." and year<".$year2;
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
    		
          //  $this->load->vars($data);
           // var_dump($data['resu']);
    		$this->load->view('searchresult.html',$data);


    	}
    }