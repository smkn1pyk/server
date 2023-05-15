<?php
if($id){
	$cekPaketSoal = $this->db->get_where('paket_soal', ['uniq'=>$id])->row_array();
	if($cekPaketSoal){
		?>
		<form hx-post="<?= base_url('exam/data_list_soal/'.$id.'/tambah') ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="jenis_soal" class="form-select" required>
					<option value="1">Objektif</option>
					<option value="2">Esai</option>
				</select>
				<label>Jenis Soal</label>
			</div>
			<div class="mb-3">
				<textarea name="pertanyaan" class="summernote" id="summernote"></textarea>
			</div>

			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data paket soal tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3">Terjadi kesalahan sistem</div> <?php
}
?>
<script type="text/javascript">
	$('#summernote').summernote();
</script>