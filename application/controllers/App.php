<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$cekAkun = $this->db->get_where('getpengguna', ['peran_id_str'=>'Operator Sekolah'])->result();
		if(!$cekAkun){
			$object = [
				'pengguna_id' => uniqid(),
				'username' => 'admin@admin.id',
				'password' => password_hash('123456', PASSWORD_DEFAULT),
				'peran_id_str' => 'Operator Sekolah',
				'status' => 1,
				'ptk_id' => 1,
			];
			$this->db->insert('getpengguna', $object);
		}
	}

	public function index()
	{
		if($this->session->userdata('akun')){
			if(!$this->session->userdata('semester_id')){
				$this->load->view('auth/cekakun', FALSE);
			}else{
				if($this->session->userdata('ptk_id')){
					$data = [
						'title' => "Dashboard",
						'dataget' => base_url('app/dashboard'),
					];
					$this->load->view('template', $data);
				}else
				if($this->session->userdata('peserta_didik_id')){
					redirect('data_ref_dapodik/detail_pd/'.$this->session->userdata('peserta_didik_id'),'refresh');
				}
			}
			
		}else{
			$cek_semester_id = $this->db->query("SELECT DISTINCT(semester_id) from getsekolah order by semester_id desc")->result_array();
			if($cek_semester_id){
				$sm = $cek_semester_id;
			}else{
				if(date('m')<<7){
					$sm = date('Y') - 1;
					$sm = $sm.'2';
				}else
				if(date('m')>>6){
					$sm = date('Y').'1';
				}
				$sm = ['0'=>['semester_id'=>$sm]];
			}
			$data = ['semester_id'=>$sm];
			$this->load->view('auth/login',$data, FALSE);
		}
	}

	function dashboard()
	{
		$this->load->model('m_data_utama', 'data_utama');
		$data = [
			'sekolah' => $this->data_utama->getsekolah(),
			'kop_sekolah' => $this->data_utama->kop_sekolah(),
			'gtk' => $this->data_utama->jml_gtk(),
			'pd' => $this->data_utama->jml_pd(),
			'rombel' => $this->data_utama->jml_rombel(),
			'kurikulum' => $this->data_utama->kurikulum(),
			'pengguna' => $this->data_utama->jml_pengguna(),
		];
		$this->load->view('pages/dashboard', $data, FALSE);
	}
}
