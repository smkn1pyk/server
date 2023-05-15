<?php
if($id){
	if($results){
		?>
		<div class="card">
			<div class="card-header">
				<div>Jumlah Data: <?= count($results) ?></div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img  id="spinner" class="htmx-indicator" src="<?= base_url('assets/img/spinner.gif') ?>" width="150px"/>
				</div>
				<form hx-post="<?= base_url('form/kirim_data/'.$id) ?>" hx-target="#results" class="mb-3" hx-indicator="#spinner">
					<div class="table-responsive mb-3" style="max-height: 300px;overflow: auto;">
						<table class="table table-sm">
							<thead class="sticky-top bg-light">
								<tr>
									<th>Nama</th>
									<th>Nomor SK</th>
									<th>Tanggal SK</th>
									<th>TMT</th>
									<th>Golongan</th>
								</tr>
							</thead>
							<?php foreach ($results as $key => $value): ?>
								<?php
								$encrypt = base64_encode(json_encode($value));
								$tahun_ajaran_id = substr($value->semester_id, 0, 4);
								$cekPTK = $this->db->get_where('getgtk', ['ptk_id'=>$value->ptk_id, 'tahun_ajaran_id'=>$tahun_ajaran_id])->row_array();
								?>
								<tr>
									<td>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" name="kirim_data[]" value="<?= $encrypt ?>" id="<?= $value->riwayat_kepangkatan_id ?>">
											<label class="form-check-label" for="<?= $value->riwayat_kepangkatan_id ?>">
												<?php
												if($cekPTK){
													echo $cekPTK['nama'];
												}
												?>
											</label>
										</div>
									</td>
									<td><?= $value->nomor_sk ?></td>
									<td><?= $value->tanggal_sk ?></td>
									<td><?= $value->tmt_pangkat ?></td>
									<td><?= $value->pangkat_golongan_id_str ?></td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
					<div class="d-block">
						<button class="btn btn-primary"><i class="fas fa-cloud-upload"></i> Kirim</button>
					</div>
				</form>
				<div id="results"></div>
			</div>
		</div>
		<?php
	}else{
		?> <div class="alert-danger p-3"> 0 Results </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}
?>
<script type="text/javascript">
	$("#checkAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>