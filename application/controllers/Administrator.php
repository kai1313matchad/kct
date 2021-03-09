<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Administrator extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('backend/M_administrator','M_adm');
			$this->load->model(array('backend/DtbManageBanner', 'backend/DtbManageCategories', 'backend/DtbManageGoods'));
		}				

		//List Menu
		public function index()
		{
			$data['title']='Tritunggal Metalworks';
			$this->load->view('menu/backend/login',$data);
		}

		public function login()
		{
			//fungsi login
			$valid = $this->form_validation;
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$valid->set_rules('username','Username','required');
			$valid->set_rules('password','Password','required');
			if($valid->run())
			{
				$this->simple_login->login($username,$password);
			}
			//end fungsi login
			//$data['title']='Tritunggal Metalworks';
			//$this->load->view('menu/backend/login',$data);
		}

		public function dashboard()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/dashboard';
			// $this->load->view('layout/backend/wrapper',$data);
			$this->load->view('menu/backend/new/dashboard', $data);
		}

		public function logout()
		{
			$this->simple_login->logout();
		}

		//goods
		public function manageGoods() {
			$data['title']='Tritunggal Metalworks';
			$this->load->view('menu/backend/new/manage-goods', $data);
		}

		public function goodsList() {
			$list = $this->DtbManageGoods->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$getPic = $this->M_adm->getDataByParentId('goods_images', array('itemId'=>$dat->itemId));
				$pic = ($getPic != NULL)?$getPic[0]->imgPath:NULL;
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = '<img src="'.base_url().'assets/uploads/goods/'.$pic.'" class="img-thumbnail img-responsive" width="100%">';
				$row[] = $dat->itemName;
				$row[] = $dat->ctgName;
				$row[] = strip_tags($dat->itemDesc);
				$row[] = number_format($dat->itemPrice, 2, '.', ',');
        $row[] = '<a href="'.base_url().'admin/edit-goods/'.$dat->itemId.'" class="btn mb-1 btn-warning"><i class="fas fa-fw fa-edit"></i></a><a href="'.base_url().'Administrator/deleteGoods/'.$dat->itemId.'" class="btn mb-1 btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->DtbManageGoods->count_all(),
							"recordsFiltered" => $this->DtbManageGoods->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
    }

		public function addGoods() {
			$data['title']='Tritunggal Metalworks';
			$data['ctg'] = $this->M_adm->getMasterByTable('categories', 'ctgStatus', 1);
			$this->load->view('menu/backend/new/add-goods', $data);
		}

		public function addGoodsImages($ids) {
			$id='itemId';
			$table='goods';
			$data['title']='Tritunggal Metalworks';
			$data['goods']=$this->M_adm->get_edit_data($table,$id,$ids);
			$this->load->view('menu/backend/new/add-goods-images', $data);
		}

		public function editGoods($ids) {
			$id='itemId';
			$table='goods';
			$data['title']='Tritunggal Metalworks';
			$data['ctg'] = $this->M_adm->getMasterByTable('categories', 'ctgStatus', 1);
			$data['goods']=$this->M_adm->get_edit_data($table,$id,$ids);					
			$this->load->view('menu/backend/new/edit-goods', $data);
		}

		public function editGoodsImages($ids) {
			$id='itemId';
			$table='goods';
			$data['title']='Tritunggal Metalworks';
			$data['goods']=$this->M_adm->get_edit_data($table,$id,$ids);
			$data['pics'] = $this->M_adm->getDataByParentId('goods_images', array('itemId'=>$ids));
			$this->load->view('menu/backend/new/edit-goods-images', $data);
		}

		public function saveGoods() {
			$this->form_validation->set_rules('itemName','Nama Barang','required');
			$this->form_validation->set_rules('itemCtg','Kategori Barang','required');
			$this->form_validation->set_rules('itemDesc','Deskripsi Barang','required');
			$this->form_validation->set_rules('itemPrice','Harga Barang','required');
			$this->form_validation->set_message('required', '<div class="col-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi!!!</strong></div></div>');
			$slug = url_title($this->input->post('itemName'), 'dash', true);
			$check = $this->M_adm->checkSlug('goods', 'itemSlug', $slug);
			if($this->form_validation->run() === FALSE) {
				$this->addGoods();
			}
			else if ($check > 0) {
				$data['title']='Tritunggal Metalworks';
				$data['ctg'] = $this->M_adm->getMasterByTable('categories', 'ctgStatus', 1);
				$data['error'] = '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Nama sudah digunakan, data gagal disimpan!!!</strong></div></div>';
				$this->load->view('menu/backend/new/add-goods', $data);
			}
			else {
				$data = array (
					'itemName'=>$this->input->post('itemName'),
					'itemDesc'=>$this->input->post('itemDesc'),
					'itemPrice'=>str_replace(',', '', $this->input->post('itemPrice')),
					'idCtg'=>$this->input->post('itemCtg'),
					'itemSlug'=>$slug,
					'itemStatus'=>1
				);
				$res = $this->M_adm->insert_data('goods',$data);
				$insertId = $this->db->insert_id();
				if($res == '0') {
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					$this->load->vars($data);
					$this->addGoods();
				}
				else {
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					redirect('admin/add-goods-images/'.$insertId);
				}	
			}
		}

		public function updateGoods() {
			$this->form_validation->set_rules('itemName','Nama Barang','required');
			$this->form_validation->set_rules('itemCtg','Kategori Barang','required');
			$this->form_validation->set_rules('itemDesc','Deskripsi Barang','required');
			$this->form_validation->set_rules('itemPrice','Harga Barang','required');
			$this->form_validation->set_message('required', '<div class="col-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi!!!</strong></div></div>');
			$slug = url_title($this->input->post('itemName'), 'dash', true);
			$check = $this->M_adm->checkSlug('goods', 'itemSlug', $slug);
			$checkExist = $this->M_adm->checkSlugExist('goods', array('itemSlug'=>$slug, 'itemId'=>$this->input->post('ids')));
			if($this->form_validation->run() === FALSE) {
				$this->editGoods($this->input->post('ids'));
			}
			else if ($check > 0 && $checkExist == 0) {
				$data['error'] = '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Nama sudah digunakan, data gagal disimpan!!!</strong></div></div>';
				$data['title']='Tritunggal Metalworks';
				$data['ctg'] = $this->M_adm->getMasterByTable('categories', 'ctgStatus', 1);
				$data['goods']=$this->M_adm->get_edit_data('goods','itemId',$this->input->post('ids'));
				$this->load->view('menu/backend/new/edit-goods', $data);
			}
			else {
				$data = array (
					'itemName'=>$this->input->post('itemName'),
					'itemDesc'=>$this->input->post('itemDesc'),
					'itemPrice'=>str_replace(',', '', $this->input->post('itemPrice')),
					'idCtg'=>$this->input->post('itemCtg'),
					'itemSlug'=>$slug,
					'itemStatus'=>1,
					'updatedAt'=>date('Y-m-d H:i:s')
				);
				$res = $this->M_adm->update_data('goods',$this->input->post('ids'),'itemId',$data);
				if($res == '0') {
					$data['error']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					$data['title']='Tritunggal Metalworks';
					$data['ctg'] = $this->M_adm->getMasterByTable('categories', 'ctgStatus', 1);
					$data['goods']=$this->M_adm->get_edit_data('goods','itemId',$this->input->post('ids'));
					$this->load->view('menu/backend/new/edit-goods', $data);
				}
				else {
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					redirect('admin/edit-goods-images/'.$this->input->post('ids'));
				}	
			}
		}

		public function deleteGoods($param) {
			$exp = explode('-', $param);
			$id_table='itemId';
			$table='goods';	
			$this->M_adm->delete_data($table,$exp[0],$id_table);
			redirect('admin/manage-goods');
		}

		public function addingGoodsImages() {
			$config['upload_path']   = './assets/uploads/goods/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
      // $this->load->library('upload',$config);
			$this->upload->initialize($config);
      if($this->upload->do_upload('imgFile')){
      	$ids = $this->input->post('ids');
				$token = $this->input->post('token');
        $path = $this->upload->data('file_name');
        $this->db->insert('goods_images',array('itemId'=>$ids, 'imgPath'=>$path,'imgToken'=>$token));
				echo json_encode('sukses');
      }
			else {
				echo json_encode(array('error'=>$this->upload->display_errors()));
			}
		}

		public function removeGoodsImages() {
			$ids = $this->input->post('ids');
			$token = $this->input->post('token');
			$img = $this->db->get_where('goods_images', array('imgToken'=>$token, 'itemId'=>$ids));
			if($img->num_rows() > 0){
				$hasil = $img->row();
				$imgPath = $hasil->imgPath;
				if(file_exists($file = './assets/uploads/goods/'.$imgPath)){
					unlink($file);
				}
				$this->db->delete('goods_images', array('imgId'=>$hasil->imgId));
				echo json_encode('File berhasil dihapus');
			}
			else {
				echo json_encode('File tidak ditemukan');
			}
		}

		//category
		public function manageCategories() {
			$data['title']='Tritunggal Metalworks';
			$this->load->view('menu/backend/new/manage-categories', $data);
		}

		public function categoryList() {
			$list = $this->DtbManageCategories->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->ctgName;
				$row[] = $dat->ctgSlug;
        $row[] = '<a href="'.base_url().'admin/edit-category/'.$dat->idCtg.'" class="btn mb-1 btn-warning"><i class="fas fa-fw fa-edit"></i></a><a href="'.base_url().'Administrator/deleteCategory/'.$dat->idCtg.'" class="btn mb-1 btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->DtbManageCategories->count_all(),
							"recordsFiltered" => $this->DtbManageCategories->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
    }

		public function addCategory() {
			$data['title']='Tritunggal Metalworks';
			$this->load->view('menu/backend/new/add-category', $data);
		}

		public function editCategory($ids) {
			$id='idCtg';
			$table='categories';
			$data['title']='Tritunggal Metalworks';
			$data['ctg']=$this->M_adm->get_edit_data($table,$id,$ids);
			$this->load->view('menu/backend/new/edit-category', $data);
		}

		public function saveCategory() {
			$this->form_validation->set_rules('ctgName','Nama Kategori','required');
			$this->form_validation->set_message('required', '<div class="col-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi!!!</strong></div></div>');
			$slug = url_title($this->input->post('ctgName'), 'dash', true);
			$check = $this->M_adm->checkSlug('categories', 'ctgSlug', $slug);
			if($this->form_validation->run() === FALSE) {
				$this->addCategory();
			}
			else if ($check > 0) {
				$data['title']='Tritunggal Metalworks';
				$data['error'] = '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Nama sudah digunakan, data gagal disimpan!!!</strong></div></div>';
				$this->load->view('menu/backend/new/add-category', $data);
			}
			else {
				$data = array (
					'ctgName'=>$this->input->post('ctgName'),
					'ctgSlug'=>$slug,
					'ctgStatus'=>1
				);
				$res = $this->M_adm->insert_data('categories',$data);
				if($res == '0') {
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					$this->load->vars($data);
					$this->addCategory();
				}
				else {
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					redirect('admin/manage-categories');
				}	
			}
		}

		public function updateCategory() {
			$this->form_validation->set_rules('ctgName','Nama Kategori','required');
			$this->form_validation->set_message('required', '<div class="col-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi!!!</strong></div></div>');
			$slug = url_title($this->input->post('ctgName'), 'dash', true);
			$check = $this->M_adm->checkSlug('categories', 'ctgSlug', $slug);
			if($this->form_validation->run() === FALSE) {
				$this->editCategory($this->input->post('ids'));
			}
			else if ($check > 0) {
				$data['error'] = '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Nama sudah digunakan, data gagal disimpan!!!</strong></div></div>';
				$data['title']='Tritunggal Metalworks';
				$data['ctg']=$this->M_adm->get_edit_data('categories','idCtg',$this->input->post('ids'));
				$this->load->view('menu/backend/new/edit-category', $data);
			}
			else {
				$data = array (
					'ctgName'=>$this->input->post('ctgName'),
					'ctgSlug'=>$slug,
					'ctgStatus'=>1
				);
				$res = $this->M_adm->update_data('categories',$this->input->post('ids'),'idCtg',$data);
				if($res == '0') {
					$data['error']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					$data['title']='Tritunggal Metalworks';
					$data['ctg']=$this->M_adm->get_edit_data('categories','idCtg',$this->input->post('ids'));
					$this->load->view('menu/backend/new/edit-category', $data);
				}
				else {
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					redirect('admin/manage-categories');
				}	
			}
		}

		public function deleteCategory($param) {
			$exp = explode('-', $param);
			$id_table='idCtg';
			$table='categories';	
			$this->M_adm->delete_data($table,$exp[0],$id_table);
			redirect('admin/manage-categories');
		}

		//banner
		public function manageBanner() {
			$data['title']='Tritunggal Metalworks';
			$this->load->view('menu/backend/new/manage-banner', $data);
		}

		public function bannerList() {
			$list = $this->DtbManageBanner->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->judul_banner;
				$row[] = '<img src="'.base_url().'assets/uploads/banner/'.$dat->path_banner.'" class="img-thumbnail img-responsive" width="100%">';
				$row[] = strip_tags($dat->caption_banner);
        $row[] = '<a href="'.base_url().'admin/edit-banner/'.$dat->id_banner.'" class="btn mb-1 btn-warning"><i class="fas fa-fw fa-edit"></i></a><a href="'.base_url().'Administrator/deleteBanner/'.$dat->id_banner.'-'.$dat->path_banner.'" class="btn mb-1 btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->DtbManageBanner->count_all(),
							"recordsFiltered" => $this->DtbManageBanner->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
    }

		public function addBanner() {
			$data['title']='Tritunggal Metalworks';
			$this->load->view('menu/backend/new/add-banner', $data);
		}

		public function editBanner($ids) {
			$id='id_banner';
			$table='web_banner';
			$data['title']='Tritunggal Metalworks';
			$data['banner']=$this->M_adm->get_edit_data($table,$id,$ids);
			$this->load->view('menu/backend/new/edit-banner', $data);
		}

		public function saveBanner() {
			$this->form_validation->set_rules('judulBanner','Judul','required');
			$this->form_validation->set_rules('captionBanner','Caption','required');			
			if (empty($_FILES['fileBanner']['name'])) {
				$this->form_validation->set_rules('fileBanner', 'Gambar', 'required');
			}
			$this->form_validation->set_message('required', '<div class="col-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi!!!</strong></div></div>');
			if($this->form_validation->run() === FALSE) {
				$this->addBanner();
			}
			else {
				$table='web_banner';
				$minwidth='1920';
				$minheight='900';
				$path='./assets/uploads/banner/';
				$this->configImg($path,$minwidth,$minheight);
				if(!$this->upload->do_upload('fileBanner')) {
					$data['title']='Tritunggal Metalworks';
					$data['error'] = $this->upload->display_errors();
					$this->load->view('menu/backend/new/add-banner', $data);
				}
				else {
					$fileinfo = $this->upload->data();
					$data = array (
							'judul_banner'=>$this->input->post('judulBanner'),
							'caption_banner'=>$this->input->post('captionBanner'),						
							'path_banner'=>$fileinfo['file_name']
						);
					$res = $this->M_adm->insert_data($table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
						$this->load->vars($data);
						$this->addBanner();
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
						redirect('admin/manage-banner');
					}	
				}			
			}
		}

		public function updateBanner() {
			$this->form_validation->set_rules('judulBanner','Judul','required');
			$this->form_validation->set_rules('captionBanner','Caption','required');
			$this->form_validation->set_message('required', '<div class="col-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi!!!</strong></div></div>');
			if($this->form_validation->run() === FALSE) {
				$this->editBanner($this->input->post('ids'));
			}
			else {
				$table='web_banner';
				$id_table='id_banner';
				$minwidth='1920';
				$minheight='900';
				$path='./assets/uploads/banner/';
				$this->configImg($path,$minwidth,$minheight);
				if(!$this->upload->do_upload('fileBanner')) {
					$data = array (
						'judul_banner'=>$this->input->post('judulBanner'),
						'caption_banner'=>$this->input->post('captionBanner')
					);
					$res = $this->M_adm->update_data($table,$this->input->post('ids'),$id_table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
						$this->load->vars($data);
						$this->editBanner($this->input->post('ids'));
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
						redirect('admin/manage-banner');
					}
				}
				else {
					$fileinfo = $this->upload->data();
					$data = array (
							'judul_banner'=>$this->input->post('judulBanner'),
							'caption_banner'=>$this->input->post('captionBanner'),
							'path_banner'=>$fileinfo['file_name']
						);
					$res = $this->M_adm->update_data($table,$this->input->post('ids'),$id_table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
						$this->load->vars($data);
						$this->editBanner($this->input->post('ids'));
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
						redirect('admin/manage-banner');
					}
				}
			}
		}

		public function deleteBanner($param) {
			$exp = explode('-', $param);
			$id_table='id_banner';
			$table='web_banner';	
			unlink('./assets/uploads/banner/'.$exp[1]);
			$this->M_adm->delete_data($table,$exp[0],$id_table);
			redirect('admin/manage-banner');
		}

		public function web_banner()
		{
			$table='web_banner';
			$order='id_banner';
			//pagination settings
			$config['base_url'] = site_url('Administrator/web_banner/');
		    $config['total_rows'] = $this->db->count_all('web_banner');
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
		    $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/banner_data';
			$data['total']=$this->db->count_all('web_banner');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function web_banner_search()
		{
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='web_banner';
			$order='id_banner';
			$spe='judul_banner';
			//pagination settings
			$config['base_url'] = site_url("Administrator/web_banner_search/$srch");
		    $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 4;
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
		    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/banner_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function add_web_banner()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/banner_add';
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function edit_web_banner()
		{
			$id=$this->uri->segment(3);
			$id_table='id_banner';
			$table='web_banner';
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/banner_edit';
			$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function insert_web_banner()
		{
			$this->form_validation->set_rules('judul','Judul','required');
			$this->form_validation->set_rules('isi','Caption','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$table='web_banner';
			$minwidth='1350';
			$minheight='540';
			$path='./assets/uploads/banner/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE)
			{
				$this->add_web_banner();
			}
			else
			{
				if(!$this->upload->do_upload('img'))
				{
					$this->add_web_banner();
				}
				else
				{
					$fileinfo=$this->upload->data();
					$data=array
					(
						'judul_banner'=>$this->input->post('judul'),
						'caption_banner'=>$this->input->post('isi'),						
						'path_banner'=>$fileinfo['file_name']
					);					
					$res = $this->M_adm->insert_data($table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					}
					$this->load->vars($data);
					$this->add_web_banner();
				}
			}
		}

		public function update_web_banner()
		{
			$this->form_validation->set_rules('judul','Judul','required');
			$this->form_validation->set_rules('isi','Caption','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$id_table='id_banner';
			$table='web_banner';			
			$id=$this->input->post('id');
			$img_path=$this->input->post('path');
			$minwidth='1350';
			$minheight='540';
			$path='./assets/uploads/banner/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE)
			{				
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/banner_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
				$data['error']=$this->upload->display_errors();
				$this->load->view('layout/backend/wrapper',$data);		
			}
			else
			{
				if(!$this->upload->do_upload('img'))
				{
					$data=array
					(
						'judul_banner'=>$this->input->post('judul'),
						'caption_banner'=>$this->input->post('isi')						
					);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}					
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/banner_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
				else
				{
					$fileinfo=$this->upload->data();
					$data=array
					(
						'judul_banner'=>$this->input->post('judul'),
						'caption_banner'=>$this->input->post('isi'),
						'path_banner'=>$fileinfo['file_name']
					);
					@unlink('./assets/uploads/banner/'.$img_path);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/banner_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
			}
		}

		public function delete_web_banner()
		{
			$id=$this->uri->segment(3);
			$img_path=$this->uri->segment(4);	
			$id_table='id_banner';
			$table='web_banner';	
			unlink('./assets/uploads/banner/'.$img_path);
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/web_banner?sts=del_sukses');
		}

		//products
		public function products_list()
		{
			$table='products';
			$order='id_product';
			//pagination settings
			$config['base_url'] = site_url('Administrator/products_list/');
		    $config['total_rows'] = $this->db->count_all('products');
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
		    $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/products_data';
			$data['total']=$this->db->count_all('products');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function products_search()
		{
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='products';
			$order='id_product';
			$spe='nama';
			//pagination settings
			$config['base_url'] = site_url("Administrator/products_search/$srch");
		    $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 4;
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
		    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/products_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function add_products() {
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/products_add';
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function edit_products() {
			$id=$this->uri->segment(3);
			$id_table='id_product';
			$table='products';
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/products_edit';
			$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function insert_products() {
			$this->form_validation->set_rules('nama','Nama Project','required');
			$this->form_validation->set_rules('klien','Nama Klien','required');
			$this->form_validation->set_rules('lokasi','Lokasi Project','required');
			$this->form_validation->set_rules('caption','Caption','required');
			$this->form_validation->set_rules('tgl','Tanggal','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$table='products';
			$minwidth='900';
			$minheight='600';
			$path='./assets/uploads/products/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE) {
				$this->add_products();
			}
			else {
				if(!$this->upload->do_upload('img')) {
					$this->add_products();
				}
				else {
					$fileinfo=$this->upload->data();
					$data=array (
						'nama'=>$this->input->post('nama'),
						'url'=>url_title(strtolower($this->input->post('nama')." ".$this->input->post('lokasi')." ".time())),
						'klien'=>$this->input->post('klien'),
						'lokasi'=>$this->input->post('lokasi'),
						'kategori'=>$this->input->post('ktg'),
						'caption'=>$this->input->post('caption'),
						'tanggal'=>$this->input->post('tgl'),						
						'path'=>$fileinfo['file_name']
					);					
					$res = $this->M_adm->insert_data($table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					}
					$this->load->vars($data);
					$this->add_products();
				}
			}
		}

		public function update_products() {
			$this->form_validation->set_rules('nama','Nama Produk','required');
			$this->form_validation->set_rules('klien','Nama Klien','required');
			$this->form_validation->set_rules('lokasi','Lokasi Project','required');
			$this->form_validation->set_rules('caption','Caption','required');
			$this->form_validation->set_rules('tgl','Tanggal','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$id_table='id_product';
			$table='products';
			$id=$this->input->post('id');
			$img_path=$this->input->post('path');			
			$minwidth='500';
			$minheight='500';
			$path='./assets/uploads/products/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE) {
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/products_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
				$data['error']=$this->upload->display_errors();
				$this->load->view('layout/backend/wrapper',$data);	
			}
			else {
				if(!$this->upload->do_upload('img')) {
					$data=array (
						'kategori'=>$this->input->post('ktg'),
						'nama'=>$this->input->post('nama'),
						'klien'=>$this->input->post('klien'),
						'lokasi'=>$this->input->post('lokasi'),
						'tanggal'=>$this->input->post('tgl'),
						'caption'=>$this->input->post('caption')
					);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}					
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/products_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
				else {
					$fileinfo=$this->upload->data();
					$data=array (
						'kategori'=>$this->input->post('ktg'),
						'nama'=>$this->input->post('nama'),
						'klien'=>$this->input->post('klien'),
						'lokasi'=>$this->input->post('lokasi'),
						'tanggal'=>$this->input->post('tgl'),
						'caption'=>$this->input->post('caption'),
						'path'=>$fileinfo['file_name']
					);
					@unlink('./assets/uploads/products/'.$img_path);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/products_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
			}
		}

		public function delete_products() {
			$id=$this->uri->segment(3);
			$img_path=$this->uri->segment(4);	
			$id_table='id_product';
			$table='products';	
			unlink('./assets/uploads/products/'.$img_path);
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/products_list?sts=del_sukses');
		}

		//news
		public function news_list() {
			$table='news';
			$order='id_news';
			//pagination settings
			$config['base_url'] = site_url('Administrator/news_list/');
		  $config['total_rows'] = $this->db->count_all('news');
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
		  $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		  $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/news_data';
			$data['total']=$this->db->count_all('news');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function news_search() {
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='news';
			$order='id_news';
			$spe='judul';
			//pagination settings
			$config['base_url'] = site_url("Administrator/news_search/$srch");
		  $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		  $config['per_page'] = "5";
		  $config["uri_segment"] = 4;
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
		  $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		  $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		  $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/news_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function add_news() {
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/news_add';
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function edit_news() {
			$id=$this->uri->segment(3);
			$id_table='id_news';
			$table='news';
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/news_edit';
			$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function insert_news() {
			$this->form_validation->set_rules('judul','Judul Artikel','required');
			$this->form_validation->set_rules('kutip','Kutipan Artikel','required');
			$this->form_validation->set_rules('isi','Isi Artikel','required');
			$this->form_validation->set_rules('tgl','Tanggal','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$table='news';
			$minwidth='900';
			$minheight='600';
			$path='./assets/uploads/news/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE) {
				$this->add_products();
			}
			else {
				if(!$this->upload->do_upload('img')) {
					$this->add_news();
				}
				else {
					$fileinfo=$this->upload->data();
					$data=array (
						'judul'=>$this->input->post('judul'),
						'url'=>url_title(strtolower($this->input->post('judul')." ".time())),
						'kutipan'=>$this->input->post('kutip'),
						'isi'=>$this->input->post('isi'),
						'tanggal'=>$this->input->post('tgl'),						
						'path'=>$fileinfo['file_name']
					);					
					$res = $this->M_adm->insert_data($table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					}
					$this->load->vars($data);
					$this->add_news();
				}
			}
		}

		public function update_news() {
			$this->form_validation->set_rules('judul','Judul Artikel','required');
			$this->form_validation->set_rules('kutip','Kutipan Artikel','required');
			$this->form_validation->set_rules('isi','Isi Artikel','required');
			$this->form_validation->set_rules('tgl','Tanggal','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$id_table='id_news';
			$table='news';
			$id=$this->input->post('id');
			$img_path=$this->input->post('path');			
			$minwidth='500';
			$minheight='500';
			$path='./assets/uploads/news/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE) {
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/news_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
				$data['error']=$this->upload->display_errors();
				$this->load->view('layout/backend/wrapper',$data);	
			}
			else {
				if(!$this->upload->do_upload('img')) {
					$data=array (
						'judul'=>$this->input->post('judul'),
						'kutipan'=>$this->input->post('kutip'),
						'isi'=>$this->input->post('isi'),
						'tanggal'=>$this->input->post('tgl')						
					);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/news_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
				else {
					$fileinfo=$this->upload->data();
					$data=array (
						'judul'=>$this->input->post('judul'),
						'kutipan'=>$this->input->post('kutip'),
						'isi'=>$this->input->post('isi'),
						'tanggal'=>$this->input->post('tgl'),						
						'path'=>$fileinfo['file_name']
					);
					@unlink('./assets/uploads/news/'.$img_path);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0') {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else {
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/news_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
			}
		}

		public function delete_news() {
			$id=$this->uri->segment(3);
			$img_path=$this->uri->segment(4);	
			$id_table='id_news';
			$table='news';	
			unlink('./assets/uploads/news/'.$img_path);
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/news_list?sts=del_sukses');
		}

		//jobs
		public function jobs_list()
		{
			$table='jobs';
			$order='id_job';
			//pagination settings
			$config['base_url'] = site_url('Administrator/jobs_list/');
		    $config['total_rows'] = $this->db->count_all('jobs');
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
		    $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/jobs_data';
			$data['total']=$this->db->count_all('jobs');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function jobs_search()
		{
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='jobs';
			$order='id_job';
			$spe='judul';
			//pagination settings
			$config['base_url'] = site_url("Administrator/jobs_search/$srch");
		    $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 4;
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
		    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/jobs_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function add_jobs()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/jobs_add';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function edit_jobs()
		{
			$id=$this->uri->segment(3);
			$id_table='id_job';
			$table='jobs';
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/jobs_edit';
			$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function insert_jobs()
		{
			$this->form_validation->set_rules('judul','Judul Lowongan','required');
			$this->form_validation->set_rules('lokasi','Penempatan Kerja','required');			
			$this->form_validation->set_rules('tgl1','Tanggal Mulai','required');
			$this->form_validation->set_rules('tgl2','Tanggal Mulai','required');
			$this->form_validation->set_rules('desc','Job Desc.','required');
			$this->form_validation->set_rules('info','Informasi','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$table='jobs';
			if($this->form_validation->run() === FALSE)
			{
				$this->add_jobs();
			}
			else
			{
				$data=array
					(
						'judul'=>$this->input->post('judul'),
						'lokasi'=>$this->input->post('lokasi'),
						'tgl_post'=>$this->input->post('tgl1'),
						'tgl_end'=>$this->input->post('tgl2'),
						'jobdesc'=>$this->input->post('desc'),
						'info'=>$this->input->post('info')
					);
				$res = $this->M_adm->insert_data($table,$data);
				if($res == '0')
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
				}
				else
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
				}
				$this->load->vars($data);
				$this->add_jobs();
			}
		}

		public function update_jobs()
		{
			$this->form_validation->set_rules('judul','Judul Lowongan','required');
			$this->form_validation->set_rules('lokasi','Penempatan Kerja','required');			
			$this->form_validation->set_rules('tgl1','Tanggal Mulai','required');
			$this->form_validation->set_rules('tgl2','Tanggal Mulai','required');
			$this->form_validation->set_rules('desc','Job Desc.','required');
			$this->form_validation->set_rules('info','Informasi','required');
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');			
			$id_table='id_job';
			$table='jobs';			
			$id=$this->input->post('id');
			if($this->form_validation->run() === FALSE)
			{				
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/jobs_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);			
				$this->load->view('layout/backend/wrapper',$data);
			}
			else
			{
				$data=array
					(
						'judul'=>$this->input->post('judul'),
						'lokasi'=>$this->input->post('lokasi'),
						'tgl_post'=>$this->input->post('tgl1'),
						'tgl_end'=>$this->input->post('tgl2'),
						'jobdesc'=>$this->input->post('desc'),
						'info'=>$this->input->post('info')
					);
				$res = $this->M_adm->update_data($table,$id,$id_table,$data);
				if($res == '0')
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
				}
				else
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
				}
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/jobs_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);			
				$this->load->view('layout/backend/wrapper',$data);
			}
		}

		public function delete_jobs()
		{
			$id=$this->uri->segment(3);			
			$id_table='id_job';
			$table='jobs';				
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/jobs_list?sts=del_sukses');
		}

		//client
		public function clients_list()
		{
			$table='clients';
			$order='id_client';
			//pagination settings
			$config['base_url'] = site_url('Administrator/clients_list/');
		    $config['total_rows'] = $this->db->count_all('clients');
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
		    $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/clients_data';
			$data['total']=$this->db->count_all('clients');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function clients_search()
		{
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='clients';
			$order='id_client';
			$spe='nama';
			//pagination settings
			$config['base_url'] = site_url("Administrator/clients_search/$srch");
		    $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 4;
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
		    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/clients_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function add_clients()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/clients_add';
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function edit_clients()
		{
			$id=$this->uri->segment(3);
			$id_table='id_client';
			$table='clients';
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/clients_edit';
			$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
			$data['error']=$this->upload->display_errors();			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function insert_clients()
		{
			$this->form_validation->set_rules('nama','Nama Client','required');			
			$this->form_validation->set_rules('isi','Keterangan','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$table='clients';
			$minwidth='100';
			$minheight='100';
			$path='./assets/uploads/clients/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE)
			{
				$this->add_clients();
			}
			else
			{
				if(!$this->upload->do_upload('img'))
				{
					$this->add_clients();
				}
				else
				{
					$fileinfo=$this->upload->data();
					$data=array
					(
						'nama'=>$this->input->post('nama'),						
						'keterangan'=>$this->input->post('isi'),
						'path'=>$fileinfo['file_name']
					);					
					$res = $this->M_adm->insert_data($table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					}
					$this->load->vars($data);
					$this->add_clients();
				}
			}
		}

		public function update_clients()
		{
			$this->form_validation->set_rules('nama','Nama Client','required');			
			$this->form_validation->set_rules('isi','Keterangan','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$id_table='id_client';
			$table='clients';
			$id=$this->input->post('id');
			$img_path=$this->input->post('path');			
			$minwidth='500';
			$minheight='500';
			$path='./assets/uploads/clients/';
			$this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE)
			{
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/news_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
				$data['error']=$this->upload->display_errors();
				$this->load->view('layout/backend/wrapper',$data);	
			}
			else
			{
				if(!$this->upload->do_upload('img'))
				{
					$data=array
					(
						'nama'=>$this->input->post('nama'),						
						'keterangan'=>$this->input->post('isi')					
					);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}					
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/clients_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
				else
				{
					$fileinfo=$this->upload->data();
					$data=array
					(
						'nama'=>$this->input->post('nama'),						
						'keterangan'=>$this->input->post('isi'),						
						'path'=>$fileinfo['file_name']
					);
					@unlink('./assets/uploads/clients/'.$img_path);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/clients_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				}
			}
		}

		public function delete_clients()
		{
			$id=$this->uri->segment(3);
			$img_path=$this->uri->segment(4);	
			$id_table='id_client';
			$table='clients';	
			unlink('./assets/uploads/clients/'.$img_path);
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/clients_list?sts=del_sukses');
		}

		//applicant
		public function applicant_list()
		{
			$table='applicant';
			$order='id_applicant';
			//pagination settings
			$config['base_url'] = site_url('Administrator/applicant_list/');
		    $config['total_rows'] = $this->db->count_all('applicant');
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
		    $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/applicant_data';
			$data['total']=$this->db->count_all('applicant');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function applicant_search()
		{
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='applicant';
			$order='id_applicant';
			$spe='nama';
			//pagination settings
			$config['base_url'] = site_url("Administrator/applicant_search/$srch");
		    $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 4;
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
		    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/applicant_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function delete_applicant()
		{
			$id=$this->uri->segment(3);
			$img_path=$this->uri->segment(4);	
			$id_table='id_applicant';
			$table='applicant';	
			unlink('./assets/uploads/applicant/'.$img_path);
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/applicant_list?sts=del_sukses');
		}

		//account
		public function account_data()
		{
			$data['account']=$this->M_adm->select_data();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/account_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function change_account_pass()
		{
			$this->form_validation->set_rules('password','Password','required');		
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>%s Belum Diisi, Isi Terlebih Dahulu!!!</div></div>');
			$id=$this->session->userdata('id_kct');
			$table='users';
			$idtable='id_user';
			if($this->form_validation->run() === FALSE)
			{
				$this->account_data();
			}
			else
			{
				$data=array('password'=>$this->input->post('password'));
				$res=$this->M_adm->update_data($table,$id,$idtable,$data);
				if($res == '0')
				{					
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Gagal Disimpan!!!</div></div>';
				}
				else
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Berhasil Disimpan!!!</div></div>';
				}
				$this->load->vars($data);
				$this->account_data();
				$this->simple_login->logout();
			}
		}

		public function change_contact_mail()
		{
			$this->form_validation->set_rules('cmail','Email Contact','required');
			$this->form_validation->set_rules('password2','Password Email Contact','required');		
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>%s Belum Diisi, Isi Terlebih Dahulu!!!</div></div>');
			$id=$this->session->userdata('id_kct');
			$table='users';
			$idtable='id_user';
			if($this->form_validation->run() === FALSE)
			{
				$this->account_data();
			}
			else
			{
				$data=array('contact_pass'=>$this->input->post('password2'),'contact_mail'=>$this->input->post('cmail'));
				$res=$this->M_adm->update_data($table,$id,$idtable,$data);
				if($res == '0')
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Gagal Disimpan!!!</div></div>';
				}
				else
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Berhasil Disimpan!!!</div></div>';
				}
				$this->load->vars($data);
				$this->account_data();
			}
		}

		public function change_hc_mail()
		{
			$this->form_validation->set_rules('hcmail','Email HC','required');
			$this->form_validation->set_rules('password3','Password Email HC','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>%s Belum Diisi, Isi Terlebih Dahulu!!!</div></div>');
			$id=$this->session->userdata('id_kct');
			$table='users';
			$idtable='id_user';
			if($this->form_validation->run() === FALSE)
			{
				$this->account_data();
			}
			else
			{
				$data=array('hc_pass'=>$this->input->post('password3'),'hc_mail'=>$this->input->post('hcmail'));
				$res=$this->M_adm->update_data($table,$id,$idtable,$data);
				if($res == '0')
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Gagal Disimpan!!!</div></div>';
				}
				else
				{
					$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Berhasil Disimpan!!!</div></div>';
				}
				$this->load->vars($data);
				$this->account_data();
			}
		}

		//download
		public function download_file()
		{
			$filename=$this->uri->segment(3);			 
		    // read file contents
		    $data = file_get_contents(base_url('./assets/uploads/applicants/'.$filename));
		    force_download($filename, $data);
		}

		//image config		
		public function configImg($path,$minwidth,$minheight) {
			$nmfile='img_'.time();
			$config['upload_path']=$path;
			$config['allowed_types']='jpg|jpeg|png';
			$config['max_size']='3000';
			$config['max_width']='2800';
			$config['max_height']='1800';
			$config['min_width']=$minwidth;
			$config['min_height']=$minheight;
			$config['file_name']=$nmfile;
			$this->upload->initialize($config);
		}

		public function meta_list()
		{
			$table='meta_tag';
			$order='meta_id';
			//pagination settings
			$config['base_url'] = site_url('Administrator/meta_list/');
		    $config['total_rows'] = $this->db->count_all('meta_tag');
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
		    $data['listdata'] = $this->M_adm->get_pagination_data($table,$order,$config["per_page"], $data['page']);
		    $data['pagination'] = $this->pagination->create_links();
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/meta_data';
			$data['total']=$this->db->count_all('meta_tag');
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function meta_search()
		{
			$srch = ($this->input->post("cari")) ? $this->input->post("cari") : "NULL";
			$srch = ($this->uri->segment(3)) ? $this->uri->segment(3) : $srch;
			$table='meta_tag';
			$order='meta_id';
			$spe='meta_title';
			//pagination settings
			$config['base_url'] = site_url("Administrator/meta_search/$srch");
		    $config['total_rows'] = $this->M_adm->count_pagdata($table,$spe,$srch);
		    $config['per_page'] = "5";
		    $config["uri_segment"] = 4;
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
		    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['listdata'] = $this->M_adm->get_srch_pag_data($table,$order,$spe,$config["per_page"], $data['page'], $srch);
		    $data['pagination'] = $this->pagination->create_links();		    
			$data['total']=$this->M_adm->count_pagdata($table,$spe,$srch);
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/meta_data';			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function add_meta()
		{
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/meta_add';
			$data['error']=$this->upload->display_errors();
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function edit_meta()
		{
			$id=$this->uri->segment(3);
			$id_table='meta_id';
			$table='meta_tag';
			$data['title']='Tritunggal Metalworks';
			$data['isi']='menu/backend/meta_edit';
			$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
			$data['error']=$this->upload->display_errors();			
			$this->load->view('layout/backend/wrapper',$data);
		}

		public function insert_meta()
		{
			$this->form_validation->set_rules('meta_title','Meta Title','required');			
			$this->form_validation->set_rules('meta_keyword','Meta Keyword','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$table='meta_tag';
			// $minwidth='100';
			// $minheight='100';
			// $path='./assets/uploads/meta/';
			// $this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE)
			{
				$this->add_meta();
			}
			else
			{
				// if(!$this->upload->do_upload('img'))
				// {
				// 	$this->add_clients();
				// }
				// else
				// {
					// $fileinfo=$this->upload->data();
					$data=array
					(
						'meta_title'=>$this->input->post('meta_title'),						
						'meta_keyword'=>$this->input->post('meta_keyword'),
						'meta_desc'=>$this->input->post('meta_desc')
						// 'path'=>$fileinfo['file_name']
					);					
					$res = $this->M_adm->insert_data($table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';
					}
					$this->load->vars($data);
					$this->add_meta();
				// }
			}
		}

		public function update_meta()
		{
			$this->form_validation->set_rules('meta_title','Meta Title','required');			
			$this->form_validation->set_rules('meta_keyword','Meta Keyword','required');			
			$this->form_validation->set_message('required', '<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>%s Belum Diisi, Isi Terlebih Dahulu!!!</strong></div></div>');
			$id_table='meta_id';
			$table='meta_tag';
			$id=$this->input->post('meta_id');
			// $img_path=$this->input->post('path');			
			// $minwidth='500';
			// $minheight='500';
			// $path='./assets/uploads/clients/';
			// $this->configImg($path,$minwidth,$minheight);
			if($this->form_validation->run() === FALSE)
			{
				$data['title']='Tritunggal Metalworks';
				$data['isi']='menu/backend/meta_edit';
				$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
				$data['error']=$this->upload->display_errors();
				$this->load->view('layout/backend/wrapper',$data);	
			}
			else
			{
				// if(!$this->upload->do_upload('img'))
				// {
					$data=array
					(
						'meta_title'=>$this->input->post('meta_title'),						
						'meta_keyword'=>$this->input->post('meta_keyword'),
						'meta_desc'=>$this->input->post('meta_desc')					
					);
					$res = $this->M_adm->update_data($table,$id,$id_table,$data);
					if($res == '0')
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
					}
					else
					{
						$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
					}					
					$data['title']='Tritunggal Metalworks';
					$data['isi']='menu/backend/meta_edit';
					$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
					$data['error']=$this->upload->display_errors();
					$this->load->view('layout/backend/wrapper',$data);
				// }
				// else
				// {
				// 	$fileinfo=$this->upload->data();
				// 	$data=array
				// 	(
				// 		'nama'=>$this->input->post('nama'),						
				// 		'keterangan'=>$this->input->post('isi'),						
				// 		'path'=>$fileinfo['file_name']
				// 	);
				// 	@unlink('./assets/uploads/clients/'.$img_path);
				// 	$res = $this->M_adm->update_data($table,$id,$id_table,$data);
				// 	if($res == '0')
				// 	{
				// 		$data['msg']='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Gagal Disimpan!!!</strong></div></div>';
				// 	}
				// 	else
				// 	{
				// 		$data['msg']='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button><strong>Data Berhasil Disimpan!!!</strong></div></div>';	
				// 	}
				// 	$data['title']='Tritunggal Metalworks';
				// 	$data['isi']='menu/backend/clients_edit';
				// 	$data['data']=$this->M_adm->get_edit_data($table,$id_table,$id);
				// 	$data['error']=$this->upload->display_errors();
				// 	$this->load->view('layout/backend/wrapper',$data);
				// }
			}
		}

		public function delete_meta()
		{
			$id=$this->uri->segment(3);
			$img_path=$this->uri->segment(4);	
			$id_table='meta_id';
			$table='meta_tag';	
			// unlink('./assets/uploads/clients/'.$img_path);
			$this->M_adm->delete_data($table,$id,$id_table);
			redirect('Administrator/meta_list?sts=del_sukses');
		}
	}
?>