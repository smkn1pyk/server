<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		$this->load->library('alert');
	}

	public function index()
	{
		$data = [
			'title' => 'Singkronisasi Data',
			'dataget' => base_url('webservice/sync_data'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function sync_data($aksi=null)
	{
		if($aksi){
			if($aksi=='pengaturan_koneksi'){
				$this->_pengaturan_koneksi();
			}else
			if($aksi=='pengaturan_kirim_data'){
				$this->_pengaturan_kirim_data();
			}else
			if($aksi=='get_api_dapodik'){
				if($this->input->post('data_simpan')){
					$decrypt = json_decode($this->encryption->decrypt($this->input->post('data_simpan')), true);
					$berhasil_update = [];
					$gagal_update = [];
					$berhasil_tambah = [];
					$gagal_tambah = [];
					foreach ($decrypt as $key => $value) {
						foreach ($value as $key1 => $value1) {
							foreach ($value1 as $key2 => $value2) {

								if($key=='getsekolah'){
									$where = ['sekolah_id'=>$value2['sekolah_id'], 'semester_id'=>$value2['semester_id']];
								}else
								if($key=='getgtk'){
									$where = ['ptk_id'=>$value2['ptk_id'], 'tahun_ajaran_id'=>$value2['tahun_ajaran_id']];
								}else
								if($key=='rwy_pend_formal'){
									$where = ['riwayat_pendidikan_formal_id'=>$value2['riwayat_pendidikan_formal_id']];
								}else
								if($key=='rwy_kepangkatan'){
									$where = ['riwayat_kepangkatan_id'=>$value2['riwayat_kepangkatan_id']];
								}else
								if($key=='getpesertadidik'){
									$where = ['peserta_didik_id'=>$value2['peserta_didik_id'], 'semester_id'=>$value2['semester_id']];
								}else
								if($key=='getrombonganbelajar'){
									$where = ['rombongan_belajar_id'=>$value2['rombongan_belajar_id'], 'semester_id'=>$value2['semester_id']];
								}else
								if($key=='anggota_rombel'){
									$where = ['anggota_rombel_id'=>$value2['anggota_rombel_id']];
								}else
								if($key=='pembelajaran'){
									$where = ['pembelajaran_id'=>$value2['pembelajaran_id'], 'semester_id'=>$value2['semester_id']];
								}else
								if($key=='getpengguna'){
									$where = ['pengguna_id'=>$value2['pengguna_id']];
								}								
								$cekData = $this->db->get_where($key, $where)->row_array();
								if($cekData){
									$beda = array_diff($value2, $cekData);
									if($beda){
										$this->db->where($where);
										$this->db->update($key, $beda);
										if($this->db->affected_rows()>>0){
											$berhasil_update[] = 1;
										}else{
											$gagal_update[] = 1;
										}
									}else{
										?> <div class="alert alert-info"> Semua data telah terbaru </div> <?php
									}
								}else{
									$this->db->insert($key, $value2);
								}
							}
						}
					}

					?>
					<div class="alert alert-info p-5">
						Berhasil ditambahkan <?= array_sum($berhasil_tambah) ?> data <br>
						Gagal ditambahkan <?= array_sum($gagal_tambah) ?> data <br>
						Berhasil diperbaharui <?= array_sum($berhasil_update) ?> data <br>
						Gagal diperbaharui <?= array_sum($gagal_update) ?> data.
					</div>
					<?php
				}
			}
		}
		$data = [
			'webservice' => $this->m_data_utama->webservice(),
			'sekolah' => $this->m_data_utama->jml_sekolah(),
			'gtk' => $this->m_data_utama->jml_gtk(),
			'rwy_pend_formal' => $this->m_data_utama->jml_rwy_pend_formal(),
			'rwy_kepangkatan' => $this->m_data_utama->jml_rwy_kepangkatan(),
			'pd' => $this->m_data_utama->jml_pd(),
			'rombel' => $this->m_data_utama->jml_rombel(),
			'anggota_rombel' => $this->m_data_utama->jml_anggota_rombel(),
			'pembelajaran' => $this->m_data_utama->jml_pembelajaran(),
			'pengguna' => $this->m_data_utama->jml_pengguna(),
		];
		$this->load->view('pages/data_ref_dapodik/webservice', $data, FALSE);
	}

	private function _pengaturan_koneksi()
	{
		$this->form_validation->set_rules('host', 'Host', 'trim|required');
		$this->form_validation->set_rules('key', 'Key/Token', 'trim|required');
		$this->form_validation->set_rules('npsn', 'NPSN', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		} else {
			$cekKoneksi = $this->m_data_utama->webservice();
			if($cekKoneksi){
				$object = [
					'host' => $this->input->post('host'),
					'token' => $this->input->post('key'),
					'npsn' => $this->input->post('npsn'),
				];
				$this->db->where($cekKoneksi);
				$this->db->update('webservice', $object);
				echo $this->alert->pesan('edit');
			}else{
				$object = [
					'uniq' => uniqid(),
					'host' => $this->input->post('host'),
					'token' => $this->input->post('key'),
					'npsn' => $this->input->post('npsn'),
				];
				$this->db->insert('webservice', $object);
				echo $this->alert->pesan('tambah');
			}
		}
	}

	private function _pengaturan_kirim_data()
	{
		$cekData = $this->m_data_utama->keys();
		if($cekData){
			$object = [
				'host' => $this->input->post('host'),
				'key_name' => $this->input->post('key_name'),
				'key' => $this->input->post('key'),
			];
			$this->db->where($cekData);
			$this->db->update('keys', $object);
			echo $this->alert->pesan('edit');
		}
	}

}

/* End of file Webservice.php */
/* Location: ./application/controllers/Webservice.php */