<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_administrator extends CI_Model
	{
		//data account
		public function select_data()
		{
			$que = $this->db->get_where('users', array('username'=>'admin'));
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

		//update
		public function update_data($table,$id,$id_table,$data)
		{
			$this->db->where($id_table,$id);
			$this->db->update($table,$data);
			if ($this->db->affected_rows())
			{
				return '1';
			}
			else
			{
				return '0';
			}
		}

		//delete
		public function delete_data($table,$id,$id_table)
		{
			$this->db->where($id_table,$id);
			$this->db->delete($table);
		}

		//get edit data
		public function get_edit_data($table,$id_table,$id)
		{
			$que=$this->db->get_where($table,array($id_table=>$id));
			return $que->row_array();
		}

		//get pagination data
		public function get_pagination_data($table,$order,$limit,$start)
		{								
			$sql = "SELECT * FROM ".$table." ORDER BY ".$order." DESC LIMIT " . $start . ", " . $limit;
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_srch_pag_data($table,$order,$spe,$limit,$start,$srch = NULL)
		{
			if($srch == "NULL") $srch = "";
			$sql = "SELECT * FROM ".$table." WHERE ".$spe." LIKE '%$srch%' ORDER BY ".$order." DESC LIMIT " . $start . ", " . $limit;
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function count_pagdata($table,$spe,$srch = NULL)
		{
			if ($srch == 'NULL') $srch = '';
			$this->db->like($spe,$srch);
			$que = $this->db->get($table);
			return $que->num_rows();
		}
	}
?>