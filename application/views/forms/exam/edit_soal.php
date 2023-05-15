<?php
if($id&&$id1&&$id2){
	$cekListSoal = $this->db->get_where('list_soal', ['uniq'=>$id1, 'jenis_soal'=>$id2])->row_array();
	if($cekListSoal){
		?>
		<form hx-post="<?= base_url('exam/data_list_soal/'.$id.'/edit/'.$id1) ?>" hx-target="#data">
			<div class="mb-3">
				<textarea name="pertanyaan" class="summernote"><?= $cekListSoal['pertanyaan'] ?></textarea>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sitem, data soal tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}
?>
<script type="text/javascript">
	$('.summernote').summernote();
</script>