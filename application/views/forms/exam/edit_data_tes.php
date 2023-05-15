<?php
if($id){
	$cekData = $this->db->get_where('data_tes', ['uniq'=>$id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	$nama = $cekData['nama'];
	if($cekData){
		?>
		<form hx-post="<?= base_url("exam/data_tes/edit/".$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" value="<?= $nama ?>" required>
				<label>Nama Tes</label>
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