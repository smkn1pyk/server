<?php
if($id&&$id1){
	$cekObjektifsoal = $this->db->get_where('objektif_soal', ['uniq_paket'=>$id, 'uniq_list'=>$id1])->result();
	if($cekObjektifsoal){
		?>
		<form hx-post="<?= base_url('exam/data_list_soal/'.$id.'/tambah_kunci_objektif/'.$id1) ?>" hx-target="#data">
			<?php foreach ($cekObjektifsoal as $key => $value): ?>
				<?php
				$cekKunci = $this->db->get_where('kunci_objektif', ['uniq_paket'=>$id,'list_soal'=>$id1, 'kunci_jawaban'=>$value->uniq])->row_array();
				?>
				<div class="form-check">
					<?php
					if($cekKunci){
						// echo $value->uniq.' '.$cekKunci['kunci_jawaban'].'<br>';
						if($value->uniq==$cekKunci['kunci_jawaban']){
							?> <input type="radio" name="kunci_objektif" class="form-check-input" id="<?= $value->uniq ?>" value="<?= $value->uniq ?>" checked><label for="<?= $value->uniq ?>"><?= htmlspecialchars_decode($value->objektif) ?></label> <?php
						}else{
							?> <input type="radio" name="kunci_objektif" class="form-check-input" id="<?= $value->uniq ?>" value="<?= $value->uniq ?>"><label for="<?= $value->uniq ?>"><?= htmlspecialchars_decode($value->objektif) ?></label> <?php
						}
					}else{
						?> <input type="radio" name="kunci_objektif" class="form-check-input" id="<?= $value->uniq ?>" value="<?= $value->uniq ?>"><label for="<?= $value->uniq ?>"><?= htmlspecialchars_decode($value->objektif) ?></label> <?php
					}
					?>
				</div>
			<?php endforeach ?>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Belum ada data objektif tersimpan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}