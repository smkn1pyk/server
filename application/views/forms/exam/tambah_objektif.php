<?php
if($id&&$id1){
	?>
	<form hx-post="<?= base_url('exam/data_list_soal/'.$id.'/tambah_objektif/'.$id1) ?>" hx-target="#data">
		<div class="mb-3">
			<textarea class="summernote" name="objektif"></textarea>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php 
}
?>
<script type="text/javascript">
	$('.summernote').summernote();
</script>