<?php
if($id){
	echo $id;
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	if($id=='pembelajaran'){
		$rombel = $CI->m_data_utama->getrombonganbelajar();
		if($rombel){
			?>
			<div class="card">
				<div class="card-header">
					<form hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" class="form-inline">
						<div class="form-check m-3">
							<input type="checkbox" name="checkAll" id="checkAll" class="form-check-input">
							<label for="checkAll">Pilih Semua</label>
						</div>
						<div class="form-floating m-3">
							<select class="form-select" name="rombel" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" hx-indicator="#spinner" autofocus>
								<option value="">...</option>
								<?php foreach ($rombel as $key => $value): ?>
									<option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option>
								<?php endforeach ?>
							</select>
							<label>Rombel</label>
						</div>
						<div class="d-block">
							<button class="btn btn-primary"><i class="fas fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="card-body" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" hx-trigger="load">
					<div id="results" style="max-height: 600px;overflow: auto;"></div>
				</div>
			</div>
			<?php
		}
	}else
	if($id=='rwy_pend_formal'||$id=='rwy_kepangkatan'){
		$getgtk = $CI->m_data_utama->getgtk();
		if($getgtk){
			?>
			<div class="card">
				<div class="card-header">
					<form hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" class="form-inline">
						<div class="form-check m-3">
							<input type="checkbox" name="checkAll" id="checkAll" class="form-check-input">
							<label for="checkAll">Pilih Semua</label>
						</div>
						<div class="form-floating m-3">
							<select class="form-select" name="ptk" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" autofocus>
								<option value="">...</option>
								<?php foreach ($getgtk as $key => $value): ?>
									<option value="<?= $value->ptk_id ?>"><?= $value->nama ?></option>
								<?php endforeach ?>
							</select>
							<label>PTK</label>
						</div>
						<div class="d-block">
							<button class="btn btn-primary"><i class="fas fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="card-body" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" hx-trigger="load">
					<div id="results" style="max-height: 600px;overflow: auto;"></div>
				</div>
			</div>
			<?php
		}
	}else
	if($id=='anggota_rombel'){
		$rombel = $this->m_data_utama->getrombonganbelajar();
		if($rombel){
			?>
			<div class="card">
				<div class="card-header">
					<form hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" class="form-inline">
						<div class="form-check m-3">
							<input type="checkbox" name="checkAll" id="checkAll" class="form-check-input">
							<label for="checkAll">Pilih Semua</label>
						</div>
						<div class="form-floating m-3">
							<select class="form-select" name="rombel" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" autofocus>
								<option value="">...</option>
								<?php foreach ($rombel as $key => $value): ?>
									<option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?> - <?= $value->jenis_rombel_str ?></option>
								<?php endforeach ?>
							</select>
							<label>Rombel</label>
						</div>
						<div class="d-block">
							<button class="btn btn-primary"><i class="fas fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="card-body" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" hx-trigger="load">
					<div id="results" style="max-height: 600px;overflow: auto;"></div>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="card">
			<div class="card-header">
				<form hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" class="form-inline">
					<div class="form-check m-3">
						<input type="checkbox" name="checkAll" id="checkAll" class="form-check-input">
						<label for="checkAll">Pilih Semua</label>
					</div>
					<div class="form-floating m-3">
						<input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
						<label>Pencarian</label>
					</div>
					<div class="d-block">
						<button class="btn btn-primary"><i class="fas fa-search"></i></button>
					</div>
				</form>
			</div>
			<div class="card-body" hx-get="<?= base_url('form/postdapodik_data/'.$id) ?>" hx-target="#results" hx-trigger="load">
				<div id="results" style="max-height: 600px;overflow: auto;"></div>
			</div>
		</div>
		<?php
	}
}else{
	?> <div class="alert-danger"> Terjadi kesalahan sitem</div> <?php
}
?>