<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_exam');
		if(!$this->session->userdata('peran_id_str')){
			$this->session->sess_destroy();
			redirect('.','refresh');
		}
	}

	function tes()
	{
		$data = [
			'title' => "Data TES",
			'dataget' => 'data_tes',
		];

		$this->load->view('template', $data, FALSE);
	}

	function data_tes($aksi = null, $id = null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('nama', 'nama', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'ptk_terdaftar_id' => $this->session->userdata('ptk_terdaftar_id'),
						'jenis_ptk_id' => $this->session->userdata('jenis_ptk_id'),
						'nama' => $this->input->post('nama'),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					$this->db->insert('data_tes', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($aksi=='edit'){
				$this->form_validation->set_rules('nama', 'nama', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'ptk_terdaftar_id' => $this->session->userdata('ptk_terdaftar_id'),
						'jenis_ptk_id' => $this->session->userdata('jenis_ptk_id'),
						'nama' => $this->input->post('nama'),
					];
					$this->db->where('uniq', $id);
					$this->db->update('data_tes', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($aksi=='hapus'){
				$cekPaketSoal = $this->db->get_where('paket_soal', ['uniq_tes'=>$id])->result();
				if($cekPaketSoal){
					?> <div class="alert-danger alert"> Tidak bisa menghapus data, terdapat <?= count($cekPaketSoal) ?> Data Paket Soal yang terkait dengan data ini </div> <?php
				}else{
					$this->db->where('uniq', $id);
					$this->db->delete('data_tes');
					echo $this->alert->pesan('hapus');
				}
			}
		}
		$data = [
			'data_tes' => $this->m_exam->data_tes(),
		];
		$this->load->view('pages/exam/data_tes', $data, FALSE);
	}

	function paket_soal()
	{
		$data = [
			'title' => "Paket Soal",
			'dataget' => 'data_paket_soal',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_paket_soal($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('data_tes', 'Jenis Tes', 'trim|required');
				$this->form_validation->set_rules('tingkat_pendidikan', 'Tingkat Pendidikan', 'trim|required|is_numeric');
				$this->form_validation->set_rules('ptk', 'PTK', 'trim|required');
				$this->form_validation->set_rules('pembelajaran', 'Mata Pelajaran', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq_tes' => $this->input->post('data_tes'),
						'tingkat_pendidikan_id' => $this->input->post('tingkat_pendidikan'),
						'mata_pelajaran_id' => $this->input->post('pembelajaran'),
						'ptk_terdaftar_id' => $this->input->post('ptk'),
						'semester_id' => $this->session->userdata('semester_id')
					];
					$cekPaketSoal = $this->db->get_where('paket_soal', $object)->result();
					if($cekPaketSoal){
						?> <div class="alert-danger alert"> Tidak bisa menambahkan data, terdeteksi data sudah tersimpan sebelumnya </div> <?php
					}else{
						$uniq = ['uniq'=> uniqid()];
						$merge = array_merge($uniq, $object);
						$this->db->insert('paket_soal', $merge);
						echo $this->alert->pesan('tambah');
					}
				}
			}else
			if($aksi=='edit'){
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$this->db->where('uniq', $id);
					$this->db->update('paket_soal', ['status'=>$this->input->post('status')]);
					echo $this->alert->pesan('edit');
				}
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('paket_soal');
				$this->db->where(['uniq_paket'=>$id]);
				$this->db->delete('list_soal');
				$this->db->where(['uniq_paket'=>$id]);
				$this->db->delete('objektif_soal');
				$this->db->where(['uniq_paket'=>$id]);
				$this->db->delete('kunci_objektif');
			}
		}
		$data = [
			'data' => 'test',
			'paket_soal' => $this->m_exam->paket_soal(),
		];
		$this->load->view('pages/exam/paket_soal', $data, FALSE);
	}

	function list_soal($id=null)
	{
		$data = [
			'title' => "List Soal",
			'dataget' => base_url('exam/data_list_soal/'.$id),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_list_soal($uniq_paket=null, $aksi=null, $id=null, $id1=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('jenis_soal', 'Jenis Soal', 'trim|required');
				$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_paket' => $uniq_paket,
						'jenis_soal' => $this->input->post('jenis_soal'),
						'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan')),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					$this->db->insert('list_soal', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($aksi=='edit'){
				$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$this->db->where('uniq', $id);
					$this->db->update('list_soal', ['pertanyaan'=>$this->input->post('pertanyaan')]);
					echo $this->alert->pesan('edit');
				}
			}else
			if($aksi=='hapus'){
				$this->db->where(['uniq_paket'=>$uniq_paket, 'uniq'=>$id]);
				$this->db->delete('list_soal');
				$this->db->where(['uniq_paket'=>$uniq_paket, 'uniq_list'=>$id]);
				$this->db->delete('objektif_soal');
				$this->db->where(['uniq_paket'=>$uniq_paket, 'list_soal'=>$id]);
				$this->db->delete('kunci_objektif');
				echo $this->alert->pesan('hapus');
			}else
			if($aksi=='tambah_objektif'){
				$this->form_validation->set_rules('objektif', 'Objektif', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_paket' => $uniq_paket,
						'uniq_list' => $id,
						'objektif' => htmlspecialchars($this->input->post('objektif')),
						'semester_id' => $this->session->userdata('semester_id')
					];
					$this->db->insert('objektif_soal', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($aksi=='edit_objektif'){
				$this->form_validation->set_rules('objektif', 'Objektif', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'objektif' => htmlspecialchars($this->input->post('objektif'))
					];
					$this->db->where('uniq', $id);
					$this->db->update('objektif_soal', $object);
					echo $this->alert->pesan('edit');
				}
			}else
			if($aksi=='hapus_objektif'){
				$this->db->where(['uniq_paket'=>$uniq_paket, 'uniq'=>$id]);
				$this->db->delete('objektif_soal');
				$this->db->where(['uniq_paket'=>$uniq_paket, 'kunci_jawaban'=>$id]);
				$this->db->delete('kunci_objektif');
			}else
			if($aksi=='tambah_kunci_objektif'){
				$this->form_validation->set_rules('kunci_objektif', 'Kunci Objektif', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_paket' => $uniq_paket,
						'list_soal' => $id,
						'kunci_jawaban' => $this->input->post('kunci_objektif'),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					$cekKunciObjektif = $this->db->get_where('kunci_objektif', ['uniq_paket'=>$uniq_paket, 'list_soal'=>$id])->result_array();
					if($cekKunciObjektif){
						foreach ($cekKunciObjektif as $key => $value) {
							$this->db->where($value);
							$this->db->delete('kunci_objektif');
						}
						$this->db->insert('kunci_objektif', $object);
						echo $this->alert->pesan('tambah');
					}else{
						$this->db->insert('kunci_objektif', $object);
						echo $this->alert->pesan('tambah');
					}
				}
			}else
			if($aksi=='tambah_jadwal_tes'){
				$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'trim|required');
				$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$uniq_tes = $this->input->post('uniq_tes');
					$tingkat_pendidikan_id = $this->input->post('tingkat_pendidikan_id');
					$mata_pelajaran_id = $this->input->post('mata_pelajaran_id');
					$ptk_terdaftar_id = $this->input->post('ptk_terdaftar_id');
					$semester_id = $this->session->userdata('semester_id');
					$where = ['uniq_tes'=>$uniq_tes,'tingkat_pendidikan_id'=>$tingkat_pendidikan_id, 'mata_pelajaran_id'=>$mata_pelajaran_id, 'ptk_terdaftar_id'=>$this->input->post('ptk_terdaftar_id'), 'semester_id'=>$semester_id];
					$uniq = ['uniq'=>uniqid(), 'waktu_mulai'=>$this->input->post('waktu_mulai'), 'waktu_selesai'=>$this->input->post('waktu_selesai')];
					$merge = array_merge($uniq, $where);
					$cekJadwal = $this->db->get_where('jadwal_tes', $where)->result();
					if($cekJadwal){
						$this->db->where($where);
						$this->db->update('jadwal_tes', $merge);
						echo $this->alert->pesan('edit');
					}else{
						$uniq = ['uniq'=>uniqid(), 'waktu_mulai'=>$this->input->post('waktu_mulai'), 'waktu_selesai'=>$this->input->post('waktu_selesai')];
						$merge = array_merge($uniq, $where);
						$this->db->insert('jadwal_tes', $merge);
						echo $this->alert->pesan('tambah');
					}
				}
			}
		}
		$data = [
			'list_soal' => $this->m_exam->list_soal($uniq_paket),
			'dataID'=> $uniq_paket,
		];
		$this->load->view('pages/exam/list_soal', $data, FALSE);
	}

	function jadwal_tes()
	{
		$data = [
			'title' => 'Jadwal Tes',
			'dataget' => 'data_jadwal_tes',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_jadwal_tes($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('data_tes', 'Jenis Tes', 'trim|required');
				$this->form_validation->set_rules('paket_soal', 'Paket Soal', 'trim|required');
				$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'trim|required');
				$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$uniq_tes = $this->input->post('data_tes');
					$decrypt = json_decode($this->encryption->decrypt($this->input->post('paket_soal')), true);
					
					$slice = array_slice($decrypt, 2,4);
					$cekJadwal = $this->db->get_where('jadwal_tes', $slice)->result();
					if($cekJadwal){
						?> <div class="alert alert-danger"> Tidak bisa menambahkan data, terdeteksi data sudah tersimpan sebelumnya</div> <?php
					}else{
						$uniq = ['uniq'=>uniqid(), 'waktu_mulai'=>$this->input->post('waktu_mulai'), 'waktu_selesai'=>$this->input->post('waktu_selesai'), 'semester_id'=>$this->session->userdata('semester_id')];
						$merge = array_merge($uniq, $slice);
						$this->db->insert('jadwal_tes', $merge);
						echo $this->alert->pesan('tambah');
					}
				}
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('jadwal_tes');
				echo $this->alert->pesan('hapus');
			}else
			if($aksi=='edit'){
				$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'trim|required');
				$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'waktu_mulai' => $this->input->post('waktu_mulai'),
						'waktu_selesai' => $this->input->post('waktu_selesai'),
					];
					$this->db->where('uniq', $id);
					$this->db->update('jadwal_tes', $object);
					echo $this->alert->pesan('edit');
				}
			}
		}
		$data = [
			'jadwal_tes' => $this->m_exam->jadwal_tes(),
		];
		$this->load->view('pages/exam/jadwal_tes', $data, FALSE);
	}


}

/* End of file Exam.php */
/* Location: ./application/controllers/Exam.php */