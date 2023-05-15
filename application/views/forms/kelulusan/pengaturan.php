<?php
$CI =& get_instance();
$CI->load->model('m_kelulusan');
$pengaturan = $CI->m_kelulusan->lulusan_pengaturan();
if($pengaturan){
	$uniq = $pengaturan['uniq'];
	$waktu_tampil = $pengaturan['waktu_tampil'];
	$nomor_surat = $pengaturan['nomor_surat'];
	$nomor_surat_penetapan = $pengaturan['nomor_surat_penetapan'];
	$tanggal_surat = $pengaturan['tanggal_surat'];
	$tanggal_penetapan = $pengaturan['tanggal_penetapan'];
}else{
	$uniq = null;
	$waktu_tampil = null;
	$nomor_surat = null;
	$nomor_surat_penetapan = null;
	$tanggal_surat = null;
	$tanggal_penetapan = null;
}
?>
<form hx-post="<?= base_url('kelulusan/lulusan_data/pengaturan/'.$uniq) ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="datetime-local" name="waktu_tampil" class="form-control" placeholder="Waktu Tampil" value="<?= $waktu_tampil ?>">
		<label>Waktu Tampil</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="nomor_surat" class="form-control" placeholder="Nomor Surat" value="<?= $nomor_surat ?>">
		<label>Nomor Surat</label>
	</div>
	<div class="form-floating mb-3">
		<input type="date" name="tanggal_surat" class="form-control" placeholder="Tanggal Surat" value="<?= $tanggal_surat ?>">
		<label>Tanggal Surat</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="nomor_surat_penetapan" class="form-control" placeholder="Nomor Surat Penetapan" value="<?= $nomor_surat_penetapan ?>">
		<label>Nomor Surat Penetapan</label>
	</div>
	<div class="form-floating mb-3">
		<input type="date" name="tanggal_penetapan" class="form-control" placeholder="Tanggal Penetapan" value="<?= $tanggal_penetapan ?>">
		<label>Tanggal Penetapan</label>
	</div>
	<div class="d-block mb-3">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>
<div id="results"></div>
