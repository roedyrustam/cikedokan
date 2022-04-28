<?php

	class Kontak_model extends CI_Model
	{
		public function store($data, &$token)
		{
			$data['token'] = $token = uniqid();
			$data['ua'] = $_SERVER['HTTP_USER_AGENT'];
			$data['ip4'] = $_SERVER['REMOTE_ADDR'];

			// $data['id'] = 0;
			unset($data['captcha_code']);
			// load library form_validation

			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama', 'Nama', 'required');

			$this->form_validation->set_rules('judul', 'Judul', 'required');

			$this->form_validation->set_rules('email', 'Email', 'required');

			$this->form_validation->set_rules('no_hp', 'No HP', 'required');

			$this->form_validation->set_rules('hal', 'Perihal', 'required');

			$this->form_validation->set_rules('isi', 'Isi Pesan', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$outp = $this->db->insert('tweb_kontak', $data);
			}
				
			else
			{
				$_SESSION['validation_error'] = 'Form tidak terisi dengan benar';
			}

			if ($outp)
			{
				$_SESSION['success'] = 1;

				return true;
			}

			$_SESSION['success'] = -1;

			return false;
			
		}

		private function filter_sql()
		{
			if (!empty($f = $_SESSION['filter']))
			{
				if($f == 2)
				{
					return 'and baca is not null';
				}

				elseif ($f == 1)
				{
					return 'and baca is null';
				}

				return null;
			}
		}

		private function search_sql()
		{
			if (isset($_SESSION['cari']))
			{
				$cari = $_SESSION['cari'];
				$kw = $this->db->escape_like_str($cari);
				$kw = '%' .$kw. '%';
				$search_sql= " AND (judul LIKE '$kw' OR isi LIKE '$kw')";
				return $search_sql;
			}
		}

		public function paging($p=1, $o=0)
		{
			$sql = "SELECT COUNT(*) AS jml from tweb_kontak";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			$jml_data = $row['jml'];

			$this->load->library('paging');
			$cfg['page'] = $p;
			$cfg['per_page'] = $_SESSION['per_page'];
			$cfg['num_rows'] = $jml_data;
			$this->paging->init($cfg);

			return $this->paging;
		}

		public function autocomplete()
		{
			$str = autocomplete_str('judul', 'tweb_kontak');
			return $str;
		}

		public function delete($id)
		{
			$query = "DELETE FROM `tweb_kontak` WHERE `id` = ? OR `parent` = ?";

			if($this->db->query($query, [$id, $id]))
			{
				return $_SESSION['success'] = 1;
			}

			else $_SESSION['success'] = -1;
		}

		public function view($id)
		{
			$this->db->where('id', $id);

			$data = $this->db->get('tweb_kontak')->row_array();

			$this->db->where('parent', $id);

			$data['balasan'] = $this->db->get('tweb_kontak')->result_array();

			$this->load->helper('pdd');

			$data['perihal'] = pdd_kontak_hal($data['hal']);

			if($data)
			{
				$this->db->query('UPDATE `tweb_kontak` SET `baca` = CURRENT_TIME() WHERE `tweb_kontak`.`id` = ? and baca is null', [$data['id']]);
			}

			return $data;
		}

		public function delete_all()
	{
		$id_cb = $_POST['id_cb'];

		if (count($id_cb))
		{
			foreach ($id_cb as $id)
			{
				$outp = $this->delete($id);
			}
		}
		else $outp = false;

		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
	}

		public function replay($id, $data)
		{
			$data['ua'] = $_SERVER['HTTP_USER_AGENT'];
			$data['ip4'] = $_SERVER['REMOTE_ADDR'];
			$data['parent'] = $id;
			// $data['id'] = 0;
			$this->db->where('id', $id)->select('parent');

			if(!empty($parent = $this->db->get('tweb_kontak')->row_array()['id']))
			{
				$data['parent'] = $parent;
			}

			if ($this->db->insert('tweb_kontak', $data))
			{
				$_SESSION['success'] = 1;

				return true;
			}
		}

		public function belum_dibaca()
		{
			$jml = $this->db->select('COUNT(id) as jml')
				->where('baca is ', null)
				->get('tweb_kontak')
				->row()->jml;
			return $jml;
		}

		public function list($o=0, $offset=0, $limit=500)
		{
			switch ($o)
			{
				case 1: $order_sql = ' ORDER BY nama DESC'; break;
				case 2: $order_sql = ' ORDER BY nama'; break;
				case 3: $order_sql = ' ORDER BY judul DESC'; break;
				case 4: $order_sql = ' ORDER BY judul'; break;
				case 5: $order_sql = ' ORDER BY waktu DESC'; break;
				case 6: $order_sql = ' ORDER BY waktu'; break;

				default:$order_sql = ' ORDER BY waktu DESC';
			}
			
			$paging_sql = ' LIMIT ' .$offset. ',' .$limit;

			$sql = "SELECT * from tweb_kontak";
			$sql .= ' where admin is null and parent is null';
			$sql .= ' '.$this->filter_sql();
			$sql .= ' '.$this->search_sql();
			$sql .= $order_sql;
			$sql .= $paging_sql;

			$query = $this->db->query($sql);
			$data = $query->result_array();

			$j = $offset;
			for ($i=0; $i<count($data); $i++)
			{
				$data[$i]['no'] = $j += 1;

				if(empty($data[$i]['baca']))
				{
					$data[$i]['status'] = 'Belum dibaca';
				}

				else $data[$i]['status'] = 'Sudah dibaca';
			}

			return $data;
		}
	}
