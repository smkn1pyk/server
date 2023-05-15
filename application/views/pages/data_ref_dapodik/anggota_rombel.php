<div class="card">
	<div class="card-header">
		<div class="form-inline">
			<div class="form-floating">
				<select class="form-select" name="rombel" hx-get="<?= base_url('data_ref_dapodik/data_anggota_rombel') ?>" hx-target='#data' autofocus>
					<option value="">...</option>
					<?php foreach ($rombel as $key => $value): ?>
						<?php
						if($this->input->get('rombel')){
							if($value->rombongan_belajar_id==$this->input->get('rombel')){
								?> <option value="<?= $value->rombongan_belajar_id ?>" selected> <?= $value->nama.'-'.$value->jenis_rombel_str ?></option> <?php
							}else{
								?> <option value="<?= $value->rombongan_belajar_id ?>"> <?= $value->nama.'-'.$value->jenis_rombel_str ?></option> <?php
							}
						}else{
							?> <option value="<?= $value->rombongan_belajar_id ?>"> <?= $value->nama.'-'.$value->jenis_rombel_str ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Rombel</label>
			</div>
		</div>
	</div>
	<div class="card-body">
		<?php
		if($anggota_rombel){
			?>
			Jumlah: <?= count($anggota_rombel) ?> Data
			<div class="table-responsive">
				<table class="table table-sm">
					<tbody>
						<?php foreach ($anggota_rombel as $key => $value): $key++; ?>
							<?php
							$tahun_ajaran_id = substr($this->session->userdata('semester_id'), 0, 4);
							$where = ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'anggota_rombel_id'=>$value->anggota_rombel_id, 'peserta_didik_id'=>$value->peserta_didik_id];
							$object = [
								'rombongan_belajar_id' => $value->rombongan_belajar_id,
								'anggota_rombel_id' => $value->anggota_rombel_id,
								'peserta_didik_id' => $value->peserta_didik_id,
								'jenis_pendaftaran_id' => $value->jenis_pendaftaran_id,
								'jenis_pendaftaran_id_str' => $value->jenis_pendaftaran_id_str,
								'status' => $value->status,
								'semester_id' => $this->session->userdata('semester_id'),
								'tahun_ajaran_id' => $tahun_ajaran_id,
							];
							// $this->db->where($where);
							// $this->db->delete('anggota_rombel');
							// $this->db->insert('anggota_rombel', $object);
							$this->db->order_by('semester_id', 'desc');
							$cekPD = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$value->peserta_didik_id])->row_array();
							?>
							<tr>
								<td><?= $key  ?></td>
								<td>
									<?php
									if($cekPD){
										echo $cekPD['nama'];
									}
									?>
								</td>
								<td>
									<?php
									echo "<pre>";
									print_r ($value);
									echo "</pre>";
									?>
								</td>
								<td><?= $tahun_ajaran_id ?></td>
								<td>
									<?php
									echo "<pre>";
									print_r ($object);
									echo "</pre>";
									?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-3"> 0 Results </div> <?php
		}
		?>
	</div>
</div>