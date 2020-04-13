<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('frontend/M_dashboard','M_dash');
		}				

		//List Menu
		public function index()
		{
			//web banner
			$banner='web_banner';
			$data['banner']=$this->M_dash->select_all_data($banner);
			//product by categories
			$table='products';
			$idtbl='id_product';
			$spe='kategori';
			//billboard
			$bb_srch='Billboard';
			$data['billboard']=$this->M_dash->select_product_data($table,$idtbl,$spe,$bb_srch);
			//canopy
			$cn_srch='Canopy';
			$data['canopy']=$this->M_dash->select_product_data($table,$idtbl,$spe,$cn_srch);
			//exterior
			$ex_srch='Exterior-Fascia';
			$data['exfascia']=$this->M_dash->select_product_data($table,$idtbl,$spe,$ex_srch);
			//interior
			$in_srch='Interior-Fascia';
			$data['infascia']=$this->M_dash->select_product_data($table,$idtbl,$spe,$in_srch);
			//letter
			$ls_srch='LetterSign';
			$data['letter']=$this->M_dash->select_product_data($table,$idtbl,$spe,$ls_srch);
			//mural
			$mr_srch='Mural';
			$data['mural']=$this->M_dash->select_product_data($table,$idtbl,$spe,$mr_srch);
			//neon
			$nb_srch='Neonbox';
			$data['neonbox']=$this->M_dash->select_product_data($table,$idtbl,$spe,$nb_srch);
			//pylon
			$py_srch='Pylon';
			$data['pylon']=$this->M_dash->select_product_data($table,$idtbl,$spe,$py_srch);
			//tower
			$tw_srch='Tower-BTS';
			$data['bts']=$this->M_dash->select_product_data($table,$idtbl,$spe,$tw_srch);
			
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/index';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);
		}

		public function homeBaru() {
			$data['title']='Tritunggal Metalworks';
			$data['ctn']='menu/frontend/new/homes';
			// $data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper-new',$data);	
		}

		public function history()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/history';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function vision_mission()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/vismis';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}
		
		public function partners() {
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/partners';
			// $data['meta_add'] = $this->meta_social(2);
			// $this->load->view('layout/frontend/wrapper',$data);
			$data['ctn']='menu/frontend/new/partner';
			$this->load->view('layout/frontend/wrapper-new',$data);
		}

		public function managements()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/management';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function products_billboard()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Billboard';
			//pagination settings
			$config['base_url'] = site_url('Home/products_billboard/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/billboard';
			$data['meta_add'] = $this->meta_prod(3);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function products_canopy()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Canopy';
			//pagination settings
			$config['base_url'] = site_url('Home/products_canopy/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/canopy';
			$data['meta_add'] = $this->meta_prod(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function products_ex_fascia()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Exterior-Fascia';
			//pagination settings
			$config['base_url'] = site_url('Home/products_ex_fascia/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/ex_fascia';
			$data['meta_add'] = $this->meta_prod(4);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function products_in_fascia()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Interior-Fascia';
			//pagination settings
			$config['base_url'] = site_url('Home/products_in_fascia/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/in_fascia';
			$data['meta_add'] = $this->meta_prod(5);
			$this->load->view('layout/frontend/wrapper',$data);	
		}		

		public function products_letter()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='LetterSign';
			//pagination settings
			$config['base_url'] = site_url('Home/products_letter/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/letter';
			$data['meta_add'] = $this->meta_prod(6);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function products_mural()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Mural';
			//pagination settings
			$config['base_url'] = site_url('Home/products_mural/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/mural';
			$data['meta_add'] = $this->meta_prod(7);
			$this->load->view('layout/frontend/wrapper',$data);	
		}		

		public function products_neon()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Neonbox';
			//pagination settings
			$config['base_url'] = site_url('Home/products_neon/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/neon';
			$data['meta_add'] = $this->meta_prod(8);
			$this->load->view('layout/frontend/wrapper',$data);	
		}		

		public function products_pylon()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Pylon';
			//pagination settings
			$config['base_url'] = site_url('Home/products_pylon/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/pylon';
			$data['meta_add'] = $this->meta_prod(9);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function products_bts_tower()
		{
			$table='products';
			$order='id_product';
			$spe='kategori';
			$srch='Tower-BTS';
			//pagination settings
			$config['base_url'] = site_url('Home/products_bts_tower/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "3";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/bts';
			$data['meta_add'] = $this->meta_prod(10);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function contact_us() {
			$data['title']='Tritunggal Metalworks';
			// $data['isi']='menu/frontend/contact';
			// $data['meta_add'] = $this->meta_social(2);
			// $this->load->view('layout/frontend/wrapper',$data);
			$data['ctn']='menu/frontend/new/contact';
			$this->load->view('layout/frontend/wrapper-new',$data);	
		}

		public function contactus_send()
		{
			//email config
			$adm_data=$this->M_dash->admin_data();
			$config['protocol']='smtp';
			$config['smtp_host']='ssl://mail.wiperindonesia.com';
			$config['smtp_port']= 465;
			$config['smtp_user']=$adm_data->contact_mail;
			$config['smtp_pass']=$adm_data->contact_pass;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$name=$this->input->post('name');
			$from=$this->input->post('email');		
			$company=$this->input->post('company');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
			$subject='Email Dari - '.$from.' - '.$company.' - '.$address.' - '.$phone;
			$msg=$this->input->post('msg');
			$this->email->from($from, $name);
			// $this->email->to($adm_data->contact_mail);
			$this->email->to('kaishasatrio@match-advertising.com');
			$this->email->subject($subject);
			$this->email->message($msg);
			if($this->email->send())
			 {
			 	redirect('Home/contact_us','refresh');
			 }		 
			 else
			 {
			 	show_error($this->email->print_debugger());
			 	redirect('Home/contact_us','refresh');
			 }
		}

		public function our_client()
		{
			$table='clients';
			$order='id_client';
			$spe='nama';
			$srch='';		
			//pagination settings
			$config['base_url'] = site_url('Home/our_client/');
		    $config['total_rows'] = $this->db->count_all('clients');
		    $config['per_page'] = "12";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/client';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function news_list()
		{
			$table='news';
			$order='id_news';
			$spe='judul';
			$srch='';
			//pagination settings
			$config['base_url'] = site_url('Home/news_list/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/news';
			$data['meta_add'] = $this->meta_artikel(3);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function news_detail()
		{
			$d=array();
			$id=$this->uri->segment(3);
			$table='news';
			$idtable='id_news';
			$d=$this->M_dash->select_data($id,$table,$idtable);
			// $data['news']=$this->M_dash->select_data($id,$table,$idtable);
			$data['news']=$d;
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/news_detail';
			$data['meta_add'] = $this->meta_artikel($d['path']);
			$this->load->view('layout/frontend/wrapper',$data);
		}

		public function career_list()
		{
			$table='jobs';
			$order='id_job';
			$spe='judul';
			$srch='';
			//pagination settings
			$config['base_url'] = site_url('Home/career_list/');
		    $config['total_rows'] = $this->M_dash->count_product($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 3;
		    $choice = $config["total_rows"]/$config["per_page"];
		    $config["num_links"] = floor($choice);
		    // integrate bootstrap pagination
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = false;
		    $config['last_link'] = false;
		    $config['first_tag_open'] = '<li>';
		    $config['first_tag_close'] = '</li>';
		    $config['prev_link'] = '«';
		    $config['prev_tag_open'] = '<li class="prev">';
		    $config['prev_tag_close'] = '</li>';
		    $config['next_link'] = '»';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="active"><a href="#">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
		    $this->pagination->initialize($config);
		    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		    $data['listdata'] = $this->M_dash->get_product_data($table,$order,$spe,$config["per_page"], $data['page'],$srch);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/career';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function career_details()
		{
			$id=$this->uri->segment(3);
			$table='jobs';
			$idtable='id_job';
			$data['jobs']=$this->M_dash->select_data($id,$table,$idtable);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/career_details';
			$data['meta_add'] = $this->meta_social(2);
			$this->load->view('layout/frontend/wrapper',$data);	
		}

		public function career_apply()
		{
			$id=$this->uri->segment(3);
			$table='jobs';
			$idtable='id_job';
			$data['jobs']=$this->M_dash->select_data($id,$table,$idtable);
			$data['error']=$this->upload->display_errors();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/frontend/career_apply';
			$this->load->view('layout/frontend/wrapper',$data);
		}

		public function career_send()
		{
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('sekolah','Sekolah','required');
			$this->form_validation->set_rules('jurusan','Jurusan','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('no_tlp','No Telepon','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$id=$this->input->post('id');
			$table='applicant';
			$idtable='id_applicant';
			$table2='jobs';
			$idtable2='id_job';
			$adm_data=$this->M_dash->admin_data();
			$nmfile='applicant_'.time();
			$config['upload_path']='./assets/uploads/applicants/';
			$config['allowed_types']='pdf|zip|rar';
			$config['max_size']='3000';
			$config['file_name']=$nmfile;
			$this->upload->initialize($config);			
			//email config			
			$config['protocol']='smtp';
			$config['smtp_host']='ssl://mail.wiperindonesia.com';
			$config['smtp_port']= 465;
			$config['smtp_user']=$adm_data->hc_mail;
			$config['smtp_pass']=$adm_data->hc_pass;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$subject='Email Apply Lowongan';
			$nama=$this->input->post('nama');
			$lowongan=$this->input->post('job');
			$msg='Nama Pelamar '.$nama.' Lowongan '.$lowongan;
			$this->email->from($adm_data->contact_mail);
			$this->email->to($adm_data->hc_mail);
			$this->email->subject($subject);
			$this->email->message($msg);	
			if($this->form_validation->run() === FALSE)
			{								
				$data['jobs']=$this->M_dash->select_data($id,$table2,$idtable2);
				$data['error']=$this->upload->display_errors();
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/frontend/career_apply';
				$this->load->view('layout/frontend/wrapper',$data);
			}
			else
			{
				if(!$this->upload->do_upload('cv'))
				{
					$data=array
					(
						'id_job'=>$this->input->post('id'),
						'judul_job'=>$this->input->post('job'),
						'nama'=>$this->input->post('nama'),
						'sts_nikah'=>$this->input->post('sts_nikah'),
						'umur'=>$this->input->post('umur'),
						'gender'=>$this->input->post('gender'),
						'sekolah'=>$this->input->post('sekolah'),
						'jurusan'=>$this->input->post('jurusan'),
						'alamat'=>$this->input->post('alamat'),
						'no_tlp'=>$this->input->post('no_tlp'),
						'email'=>$this->input->post('email'),
						'pend_akhir'=>$this->input->post('pend_akhir'),
						'thn_daftar'=>$this->input->post('thn_daftar'),
						'thn_lulus'=>$this->input->post('thn_lulus'),
						'instansi'=>$this->input->post('perusahaan'),
						'jabatan'=>$this->input->post('jabatan'),
						'thn_masuk'=>$this->input->post('thn_masuk'),
						'thn_keluar'=>$this->input->post('thn_keluar'),
						'alasan'=>$this->input->post('alasan')
					);
					$this->email->send();
					$res = $this->M_dash->insert_data($table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Gagal Dikirim!!!</div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Berhasil Dikirim!!!</div></div>';
					}
					$data['jobs']=$this->M_dash->select_data($id,$table2,$idtable2);
					$data['error']=$this->upload->display_errors();
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/frontend/career_apply';
					$this->load->view('layout/frontend/wrapper',$data);
				}
				else
				{	
					$id=$this->input->post('id');
					$table='applicant';
					$idtable='id_applicant';
					$table2='jobs';
					$idtable2='id_job';
					$fileinfo=$this->upload->data();
					$data=array
					(
						'id_job'=>$this->input->post('id'),
						'judul_job'=>$this->input->post('job'),
						'nama'=>$this->input->post('nama'),
						'sts_nikah'=>$this->input->post('sts_nikah'),
						'umur'=>$this->input->post('umur'),
						'gender'=>$this->input->post('gender'),
						'sekolah'=>$this->input->post('sekolah'),
						'jurusan'=>$this->input->post('jurusan'),
						'alamat'=>$this->input->post('alamat'),
						'no_tlp'=>$this->input->post('no_tlp'),
						'email'=>$this->input->post('email'),
						'pend_akhir'=>$this->input->post('pend_akhir'),
						'thn_daftar'=>$this->input->post('thn_daftar'),
						'thn_lulus'=>$this->input->post('thn_lulus'),
						'instansi'=>$this->input->post('perusahaan'),
						'jabatan'=>$this->input->post('jabatan'),
						'thn_masuk'=>$this->input->post('thn_masuk'),
						'thn_keluar'=>$this->input->post('thn_keluar'),
						'alasan'=>$this->input->post('alasan'),
						'path_cv'=>$fileinfo['file_name']
					);
					$this->email->send();
					$res = $this->M_dash->insert_data($table,$data);
					if($res == '0')
					{				
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Gagal Dikirim!!!</div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Berhasil Dikirim!!!</div></div>';
					}
					$data['jobs']=$this->M_dash->select_data($id,$table2,$idtable2);
					$data['error']=$this->upload->display_errors();
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/frontend/career_apply';
					$this->load->view('layout/frontend/wrapper',$data);
				}
			}
		}

		public function meta_social($id)
		{
			$table='meta_tag';
			$idtable='meta_id';
			$getmeta = $this->db->get_where($table,array($idtable=>$id));
			$res = array();
			$res[] = '<meta name="twitter:title" content="'.$getmeta->row()->meta_title.'">';
            $res[] = '<meta name="twitter:description" content="'.$getmeta->row()->meta_desc.'">';
            $res[] = '<meta name="og:title" content="'.$getmeta->row()->meta_title.'">';
            $res[] = '<meta name="og:description" content="'.$getmeta->row()->meta_desc.'">';
			return $res;
		}	

		public function meta_prod($id)
		{
			$table='products';
			$idtable='id_product';
			$table2='meta_tag';
			$idtable2='meta_id';
			$get_prod = $this->db->get_where($table,array($idtable=>$id))->row();
			$get_meta = $this->db->get_where($table2,array($idtable2=>3));
			$res = array();
			$res[] = '<meta name="og:title" content="'.$get_meta->row()->meta_title.'">';
            $res[] = '<meta name="og:description" content="'.$get_meta->row()->meta_desc.'">';
            $res[] = '<meta name="og:image" content="'.$get_prod->path.'">';
			$data['meta_addon'] = $res;
			return $res;
		}

		public function meta_artikel($path)
		{
			$table='products';
			$idtable='id_product';
			$table2='meta_tag';
			$idtable2='meta_id';			
			$get_meta = $this->db->get_where($table2,array($idtable2=>4));
			$res = array();
			$res[] = '<meta name="og:title" content="'.$get_meta->row()->meta_title.'">';
            $res[] = '<meta name="og:description" content="'.$get_meta->row()->meta_desc.'">';
            $res[] = '<meta name="og:image" content="'.$path.'">';
			$data['meta_addon'] = $res;
			return $res;
		}
	}
?>