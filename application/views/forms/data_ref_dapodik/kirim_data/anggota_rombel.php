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
									<th>Tingkat</th>
									<th>Rombel</th>
									<th>Jenis Rombel</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($results as $key => $value): ?>
									<?php
									$encrypt = base64_encode(json_encode($value));
									$tahun_ajaran_id = substr($value->semester_id, 0, 4);
									$cekPD = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$value->peserta_didik_id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
									$cekRombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id,'semester_id'=>$this->session->userdata('semester_id')])->row_array();
									?>
									<tr>
										<td>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" name="kirim_data[]" value="<?= $encrypt ?>" id="<?= $value->peserta_didik_id ?>">
												<label class="form-check-label" for="<?= $value->peserta_didik_id ?>">
													<?php
													if($cekPD){
														echo $cekPD['nama'];
													}
													?>
												</label>
											</div>
										</td>
										<?php
										if($cekRombel){
											?>
											<td><?= $cekRombel['tingkat_pendidikan_id'] ?></td>
											<td><?= $cekRombel['nama'] ?></td>
											<td><?= $cekRombel['jenis_rombel'] ?></td>
											<?php
										}else{
											?> <td colspan="3"></td> <?php
										}
										?>
										
									</tr>
								<?php endforeach ?>
							</tbody>
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