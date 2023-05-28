<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$pengguna = $CI->m_data_utama->getpengguna_id($id);
	if($pengguna){
		?>
		<form hx-post="<?= base_url('data_ref_dapodik/data_pengguna/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="email" name="username" class="form-control" placeholder="Username" value="<?= $pengguna['username'] ?>">
				<label>Username</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" class="form-control" placeholder="Password">
				<label>Password</label>
			</div>
			<div class="form-floating mb-3">
				<select name="status" class="form-select">
					<?php
					for ($i=0; $i <= 1; $i++) { 
						if($i==0){$status="Tidak Aktif";}else if($i==1){$status="Aktif";}
						if($i==$pengguna['status']){
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
		?> <div class="alert-danger p-3" > Terjadi kesalahan sistem, data pengguna tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}