<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_dashboard extends CI_Model
	{
		//select data
		public function select_all_data($table)
		{
			$que=$this->db->get($table);
			return $que->result();
		}

		public function select_product_data($table,$idtable,$spe,$srch)
		{
			$this->db->limit(1);
			$this->db->order_by($idtable, 'DESC');
			$que=$this->db->get_where($table, array($spe=>$srch));
			return $que->row_array();
		}

		//insert
		public function insert_data($table,$data)
		{
			$this->db->insert($table,$data);
			if($this->db->affected_rows())
			{
				return '1';
			}
			else
			{
				return '0';
			}
		}
		
		public function select_data($id,$table,$idtable)
		{
			$que=$this->db->get_where($table,array($idtable=>$id));
			return $que->row_array();
		}		

		public function get_product_data($table,$order,$spe,$limit,$start,$srch = NULL)
		{
			if($srch == "NULL") $srch = "";
			$sql = "SELECT * FROM ".$table." WHERE ".$spe." LIKE '%$srch%' ORDER BY ".$order." DESC LIMIT " . $start . ", " . $limit;
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function count_product($table,$spe,$srch)
		{			
			$que = $this->db->get_where($table, array($spe=>$srch));
			return $que->num_rows();
		}

		public function admin_data()
		{
			$que = $this->db->get_where('users', array('username'=>'admin'));
			return $que->row();
		}
	}
?>