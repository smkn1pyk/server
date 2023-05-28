<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {

	function jenis_iuran()
	{
		return $this->db->get('keuangan_jenis_iuran')->result();
	}

	function data_iuran()
	{
		return $this->db->get_where('keuangan_data_iuran', ['semester_id'=>$this->session->userdata('semester_id')])->result();
	}	

	function data_iuran_id($id)
	{
		return $this->db->get_where('keuangan_data_iuran', ['uniq'=>$id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	}

	function rombel_mapping()
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->query("SELECT rombongan_belajar_id, tingkat_pendidikan_id, nama from getrombonganbelajar where
			semester_id='$semester_id' and
			jenis_rombel='1' and
			rombongan_belajar_id not in(SELECT rombongan_belajar_id from keuangan_mapping where semester_id='$semester_id') order by nama asc
			")->result();
	}

	function mapping()
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->query("SELECT keuangan_mapping.*, keuangan_data_iuran.nama as nama_iuran, keuangan_data_iuran.nominal, getrombonganbelajar.rombongan_belajar_id, getrombonganbelajar.tingkat_pendidikan_id, getrombonganbelajar.nama as nama_rombel from keuangan_mapping, keuangan_data_iuran, getrombonganbelajar where
			keuangan_mapping.uniq_iuran=keuangan_data_iuran.uniq and
			keuangan_mapping.semester_id=keuangan_data_iuran.semester_id and
			keuangan_mapping.rombongan_belajar_id=getrombonganbelajar.rombongan_belajar_id and
			keuangan_mapping.semester_id=getrombonganbelajar.semester_id and
			keuangan_mapping.semester_id='$semester_id' order by nama_rombel asc
			")->result();
	}

	function mapping_id($uniq)
	{
		return $this->db->get_where('keuangan_mapping', ['uniq'=>$uniq, 'semester_id'=>$this->session->userdata('semester_id')])->result();
	}

	function keuangan_rombel($rombongan_belajar_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->query("SELECT keuangan_mapping.*, keuangan_data_iuran.uniq_jenis, keuangan_data_iuran.nama as nama_iuran, keuangan_jenis_iuran.nama as nama_jenis_iuran, keuangan_jenis_iuran.kode from keuangan_mapping, keuangan_data_iuran, keuangan_jenis_iuran where
			keuangan_mapping.rombongan_belajar_id='$rombongan_belajar_id' and
			-- keuangan_mapping.semester_id='$semester_id' and
			keuangan_mapping.uniq_iuran=keuangan_data_iuran.uniq and
			keuangan_mapping.semester_id=keuangan_data_iuran.semester_id and
			keuangan_data_iuran.uniq_jenis=keuangan_jenis_iuran.uniq
			")->result();
	}

}

/* End of file M_keuangan.php */
/* Location: ./application/models/M_keuangan.php */