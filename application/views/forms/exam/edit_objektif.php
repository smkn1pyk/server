<?php
if($id&&$id1){
	$objektif_soal = $this->db->get_where('objektif_soal', ['uniq_paket'=>$id,'uniq'=>$id1])->row_array();
	if($objektif_soal){
		$objektif = $objektif_soal['objektif'];
		?>
		<form hx-post="<?= base_url('exam/data_list_soal/'.$id.'/edit_objektif/'.$id1) ?>" hx-target="#data">
			<div class="mb-3">
				<textarea class="summernote" name="objektif"><?= $objektif ?></textarea>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}
?>
<script type="text/javascript">
	$('.summernote').summernote();
</script>