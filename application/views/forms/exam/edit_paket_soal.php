<?php
if($id){
	$cekPaketSoal = $this->db->get_where('paket_soal', ['uniq'=>$id])->row_array();
	if($cekPaketSoal){
		?>
		<form hx-post="<?= base_url('exam/data_paket_soal/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select class="form-select" name="status" required>
					<?php
					for ($i=0; $i < 2; $i++) { 
						if($i=='0'){$status='Proses Input Soal';}else{$status='Siap Uji';}
						if($i==$cekPaketSoal['status']){
							?> <option value="<?= $i ?>" selected><?= $status ?></option> <?php
						}else{
							?> <option value="<?= $i ?>"><?= $status ?></option> <?php
						}
					}
					?>
				</select>
				<label>Status</label>
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
	?> <div class="alert-danger p-3">Terjadi kesalahan sistem</div> <?php
}