<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun_belajar extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		
	}

	function akun_belajar()
	{
		$rombel = $this->m_data_utama->getrombonganbelajar_kelas();
		if($rombel){
			$rombel_awal = $rombel[0]->rombongan_belajar_id;
			if($this->input->get('rombel')){
				return $pd = $this->db->query("
					SELECT akun_belajar.*, getpesertadidik.nama_rombel from akun_belajar, getpesertadidik where
					akun_belajar.peserta_didik_id=getpesertadidik.peserta_didik_id and
					getpesertadidik.semester_id='".$this->session->userdata('semester_id')."' and
					getpesertadidik.rombongan_belajar_id='".$this->input->get('rombel')."'
					")->result();
			}else{
				return $pd = $this->db->query("
					SELECT akun_belajar.*, getpesertadidik.nama_rombel from akun_belajar, getpesertadidik where
					akun_belajar.peserta_didik_id=getpesertadidik.peserta_didik_id and
					getpesertadidik.semester_id='".$this->session->userdata('semester_id')."' and
					getpesertadidik.rombongan_belajar_id='$rombel_awal'
					")->result();
			}
		}else{
			return $pd = $this->db->query("
				SELECT akun_belajar.*, getpesertadidik.nama_rombel from akun_belajar, getpesertadidik where
				akun_belajar.peserta_didik_id=getpesertadidik.peserta_didik_id and
				getpesertadidik.semester_id='".$this->session->userdata('semester_id')."'
				")->result();
		}
	}	

}

/* End of file m_akun_belajar.php */
/* Location: ./application/models/m_akun_belajar.php */