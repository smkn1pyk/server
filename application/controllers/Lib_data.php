<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('peran_id_str')){
			exit("sesi anda telah habis, silahkan log-out dan log-in kembali");
		}
	}

	function paket_soal_tes()
	{
		if($this->input->post('data_tes')){
			if($this->session->userdata('jenis_ptk_id')==11){
				$paket_soal = $this->db->get_where('paket_soal', ['uniq_tes'=>$this->input->post('data_tes'), 'status'=>1])->result();
			}else{
				$paket_soal = $this->db->get_where('paket_soal', ['ptk_terdaftar_id'=>$this->session->userdata('ptk_terdaftar_id'),'uniq_tes'=>$this->input->post('data_tes'), 'status'=>1])->result();
			}
			if($paket_soal){
				?>
				<option value="">...</option>
				<?php foreach ($paket_soal as $key => $value): ?>
					<?php
					$pembelajaran_rombel = $this->db->get_where('pembelajaran_rombel', ['tingkat_pendidikan_id'=>$value->tingkat_pendidikan_id, 'mata_pelajaran_id'=>$value->mata_pelajaran_id, 'ptk_terdaftar_id'=>$value->ptk_terdaftar_id])->row_array();
					if($pembelajaran_rombel){
						$simpan = $this->encryption->encrypt(json_encode($value));
						?> <option value="<?= $simpan ?>">Tingkat: <?= $pembelajaran_rombel['tingkat_pendidikan_id'] ?> - <?= $pembelajaran_rombel['mata_pelajaran_id_str'] ?> - <?= $pembelajaran_rombel['ptk_terdaftar_id_str'] ?></option> <?php
					}else{
						?> <option value="" class="bg-danger"><?= $value->mata_pelajaran_id ?></option> <?php
					}
					?>
				<?php endforeach ?>
				<?php
			}else{
				?> <option value="">0 Results</option> <?php
			}
		}else{
			?> <option value="">...</option> <?php
		}
	}

	function ptk_tingkat()
	{
		if($this->input->post('tingkat_pendidikan')){
			$tingkat_pendidikan_id = $this->input->post('tingkat_pendidikan');
			$semester_id = $this->session->userdata('semester_id');
			if($this->session->userdata('jenis_ptk_id')==11){
				$ptk = $this->db->query("SELECT DISTINCT(ptk_terdaftar_id), ptk_terdaftar_id_str from pembelajaran_rombel where tingkat_pendidikan_id='$tingkat_pendidikan_id' and semester_id='$semester_id' order by ptk_terdaftar_id_str ASC")->result();
			}else{
				$ptk = $this->db->query("SELECT DISTINCT(ptk_terdaftar_id), ptk_terdaftar_id_str from pembelajaran_rombel where ptk_terdaftar_id='".$this->session->userdata('ptk_terdaftar_id')."' and tingkat_pendidikan_id='$tingkat_pendidikan_id' and semester_id='$semester_id' order by ptk_terdaftar_id_str ASC")->result();
			}
			if($ptk){
				?> <option value="">...</option> <?php
				foreach ($ptk as $key => $value) {
					?> <option value="<?= $value->ptk_terdaftar_id ?>"><?= $value->ptk_terdaftar_id_str ?></option> <?php
				}
			}else{
				?> <option value="">0 Results</option> <?php
			}
		}else{

		}
	}

	public function pembelajaran_ptk()
	{
		if($this->input->post('ptk')){
			$tingkat_pendidikan_id = $this->input->post('tingkat_pendidikan');
			$ptk_terdaftar_id = $this->input->post('ptk');
			$semester_id = $this->session->userdata('semester_id');
			$pembelajaran_rombel = $this->db->query("SELECT DISTINCT(mata_pelajaran_id) , mata_pelajaran_id_str from pembelajaran_rombel where tingkat_pendidikan_id='$tingkat_pendidikan_id' and ptk_terdaftar_id='$ptk_terdaftar_id' and semester_id='$semester_id' and mata_pelajaran_id not in(SELECT mata_pelajaran_id from paket_soal where ptk_terdaftar_id='$ptk_terdaftar_id' and ptk_terdaftar_id='$ptk_terdaftar_id' and tingkat_pendidikan_id='$tingkat_pendidikan_id' and semester_id='$semester_id')")->result();
			if($pembelajaran_rombel){
				?> <option value="">...</option> <?php
				foreach ($pembelajaran_rombel as $key => $value) {
					?> <option value="<?= $value->mata_pelajaran_id ?>"><?= $value->mata_pelajaran_id_str ?></option> <?php
				}
			}else{
				?> <option value="">0 Results</option> <?php
			}
		}
	}

}

/* End of file Lib_data.php */
/* Location: ./application/controllers/Lib_data.php */