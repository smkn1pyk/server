<div class="card">
	<div class="card-header">
		<div class="form-inline">
			<div class="form-floating">
				<select name="rombel" class="form-select" hx-get="<?= base_url('data_ref_dapodik/data_pembelajaran') ?>" hx-target="#data">
					<option value="">...</option>
					<?php foreach ($rombel as $key => $value): ?>
						<?php
						if($this->input->get('rombel')){
							if($value->rombongan_belajar_id==$this->input->get('rombel')){
								?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama ?></option> <?php
							}else{
								?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
							}
						}else{
							?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
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
		$CI =& get_instance();
		$CI->load->model('m_data_utama'); 
		if($pembelajaran){ 
			$n=0;
			?>
			<!-- <input type="checkbox" name="" id="checkAll"> -->
			Jumlah: <?= count($pembelajaran) ?> Data
			<form hx-post="<?= base_url('data_ref_dapodik/data_pembelajaran/hapus_pembelajaran') ?>" hx-target="#data">
				<table class="table table-striped table-bordered table-sm">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Matpel</th>
							<th>Nama Matpel</th>
							<th>GTK</th>
							<th>Status di Kurikulum</th>
							<th>Nama Rombel</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pembelajaran as $key => $value): $key++ ?>
							<?php
							$rombel_id = $CI->m_data_utama->getrombonganbelajar_id($value->rombongan_belajar_id);
							$gtk_id = $CI->m_data_utama->gtk_id($value->ptk_terdaftar_id);
							$n++;
							$encrypt = $this->encryption->encrypt(json_encode($value));
							?>
							<tr>
								<!-- <td><input type="checkbox" name="hapus_pembelajaran[]" value="<?= $encrypt ?>"></td> -->
								<td><?= $n ?></td>
								<td><?= $value->mata_pelajaran_id ?></td>
								<td><?= $value->mata_pelajaran_id_str ?></td>
								<td><?= $gtk_id['nama'] ?></td>
								<td><?= $value->status_di_kurikulum_str ?></td>
								<td>
									<?php
									if($rombel_id){
										echo $rombel_id['nama'];
									}else{
										echo $value->rombongan_belajar_id;
									}
									?>
								</td>
							</tr>
						<?php  endforeach ?>
					</tbody>
				</table>
				<!-- <button class="btn btn-danger fixed-bottom">Hapus</button> -->
			</form>
			<?php 
		}else{ 
			?> <div class="alert-danger p-5"> 0 Results </div> <?php
		}
		?>
	</div>
</div>
<script type="text/javascript">
	$("#checkAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>