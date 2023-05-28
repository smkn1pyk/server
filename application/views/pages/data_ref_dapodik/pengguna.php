<div class="card">
	<div class="card-header">
		<form hx-get="<?= base_url('data_ref_dapodik/data_pengguna') ?>" hx-target="#data" class="form-inline">
			<div class="form-floating">
				<select class="form-select" name="peran" hx-get="<?= base_url('data_ref_dapodik/data_pengguna') ?>" hx-target="#data">
					<option value="">...</option>
					<?php foreach ($peran as $key => $value): ?>
						<?php
						if($this->input->get('peran')){
							if($value->peran_id_str==$this->input->get('peran')){
								?> <option selected><?= $value->peran_id_str ?></option> <?php
							}else{
								?> <option><?= $value->peran_id_str ?></option> <?php
							}
						}else{
							?> <option><?= $value->peran_id_str ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Peran</label>
			</div>
		</form>
	</div>
	<div class="card-body">
		<?php if($pengguna){ ?>
			<div>Jumlah <?= count($pengguna) ?> Data</div>
			<table class="table table-striped table-bordered table-sm">
				<tbody>
					<?php foreach ($pengguna as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->username ?></td>
							<td><?= $value->peran_id_str ?></td>
							<td>
								<?php
								if($value->peserta_didik_id){
									$tanggal_lahir = $this->db->query("SELECT tanggal_lahir from getpesertadidik where peserta_didik_id='$value->peserta_didik_id'")->row_array();
									if($tanggal_lahir){
										echo $tanggal_lahir['tanggal_lahir'];
									}
								}
								?>
							</td>
							<td>
								<?php
								if($value->status==0){$status="Tidak Aktif";}else if($value->status==1){$status="Aktif";}
								echo $status;
								?>
							</td>
							<td class="text-center">
								<button class="btn btn-success btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/data_ref_dapodik/edit_pengguna/'.$value->pengguna_id) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
								<button class="btn btn-danger btn-sm" hx-post="<?= base_url('data_ref_dapodik/data_pengguna/hapus/'.$value->pengguna_id) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<div class="alert-danger p-3"> 0 Results </div>
		<?php } ?>
	</div>
</div>