<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ref_dapodik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		$this->load->library('alert');
	}

	public function sekolah()
	{
		$data = [
			'title' => "Sekolah",
			'dataget' => 'data_sekolah',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_sekolah($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='update_kop_sekolah'){
				$this->form_validation->set_rules('header_1', 'Header 1', 'trim|required');
				$this->form_validation->set_rules('header_2', 'Header 2', 'trim|required');
				// $this->form_validation->set_rules('header_3', 'Header 3', 'trim|required');
				if(empty($_FILES['logo_1']['name'])){
					$this->form_validation->set_rules('logo_1', 'Logo 1', 'required');
				}
				if(empty($_FILES['logo_2']['name'])){
					$this->form_validation->set_rules('logo_2', 'Logo 2', 'required');
				}
				if(empty($_FILES['ttd']['name'])){
					$this->form_validation->set_rules('ttd', 'Tanda Tangan Kepala Sekolah', 'required');
				}
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$cekKopSekolah = $this->m_data_utama->kop_sekolah();
					$object = [
						'header_1' => $this->input->post('header_1'),
						'header_2' => $this->input->post('header_2'),
						'header_3' => $this->input->post('header_3'),
						'logo_1' => file_get_contents($_FILES['logo_1']['tmp_name']),
						'logo_2' => file_get_contents($_FILES['logo_2']['tmp_name']),
						'ttd' => file_get_contents($_FILES['ttd']['tmp_name']),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					if($cekKopSekolah){
						$where = ['id'=>$cekKopSekolah[0]->id, 'uniq'=>$cekKopSekolah[0]->uniq];
						$this->db->where($where);
						$this->db->update('kop_sekolah', $object);
						echo $this->alert->pesan('edit');
					}else{
						$uniq = ['uniq'=>uniqid()];
						$merge = array_merge($uniq, $object);
						$this->db->insert('kop_sekolah', $merge);
						echo $this->alert->pesan('tambah');
					}
				}
			}
		}
		$data = [
			'kop_sekolah' => $this->m_data_utama->kop_sekolah(),
			'sekolah' => $this->m_data_utama->getsekolah(),
		];
		$this->load->view('pages/data_ref_dapodik/sekolah', $data, FALSE);
	}

	function gtk()
	{
		$data = [
			'title' => "Data GTK",
			'dataget' => 'data_gtk',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_gtk()
	{
		$data = [
			'jenis_ptk' => $this->m_data_utama->jenis_ptk(),
			'jml_gtk' => $this->m_data_utama->jml_gtk(),
			'gtk' => $this->m_data_utama->getgtk(),
		];
		$this->load->view('pages/data_ref_dapodik/gtk', $data, FALSE);
	}

	function pd()
	{
		$data = [
			'title' => "Data pd",
			'dataget' => 'data_pd',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pd()
	{
		$data = [
			'rombel' => $this->m_data_utama->getrombonganbelajar_kelas(),
			'pd' => $this->m_data_utama->getpesertadidik(),
		];
		$this->load->view('pages/data_ref_dapodik/pd', $data, FALSE);
	}

	function rombel()
	{
		$data = [
			'title' => "Data Rombongan Belajar",
			'dataget' => 'data_rombel',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_rombel()
	{
		$data = [
			'jenis_rombel' => $this->m_data_utama->jenis_rombel(),
			'rombel' => $this->m_data_utama->getrombonganbelajar(),
		];
		$this->load->view('pages/data_ref_dapodik/rombel', $data, FALSE);
	}

	function anggota_rombel()
	{
		$data = [
			'title' => 'Anggota Rombel',
			'dataget' => 'data_anggota_rombel',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_anggota_rombel()
	{
		$data = [
			'rombel' => $this->m_data_utama->getrombonganbelajar(),
			'anggota_rombel' => $this->m_data_utama->anggota_rombel(),
		];
		$this->load->view('pages/data_ref_dapodik/anggota_rombel', $data, FALSE);
	}

	function pembelajaran()
	{
		$data = [
			'title' => "Data Pembelajaran",
			'dataget' => 'data_pembelajaran',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pembelajaran($aksi=null)
	{
		if($aksi){
			if($this->input->post('hapus_pembelajaran')){
				$hapus = $this->input->post('hapus_pembelajaran');
				foreach ($hapus as $key => $value) {
					$decrypt = json_decode($this->encryption->decrypt($value), true);
					$this->db->where($decrypt);
					$this->db->delete('pembelajaran');
				}
			}
		}
		$data = [
			'jenis_rombel' => $this->m_data_utama->jenis_rombel(),
			'rombel' => $this->m_data_utama->getrombonganbelajar(),
			'pembelajaran' => $this->m_data_utama->pembelajaran(),
		];
		$this->load->view('pages/data_ref_dapodik/pembelajaran', $data, FALSE);
	}

	function pengguna()
	{
		$data = [
			'title' => "Data Pengguna",
			'dataget' => 'data_pengguna',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pengguna($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='hapus'){
				if($id){
					$cekPengguna = $this->m_data_utama->getpengguna_id($id);
					if($cekPengguna){
						$this->db->where($cekPengguna);
						$this->db->delete('getpengguna');
					}else{
						?> <div class="alert alert-danger"> Terjadi kesalahan sistem, data pengguna tidak ditemukan</div> <?php
					}
				}else{
					?> <div class="alert alert-danger"> Terjadi kesalahan sistem </div> <?php
				}
			}
		}
		$peran = $this->m_data_utama->peran_pengguna();
		$data = [
			'peran' => $peran,
			'pengguna' => $this->m_data_utama->getpengguna(),
		];
		$this->load->view('pages/data_ref_dapodik/pengguna', $data, FALSE);
	}

	function laporan_individu()
	{
		$data = [
			'title' => "Laporan Individu Sekolah",
			'dataget' => base_url('data_ref_dapodik/data_li'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_li()
	{
		$data = [
			'kurikulum' => $this->m_data_utama->kurikulum(),
		];
		$this->load->view('pages/data_ref_dapodik/data_li', $data, FALSE);
	}

}

/* End of file Data_ref_dapodik.php */
/* Location: ./application/controllers/Data_ref_dapodik.php */