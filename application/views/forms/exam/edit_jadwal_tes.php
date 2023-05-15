<?php
if($id){
	$cekData = $this->db->get_where('jadwal_tes', ['uniq'=>$id])->row_array();
	if($cekData){
		?>
		<form hx-post="<?= base_url('exam/data_jadwal_tes/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="datetime-local" name="waktu_mulai" class="form-control" value="<?= $cekData['waktu_mulai'] ?>">
				<label>Waktu Mulai</label>
			</div>
			<div class="form-floating mb-3">
				<input type="datetime-local" name="waktu_selesai" class="form-control" value="<?= $cekData['waktu_selesai'] ?>">
				<label>Waktu Selesai</label>
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