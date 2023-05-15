<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_kelulusan');
	$lulusan_data_id = $CI->m_kelulusan->lulusan_data_id($id);
	if($lulusan_data_id){
		?>
		<form hx-post="<?= base_url('kelulusan/lulusan_data/edit_lulusan/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="status" class="form-select">
					<option value="">...</option>
					<?php
					for ($i=0; $i < 2; $i++) { 
						if($i==0){
							$status="Tidal Lulus";
						}else
						if($i==1){
							$status = "Lulus";
						}

						if($i==$lulusan_data_id['status']){
							?> <option value="<?= $i ?>" selected><?= $status ?></option> <?php
						}else{
							?> <option value="<?= $i ?>"><?= $status ?></option> <?php
						}
					}
					?>
				</select>
				<label>Status Lulus</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div>Terjadi kesalahan sistem, data tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger p-3">Terjadi kesalahan sistem </div> <?php
}