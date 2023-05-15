<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_exam extends CI_Model {

	public function data_tes()
	{
		if($this->session->userdata('jenis_ptk_id')==11){
			return $this->db->get_where('data_tes', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		}else{
			$data_tes = $this->db->get_where('data_tes', ['jenis_ptk_id'=>11,'semester_id'=>$this->session->userdata('semester_id')])->result();
			$data_tes_ptk = $this->db->get_where('data_tes', ['ptk_terdaftar_id'=> $this->session->userdata('ptk_terdaftar_id'), 'jenis_ptk_id'=>$this->session->userdata('jenis_ptk_id'), 'semester_id'=>$this->session->userdata('semester_id')])->result();
			return array_merge($data_tes, $data_tes_ptk);
		}
	}

	function paket_soal()
	{
		$this->db->order_by('id', 'desc');
		if($this->session->userdata('jenis_ptk_id')==11){
			return $this->db->get_where('paket_soal', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		}else{
			return $this->db->get_where('paket_soal', ['ptk_terdaftar_id'=>$this->session->userdata('ptk_terdaftar_id'), 'semester_id'=>$this->session->userdata('semester_id')])->result();
		}
	}

	function list_soal($id)
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('list_soal', ['uniq_paket'=>$id])->result();
	}

	function jadwal_tes()
	{
		$this->db->order_by('waktu_mulai', 'desc');
		if($this->session->userdata('jenis_ptk_id')==11){
			return $this->db->get_where('jadwal_tes', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		}else{
			return $this->db->get_where('jadwal_tes', ['ptk_terdaftar_id'=>$this->session->userdata('ptk_terdaftar_id'), 'semester_id'=>$this->session->userdata('semester_id')])->result();
		}
	}

}

/* End of file Exam.php */
/* Location: ./application/models/Exam.php */