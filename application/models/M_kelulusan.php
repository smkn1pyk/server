<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelulusan extends CI_Model {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ptk_terdaftar_id')){
			exit('Sesi anda telah habis, silahkankeluar dulu dan masuk kembali');
		}
		$this->load->model('m_kelulusan');
	}

	function informasi()
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('lulusan_informasi', ['semester_id'=>$this->session->userdata('semester_id')])->result();
	}

	function informasi_id($id)
	{
		return $this->db->get_where('lulusan_informasi', ['uniq'=>$id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	}

	function lulusan_pengaturan()
	{
		return $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array();
	}

	function lulusan_pengaturan_id($id)
	{
		return $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id'), 'uniq'=>$id])->row_array();
	}

	function lulusan_data()
	{
		$semester_id = $this->session->userdata('semester_id');
		$pencarian = $this->input->get('pencarian');
		if($pencarian){
			return $getpesertadidik = $this->db->query("SELECT lulusan_data.*, getpesertadidik.nama, getpesertadidik.nama_rombel, getpesertadidik.peserta_didik_id, getpesertadidik.nisn from lulusan_data, getpesertadidik where
				lulusan_data.peserta_didik_id=getpesertadidik.peserta_didik_id and
				lulusan_data.semester_id=getpesertadidik.semester_id and
				lulusan_data.semester_id='$semester_id' and
				getpesertadidik.nama like '%$pencarian%'
				")->result();
		}else{
			if($this->input->get('rombel')){
				$rombel = $this->input->get('rombel');
				return $getpesertadidik = $this->db->query("SELECT lulusan_data.*, getpesertadidik.nama, getpesertadidik.nama_rombel, getpesertadidik.peserta_didik_id, getpesertadidik.nisn from lulusan_data, getpesertadidik where
					lulusan_data.peserta_didik_id=getpesertadidik.peserta_didik_id and
					lulusan_data.semester_id=getpesertadidik.semester_id and
					lulusan_data.semester_id='$semester_id' and
					getpesertadidik.rombongan_belajar_id='$rombel'
					")->result();
			}else{
				$tingkat_pendidikan_id_akhir = $this->tingkat_pendidikan_id_akhir();
				if($tingkat_pendidikan_id_akhir){
					$rombel_tingkat = $this->rombel_tingkat($tingkat_pendidikan_id_akhir['tingkat_pendidikan_id']);
					if($rombel_tingkat){
						$rombel_awal = $rombel_tingkat[0]->rombongan_belajar_id;
						return $getpesertadidik = $this->db->query("SELECT lulusan_data.*, getpesertadidik.nama, getpesertadidik.nama_rombel, getpesertadidik.peserta_didik_id, getpesertadidik.nisn from lulusan_data, getpesertadidik where
							lulusan_data.peserta_didik_id=getpesertadidik.peserta_didik_id and
							lulusan_data.semester_id=getpesertadidik.semester_id and
							lulusan_data.semester_id='$semester_id' and
							getpesertadidik.rombongan_belajar_id='$rombel_awal'
							")->result();
					}else{
						return $getpesertadidik = $this->db->query("SELECT lulusan_data.*, getpesertadidik.nama, getpesertadidik.nama_rombel, getpesertadidik.peserta_didik_id, getpesertadidik.nisn from lulusan_data, getpesertadidik where
							lulusan_data.peserta_didik_id=getpesertadidik.peserta_didik_id and
							lulusan_data.semester_id=getpesertadidik.semester_id and
							lulusan_data.semester_id='$semester_id'
							")->result();
					}
				}
			}
		}
	}

	function lulusan_data_id($id)
	{
		return $this->db->get_where('lulusan_data', ['uniq'=>$id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	}

	function tingkat_pendidikan_id_akhir()
	{
		return $this->db->query("SELECT max(tingkat_pendidikan_id) as tingkat_pendidikan_id from getrombonganbelajar where semester_id='".$this->session->userdata('semester_id')."'")->row_array();
	}

	function rombel_tingkat($tingkat_pendidikan_id)
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get_where('getrombonganbelajar', ['tingkat_pendidikan_id'=>$tingkat_pendidikan_id, 'semester_id'=>$this->session->userdata('semester_id')])->result();
	}

	function peserta_didik_rombel($rombongan_belajar_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->query("SELECT * from getpesertadidik where rombongan_belajar_id='$rombongan_belajar_id' and semester_id='$semester_id' and peserta_didik_id not in(SELECT peserta_didik_id from lulusan_data where semester_id='$semester_id') order by nama asc")->result();
	}

}

/* End of file M_kelulusan.php */
/* Location: ./application/models/M_kelulusan.php */