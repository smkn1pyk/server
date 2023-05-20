<?php
$CI =& get_instance();
$CI->load->model('m_data_utama');
$kop = $CI->m_data_utama->kop_sekolah();
if($kop){
	foreach ($kop as $key => $value) {
		$uniq = $value->uniq;
		$header_1 = $value->header_1;
		$header_2 = $value->header_2;
		$header_3 = $value->header_3;
	}
}else{
	$uniq = null;
	$header_1 = null;
	$header_2 = null;
	$header_3 = null;
}
if($this->session->userdata('ptk_id')){
	?>
	<form hx-post="<?= base_url('data_ref_dapodik/data_sekolah/update_kop_sekolah/'.$uniq) ?>" hx-target="#data" enctype='multipart/form-data'>
		<div class="form-floating mb-3">
			<input type="text" name="header_1" class="form-control" placeholder="Header 1" value="<?= $header_1 ?>">
			<label>Header 1</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="header_2" class="form-control" placeholder="Header 2" value="<?= $header_2 ?>">
			<label>Header 2</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="header_3" class="form-control" placeholder="Header 3" value="<?= $header_3 ?>">
			<label>Header 3</label>
		</div>
		<div class="mb-3">
			<input type="file" name="logo_1" class="form-control" placeholder="Logo 1" accept="image/png, image/jpeg">
			<label>Logo 1</label>
		</div>
		<div class="mb-3">
			<input type="file" name="logo_2" class="form-control" placeholder="Logo 2" accept="image/png, image/jpeg">
			<label>Logo 2</label>
		</div>
		<div class="mb-3">
			<input type="file" name="ttd" class="form-control" placeholder="Tanda Tangan" accept="image/png, image/jpeg">
			<label>Tanda Tangan Kepala Sekolah</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	?> <div class="alert-danger p-3"> Mohon maaf, anda tidak dizinkan mengakses halaman ini </div> <?php
}
?>