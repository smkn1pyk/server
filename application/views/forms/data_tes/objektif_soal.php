
<?php if($id) { ?>
	<form hx-post="<?= base_url('exam/list_soal/'.$id.'/tambah_objektif/'.$uniq) ?>" hx-target="#data">
		<input type="hidden" name="q" value="<?= $uniq ?>">
		<input type="hidden" name="list_soal" value="<?= $id ?>">
		<div class="mb-3">
			<textarea name="objektif_soal" id="summernote"></textarea>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
<?php } ?>
<script type="text/javascript">
	$('#summernote').summernote();
</script>