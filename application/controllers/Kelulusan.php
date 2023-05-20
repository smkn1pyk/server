<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelulusan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			$this->session->sess_destroy();
			redirect('.','refresh');
		}
		$this->load->library('alert');
		$this->load->model('m_kelulusan');
	}

	public function index()
	{
		$this->informasi();
	}

	function informasi()
	{
		$data = [
			'title' => "Informasi Kelulusan",
			'dataget' => base_url('Kelulusan/data_informasi'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_informasi($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('judul', 'Judul Informasi', 'trim|required');
				$this->form_validation->set_rules('isi', 'Isi Informasi', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$object = [
						'uniq' => uniqid(),
						'judul' => $this->input->post('judul'),
						'isi' => $this->input->post('isi'),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					$this->db->insert('lulusan_informasi', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($aksi=='edit'){
				$this->form_validation->set_rules('judul', 'Judul Informasi', 'trim|required');
				$this->form_validation->set_rules('isi', 'Isi Informasi', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$object = [
						'judul' => $this->input->post('judul'),
						'isi' => $this->input->post('isi'),
					];
					$cekInformasi = $this->m_kelulusan->informasi_id($id);
					if($cekInformasi){
						$this->db->where('uniq', $id);
						$this->db->update('lulusan_informasi', $object);
						echo $this->alert->pesan('edit');
					}else{
						?> <div class="alert alert-danger"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
					}
				}
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('lulusan_informasi');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'informasi' => $this->m_kelulusan->informasi(),
		];
		$this->load->view('pages/kelulusan/informasi', $data, FALSE);
	}

	function data_lulusan()
	{
		$data = [
			'title' => "Data Lulusan",
			'dataget' => base_url('kelulusan/lulusan_data'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function lulusan_data($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='pengaturan'){
				$this->form_validation->set_rules('waktu_tampil', 'Waktu Tampil', 'trim|required');
				// $this->form_validation->set_rules('waktu_cetak', 'Waktu Cetak', 'trim|required');

				$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('nomor_surat_penetapan', 'Nomor Surat Penetapan', 'trim|required');
				$this->form_validation->set_rules('tanggal_penetapan', 'Tanggal Penetapan', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$object = [
						'waktu_tampil' => $this->input->post('waktu_tampil'),
						// 'waktu_cetak' => $this->input->post('waktu_cetak'),
						'tanggal_surat' => $this->input->post('tanggal_surat'),
						'tanggal_penetapan' => $this->input->post('tanggal_penetapan'),
						'nomor_surat' => $this->input->post('nomor_surat'),
						'nomor_surat_penetapan' => $this->input->post('nomor_surat_penetapan'),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					$id = ['uniq'=>uniqid()];
					$merge = array_merge($id,$object);
					if($id){
						$cekData = $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id')])->result_array();
						if($cekData){
							foreach ($cekData as $key => $value) {
								$this->db->where($value);
								$this->db->delete('lulusan_pengaturan');
							}
						}
						$this->db->insert('lulusan_pengaturan', $merge);
						echo $this->alert->pesan('tambah');
					}else{
						$this->db->insert('lulusan_pengaturan', $merge);
						echo $this->alert->pesan('tambah');
					}
				}
			}else
			if($aksi=='tambah_lulusan'){
				$this->form_validation->set_rules('peserta_didik[]', 'Pilih Peserta Didik', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					foreach ($this->input->post('peserta_didik') as $key => $value) {
						$cekData = $this->db->get_where('lulusan_data', ['peserta_didik_id'=>$value, 'semester_id'=>$this->session->userdata('semester_id')])->result_array();
						if($cekData){
							foreach ($cekData as $key1 => $value1) {
								$this->db->where($value1);
								$this->db->delete('lulusan_data');
							}
						}
						$object = [
							'uniq' => uniqid(),
							'peserta_didik_id' => $value,
							'semester_id' => $this->session->userdata('semester_id'),
							'status' => 1,
						];
						$this->db->insert('lulusan_data', $object);
						if($this->db->affected_rows()>>0){
							$berhasil[] = 1;
						}else{
							$berhasil[] = 0;
						}
					}
					?> <div class="alert alert-info"> Berhasil menambahkan: <?= array_sum($berhasil) ?> Data </div> <?php
				}
			}else
			if($aksi=='edit_lulusan'){
				if($id){
					$this->form_validation->set_rules('status', 'Status', 'trim|required');
					if ($this->form_validation->run() == FALSE) {
						?> <div class="alert alert-danger"><?= validation_errors() ?></div> <?php
					} else {
						$lulusan_data_id = $this->m_kelulusan->lulusan_data_id($id);
						if($lulusan_data_id){
							$object = ['status'=>$this->input->post('status')];
							$this->db->where('uniq', $id);
							$this->db->update('lulusan_data', $object);
							echo $this->alert->pesan('edit');
						}
					}
				}else{
					?> <div class="alert alert-danger"> Terjadi kesalahan sistem</div> <?php
				}
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('lulusan_data');
			}
		}
		$tingkat_pendidikan_id_akhir = $this->m_kelulusan->tingkat_pendidikan_id_akhir();
		if($tingkat_pendidikan_id_akhir){
			$rombel = $this->m_kelulusan->rombel_tingkat($tingkat_pendidikan_id_akhir['tingkat_pendidikan_id']);
		}else{
			$rombel = [];
		}
		$data = [
			'rombel' => $rombel,
			'pengaturan' => $this->m_kelulusan->lulusan_pengaturan(),
			'data_lulusan' => $this->m_kelulusan->lulusan_data(),
		];
		$this->load->view('pages/kelulusan/data_lulusan', $data, FALSE);
	}

	function peserta_didik_rombel()
	{
		if($this->input->post('rombel')){
			$rombel = $this->input->post('rombel');
			$peserta_didik_rombel = $this->m_kelulusan->peserta_didik_rombel($rombel);
			if($peserta_didik_rombel){
				?>
				<form hx-post="<?= base_url('kelulusan/lulusan_data/tambah_lulusan') ?>" hx-target="#data">
					<div class="form-inline">
						<div class="form-check m-3">
							<input type="checkbox" name="checkAll" id="checkAll" class="form-check-input">
							<label for="checkAll">Pilih Semua</label>
						</div>
						<div>
							<b><?= $peserta_didik_rombel[0]->nama_rombel ?></b>
						</div>
					</div>
					<div class="table-responsive" style="max-height: 300px;overflow: auto;">
						<table class="table table-sm table-striped">
							<tbody>
								<?php foreach ($peserta_didik_rombel as $key => $value): $key++; ?>
									<tr>
										<td><?= $key ?></td>
										<td>
											<div class="form-check">
												<input type="checkbox" name="peserta_didik[]" class="form-check-input" value="<?= $value->peserta_didik_id ?>" id="<?= $value->peserta_didik_id ?>">
												<label for="<?= $value->peserta_didik_id ?>"><?= $value->nama ?></label>
											</div>
										</td>
										<td><label for="<?= $value->peserta_didik_id ?>"><?= $value->nisn ?></label></td>
										<td><label for="<?= $value->peserta_didik_id ?>"><?= $value->tanggal_lahir ?></label></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<div class="d-block mt-3 mb-3">
						<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</form>
				<script type="text/javascript">
					$("#checkAll").click(function(){
						$('input:checkbox').not(this).prop('checked', this.checked);
					});
				</script>
				<?php
			}else{
				?> <div class="alert-danger p-3"> 0 Results </div> <?php
			}
		}
	}

}

/* End of file Kelulusan.php */
/* Location: ./application/controllers/Kelulusan.php */