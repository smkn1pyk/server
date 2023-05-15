<?php
$CI =& get_instance();
$CI->load->model('m_data_utama', 'dapodik');
$data = $CI->dapodik->webservice();
if($data){
	$host = $data['host'];
	$npsn = $data['npsn'];
	$token = $data['token'];
}else{
	$host = null;
	$token = null;
	$npsn = null;
}
?>

<form hx-post="webservice/sync_data/pengaturan_koneksi" hx-target="#data">
	<input type="hidden" name="q" value="<?= $this->encryption->encrypt('pengaturan_koneksi') ?>">
	<div class="form-floating mb-3">
		<input type="text" name="host" class="form-control" placeholder="Host" value="<?= $host ?>">
		<label>Host</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="key" class="form-control" placeholder="key" value="<?= $token ?>">
		<label>Key/Token</label>
	</div>
	<div class="form-floating mb-3">
		<input type="number" name="npsn" class="form-control" placeholder="NPSN" value="<?= $npsn ?>">
		<label>NPSN</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>