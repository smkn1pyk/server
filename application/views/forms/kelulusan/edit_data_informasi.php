<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_kelulusan');
	$cekInformasi = $CI->m_kelulusan->informasi_id($id);
	if($cekInformasi){
		$judul = $cekInformasi['judul'];
		$isi = $cekInformasi['isi'];
		?>
		<form hx-post="<?= base_url('kelulusan/data_informasi/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="text" name="judul" class="form-control" placeholder="Judul Informasi" value="<?= $judul ?>">
				<label>Judul Informasi</label>
			</div>
			<div class="mb-3">
				<textarea name="isi" id="summernote" placeholder="Isi Informasi"><?= $isi ?></textarea>
			</div>
			<div class="d-bock">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<script type="text/javascript">
			$('#summernote').summernote();
		</script>
		<?php
	}else{
		?> <div class="alert-danger"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}