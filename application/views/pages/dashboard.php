<?php
$CI =& get_instance();
?>
<?php
if($kop_sekolah){ 
	?>
	<div class="row">
		<?php foreach ($kop_sekolah as $key => $value): ?>
			<div class="col-2">
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($value->logo_1).'" width="110px"/>' ?>
			</div>
			<div class="col-8 text-center" style="line-height: 0.5; font-family: Times">
				<h5 class="m-0"><?= $value->header_1 ?></h5>
				<h5 class="m-0"><?= $value->header_2 ?></h5>
				<h5 class="m-0"><?= $value->header_3 ?></h5>
				<?php
				if($sekolah){
					foreach ($sekolah as $key1 => $value1) {
						?>
						<h2 class="m-0"><?= $value1->nama; ?></h2>
						<p class="m-2" style="font-family: monospace;"><?= $value1->alamat_jalan ?> - Kel. <?= $value1->desa_kelurahan.' '.$value1->kecamatan ?></p>
						<p class="m-2" style="font-family: monospace;"><?= $value1->kabupaten_kota ?> - Telp: <?= $value1->nomor_telepon ?> Kode Pos <?= $value1->kode_pos ?></p>
						<p class="m-2" style="font-family: monospace;">E-mail: <?= $value1->email ?> - Website: <?= $value1->website ?></p>
						<?php
					}
				}
				?>
			</div>
			<div class="col-2">
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($value->logo_2).'" width="110px"/>' ?>
			</div>
		<?php endforeach ?>
	</div>
	<div class="text-end"><?= '<img src="data:image/jpeg;base64,'.base64_encode($kop_sekolah[0]->ttd).'" width="110px"/>' ?></div>
	<?php
}else{
	?> <div class="alert-danger p-3 mb-3"> Anda belum menabahkan Kop Sekolah, Klik <button class="btn" hx-post="<?= base_url('form/get/data_ref_dapodik/kop_sekolah') ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal">Disini</button> untuk menambahkan </div> <?php
}
?>
<div class="row">
	<div class="col-xl-3 col-md-6">
		<div class="card bg-primary text-white mb-4">
			<div class="card-body">
				<?= $gtk['jml'] ?>
				<h4>GTK</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_ref_dapodik/gtk') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card bg-warning text-white mb-4">
			<div class="card-body">
				<?= $pd['jml'] ?>
				<h4>Peserta Didik</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_ref_dapodik/pd') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card bg-success text-white mb-4">
			<div class="card-body">
				<?= $rombel['jml'] ?>
				<h4>Rombongan Belajar</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_ref_dapodik/rombel') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card bg-danger text-white mb-4">
			<div class="card-body">
				<?= $pengguna['jml'] ?>
				<h4>Pengguna</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_ref_dapodik/pengguna') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<div class="card border rounded">
			<div class="card-header bg-donker text-light">
				<h5>Profil Sekolah</h5>
			</div>
			<div class="card-body">
				<?php
				if($sekolah){
					?>
					<div class="table-responsive">
						<table class="table table-sm">
							<?php foreach ($sekolah as $key => $value): ?>
								<?php foreach ($value as $key1 => $value1): ?>
									<?php
									if($key1!='id'&&$key1!='sekolah_id'&&$key1!='semester_id'){
										?>
										<tr>
											<td><?= $key1 ?></td>
											<td><?= $value1 ?></td>
										</tr>
										<?php
									}
									?>
								<?php endforeach ?>
							<?php endforeach ?>						
						</table>
					</div>
					<?php 
				}
				?>
			</div>
		</div>
	</div>
	<div class="col-md">
		<?php
		if($kurikulum){
			// exit();
			?>
			<div class="card">
				<div class="card-header bg-donker text-light">
					<h5>Kurikulum</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-sm">
							<thead>
								<tr>
									<th class="align-middle">No</th>
									<th class="align-middle">Tingkat</th>
									<th class="align-middle">Kurikulum ID</th>
									<th class="align-middle">Kurikulum</th>
									<th class="align-middle">Rombel</th>
									<th class="align-middle">L</th>
									<th class="align-middle">P</th>
									<th class="align-middle">Jml</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($kurikulum as $key => $value): $key++ ?>
									<?php
									$CI->load->model('m_data_utama');
									$rombel_kurikulum = $CI->m_data_utama->rombel_kurikulum($value->kurikulum_id);
									?>
									<tr>
										<td><?= $key ?></td>
										<td><?= $value->tingkat_pendidikan_id ?></td>
										<td><?= $value->kurikulum_id ?></td>
										<td><?= $value->kurikulum_id_str ?></td>
										<?php
										if($rombel_kurikulum){
											echo "<td>".count($rombel_kurikulum)."</td>";
											foreach ($rombel_kurikulum as $key1 => $value1) {
												$pd_rombel_l = $CI->m_data_utama->pd_rombel_l($value1->rombongan_belajar_id);
												$pd_rombel_p = $CI->m_data_utama->pd_rombel_p($value1->rombongan_belajar_id);
												$jml_siswa_l[$key][] = count($pd_rombel_l);
												$jml_siswa_p[$key][] = count($pd_rombel_p);
											}
											$tJml_siswa_l = array_sum($jml_siswa_l[$key]);
											$tJml_siswa_p = array_sum($jml_siswa_p[$key]);
											$Total_siswa = $tJml_siswa_l + $tJml_siswa_p;
											echo "<td>".$tJml_siswa_l."</td>";
											echo "<td>".$tJml_siswa_p."</td>";
											echo "<td>".$Total_siswa."</td>";
										}else{
											echo "<td colspan='4'>-</td>";
										}
										?>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>