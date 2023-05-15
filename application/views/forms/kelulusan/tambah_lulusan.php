<?php
$CI =& get_instance();
$CI->load->model('m_kelulusan');
$pengaturan = $CI->m_kelulusan->lulusan_pengaturan();
if($pengaturan){
	$tingkat_pendidikan_id_akhir = $CI->m_kelulusan->tingkat_pendidikan_id_akhir();
	if($tingkat_pendidikan_id_akhir){
		$tingkat_pendidikan_id = $tingkat_pendidikan_id_akhir['tingkat_pendidikan_id'];
		$rombel_tingkat = $CI->m_kelulusan->rombel_tingkat($tingkat_pendidikan_id);
		if($rombel_tingkat){
			// $this->db->order_by('nama', 'asc');
			$rombongan_belajar_id = $rombel_tingkat[0]->rombongan_belajar_id;
			$peserta_didik_rombel = $CI->m_kelulusan->peserta_didik_rombel($rombongan_belajar_id);
			?>
			<div class="card">
				<div class="card-header">
					<div class="form-floating mb-3">
						<select name="rombel" class="form-select" hx-post="<?= base_url('kelulusan/peserta_didik_rombel') ?>" hx-target="#peserta_didik_rombel">
							<option value="">...</option>
							<?php foreach ($rombel_tingkat as $key => $value): ?>
								<option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option>
							<?php endforeach ?>
						</select>
						<label>Pilih Rombel</label>
					</div>
				</div>
				<div class="card-body">
					<div id="peserta_didik_rombel">
						<?php
						if($peserta_didik_rombel){
							?>
							<form hx-post="<?= base_url('kelulusan/lulusan_data/tambah_lulusan') ?>" hx-target="#data">
								<div class="form-inline">
									<div class="form-check m-3">
										<input type="checkbox" name="checkAll" id="checkAll" class="form-check-input">
										<label for="checkAll">Pilih Semua</label>
									</div>
									<div>
										<b><?= $peserta_didik_rombel[0]->nama_rombel ?></b>
									</div>

								</div>
								<div class="table-responsive" style="max-height: 300px;overflow: auto;">
									<table class="table table-sm table-striped">
										<thead class="sticky-top bg-light">
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>NISN</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($peserta_didik_rombel as $key => $value): $key++; ?>
												<tr>
													<td><?= $key ?></td>
													<td>
														<div class="form-check">
															<input type="checkbox" name="peserta_didik[]" class="form-check-input" value="<?= $value->peserta_didik_id ?>" id="<?= $value->peserta_didik_id ?>">
															<label for="<?= $value->peserta_didik_id ?>"><?= $value->nama ?></label>
														</div>
													</td>
													<td><label for="<?= $value->peserta_didik_id ?>"><?= $value->nisn ?></label></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<div class="d-block mt-3 mb-3">
									<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
								</div>
							</form>
							<?php
						}else{
							?> <div class="alert-danger p-2"> 0 Results </div> <?php
						}
						?>
					</div>
					<div id="results" style="max-height: 300px;overflow: auto;"></div>
				</div>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-3">Tidak ditemukan data rombel</div> <?php	
		}
	}else{
		?> <div class="alert-danger p-3">Tidak ditemukan data rombel</div> <?php
	}
}else{
	?> <div class="p-3 alert-info"> Belum ada data pengaturan, silahkan tambahkan data pengaturan terlebih dahulu ! </div> <?php
}
?>
<script type="text/javascript">
	$("#checkAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>