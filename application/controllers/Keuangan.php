<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		$this->load->model('m_keuangan');
		if(!$this->session->userdata('username')){
			redirect('.','refresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => "Keuangan",
			'dataget' => 'iuran',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_iuran()
	{
		$data = [
			'title' => "Keuangan",
			'dataget' => 'data_data_iuran',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_data_iuran($aksi=null, $id=null)
	{
		// $object = [
		// 	'uniq' => uniqid(),
		// 	'nama' => "Iuran PerItem",
		// 	'kode' => 1,
		// ];
		// $this->db->insert('keuangan_jenis_iuran', $object);
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('jenis_iuran', 'Jenis Iuran', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama Iuran', 'trim|required|is_unique[keuangan_data_iuran.nama]');
				$this->form_validation->set_rules('nominal', 'Nominal Pembayaran', 'trim|required|is_numeric');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_jenis' => $this->input->post('jenis_iuran'),
						'nama' => $this->input->post('nama'),
						'nominal' => $this->input->post('nominal'),
						'semester_id' => $this->session->userdata('semester_id')
					];
					$this->db->insert('keuangan_data_iuran', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($aksi=='edit'){
				$this->form_validation->set_rules('jenis_iuran', 'Jenis Iuran', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama Iuran', 'trim|required');
				$this->form_validation->set_rules('nominal', 'Nominal Pembayaran', 'trim|required|is_numeric');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$object = [
						'uniq_jenis' => $this->input->post('jenis_iuran'),
						'nama' => $this->input->post('nama'),
						'nominal' => $this->input->post('nominal'),
						'semester_id' => $this->session->userdata('semester_id')
					];
					$this->db->where(['uniq'=>$id]);
					$this->db->update('keuangan_data_iuran', $object);
					echo $this->alert->pesan('edit');
				}
			}
		}
		$data = [
			'data_iuran' => $this->m_keuangan->data_iuran(),
		];
		$this->load->view('pages/keuangan/data_iuran', $data, FALSE);
	}

	function mapping()
	{
		$data = [
			'title' => "Mapping",
			'dataget' => 'data_mapping',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_mapping($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('data_iuran', 'Data Iuran', 'trim|required');
				$this->form_validation->set_rules('rombel[]', 'Rombel', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					foreach ($this->input->post('rombel') as $key => $value) {
						// $cekData = $this->m_keuangan->mapping_id($value, $this->input->post('data_iuran'));
						$cekData = $this->db->get_where('keuangan_mapping', ['rombongan_belajar_id'=>$value, 'uniq_iuran'=>$this->input->post('data_iuran'), 'semester_id'=>$this->session->userdata('semester_id')])->result();
						if(!$cekData){
							$object = [
								'uniq' => uniqid(),
								'rombongan_belajar_id' => $value,
								'uniq_iuran' => $this->input->post('data_iuran'),
								'semester_id' => $this->session->userdata('semester_id'),
							];
							$this->db->insert('keuangan_mapping', $object);
							echo $this->alert->pesan('tambah');
						}else{
							?> <div class="alert alert-danger"> Rombel yang anda pilih sudah tersimpan sebelumnya </div> <?php
						}
					}
				}
			}else
			if($aksi=='edit'){
				?> <div class="alert-info p-3"> Mohon maaf, fitur ini masih dalam masa pengembangan </div> <?php
			}else
			if($aksi=='hapus'){
				?> <div class="alert-info p-3"> Mohon maaf, fitur ini masih dalam masa pengembangan </div> <?php
			}
		}
		$data = [
			'mapping' => $this->m_keuangan->mapping(),
		];
		$this->load->view('pages/keuangan/mapping', $data, FALSE);
	}

}

/* End of file Keuangan.php */
		/* Location: ./application/controllers/Keuangan.php */