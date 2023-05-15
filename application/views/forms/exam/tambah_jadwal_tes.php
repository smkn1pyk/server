<?php
$CI =& get_instance();
$CI->load->model('m_exam');
if($id){
	$cekPaketSoal = $this->db->get_where('paket_soal', ['uniq'=>$id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	if($cekPaketSoal){
		if($cekPaketSoal['status']==1){
			$uniq_tes = $cekPaketSoal['uniq_tes'];
			$tingkat_pendidikan_id = $cekPaketSoal['tingkat_pendidikan_id'];
			$mata_pelajaran_id = $cekPaketSoal['mata_pelajaran_id'];
			$ptk_terdaftar_id = $cekPaketSoal['ptk_terdaftar_id'];
			$semester_id = $cekPaketSoal['semester_id'];
			?>
			<form hx-post="<?= base_url('exam/data_list_soal/'.$id.'/tambah_jadwal_tes') ?>" hx-target="#data">
				<input type="hidden" name="uniq_tes" value="<?= $uniq_tes ?>">
				<input type="hidden" name="tingkat_pendidikan_id" value="<?= $tingkat_pendidikan_id ?>">
				<input type="hidden" name="mata_pelajaran_id" value="<?= $mata_pelajaran_id ?>">
				<input type="hidden" name="ptk_terdaftar_id" value="<?= $ptk_terdaftar_id ?>">
				<div class="form-floating mb-3">
					<input type="datetime-local" name="waktu_mulai" class="form-control" value="<?= date('Y-m-d H:i:s') ?>">
					<label>Waktu Mulai</label>
				</div>
				<div class="form-floating mb-3">
					<input type="datetime-local" name="waktu_selesai" class="form-control" value="<?= date('Y-m-d H:i:s') ?>">
					<label>Waktu Selesai</label>
				</div>
				<div class="d-block">
					<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</form>
			<?php
		}else{
			?> <div class="alert-danger p-3"> Status Soal masih dalam Pproses Input Soal</div> <?php
		}
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	$data_tes = $CI->m_exam->data_tes();
	if($data_tes){
		?>
		<form hx-post="<?= base_url('exam/data_jadwal_tes/tambah') ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="data_tes" class="form-select" hx-post="<?= base_url('lib_data/paket_soal_tes') ?>" hx-target='#paket_soal' required>
					<option value="">...</option>
					<?php foreach ($data_tes as $key => $value): ?>
						<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
					<?php endforeach ?>
				</select>
				<label>Jenis Tes</label>
			</div>

			<div class="form-floating mb-3">
				<select id="paket_soal" class="form-select" name="paket_soal" required>
					<option value="">...</option>
				</select>
				<label>Paket Soal</label>
			</div>

			<div class="form-floating mb-3">
				<input type="datetime-local" name="waktu_mulai" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" required>
				<label>Waktu Mulai</label>
			</div>

			<div class="form-floating mb-3">
				<input type="datetime-local" name="waktu_selesai" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" required>
				<label>Waktu Selesai</label>
			</div>

			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Belum ada data tes tersimpan, silahkan melakukan penambahan data </div> <?php
	}
}