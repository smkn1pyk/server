<?php
$CI =& get_instance();
$CI->load->model('m_exam');
$data_tes = $CI->m_exam->data_tes();
if($data_tes){
	if($this->session->userdata('jenis_ptk_id')==11){
		$tingkat_pendidikan_id = $this->db->query("SELECT DISTINCT(tingkat_pendidikan_id) from pembelajaran_rombel where semester_id='".$this->session->userdata('semester_id')."' order by tingkat_pendidikan_id ASC")->result();
	}else{
		$tingkat_pendidikan_id = $this->db->query("SELECT DISTINCT(tingkat_pendidikan_id) from pembelajaran_rombel where ptk_terdaftar_id='".$this->session->userdata('ptk_terdaftar_id')."' and semester_id='".$this->session->userdata('semester_id')."' order by tingkat_pendidikan_id ASC")->result();
	}
	if($tingkat_pendidikan_id){
		?>
		<form hx-post="<?= base_url('exam/data_paket_soal/tambah') ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="data_tes" class="form-select" id="data_tes" required>
					<option value="">...</option>
					<?php foreach ($data_tes as $key => $value): ?>
						<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
					<?php endforeach ?>
				</select>
				<label>Jenis Tes</label>
			</div>

			<div class="form-floating mb-3">
				<select name="tingkat_pendidikan" class="form-select" id="tingkat_pendidikan" hx-post="<?= base_url('lib_data/ptk_tingkat') ?>" hx-target="#ptk_tingkat" required>
					<option value="">...</option>
					<?php foreach ($tingkat_pendidikan_id as $key => $value): ?>
						<option value="<?= $value->tingkat_pendidikan_id ?>"><?= $value->tingkat_pendidikan_id ?></option>
					<?php endforeach ?>
				</select>
				<label>Tingkat Pendidikan</label>
			</div>

			<div class="form-floating mb-3">
				<select name="ptk" class="form-select" id="ptk_tingkat"  hx-post="<?= base_url('lib_data/pembelajaran_ptk') ?>" hx-target="#pembelajaran" required>
					<option value="">...</option>
				</select>
				<label>PTK</label>
			</div>

			<div class="form-floating mb-3">
				<select name="pembelajaran" class="form-select" id="pembelajaran" required>
					<option value="">...</option>
				</select>
				<label>Mata Pelajaran</label>
			</div>

			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Belum ada data rombongan belajar tersimpan, silahkan melakukan penarikan data terlebih dahulu </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Belum ada data tes tersimpan, silahkan malakukan penambahan data </div> <?php
}
?>
<script type="text/javascript">
	$('#data_tes').on('change', function(){
		$('#tingkat_pendidikan').val('');
		$('#ptk_tingkat').html('<option value="">...</option>');
		$('#pembelajaran').html('<option value="">...</option>');
	});

	$('#tingkat_pendidikan').on('change', function(){
		$('#ptk_tingkat').html('<option value="">...</option>');
		$('#pembelajaran').html('<option value="">...</option>');
	});

	
</script>