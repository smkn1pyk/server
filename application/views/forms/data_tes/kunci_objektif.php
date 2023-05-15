<!-- <?= $id.'-'.$uniq; ?> -->
<?php
$objektif = $this->db->get_where('objektif_soal', ['uniq_list'=>$uniq,'uniq_paket'=>$id])->result();
if($objektif){
	?>
	<form hx-post="<?= base_url('exam/list_soal/'.$id.'/tambah_kunci_objektif/'.$uniq) ?>" hx-target="#data">
		<input type="hidden" name="q" value="<?= $id ?>">
		<input type="hidden" name="list_soal" value="<?= $uniq ?>">
		<div class="list-group mb-3">
			<?php foreach ($objektif as $key => $value): ?>
				<label class="list-group-item">
					<input class="form-check-input me-1" type="radio" value="<?= $value->uniq ?>" name="kunci_jawaban" id="<?= $value->uniq ?>">
					<?=  $value->objektif ?>
				</label>
			<?php endforeach ?>
		</div>

		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	echo "<div class='alert-danger p-5'>Data objektif tidak ditemukan</div>";
}