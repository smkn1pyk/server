

<div class="card">
	<div class="card-header">
		<button class="btn btn-secondary" hx-post="<?= base_url('form/get/data_ref_dapodik/kop_sekolah') ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-icons"></i> Kop Sekolah</button>
	</div>
	<div class="card-body">
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
		}
		?>
	</div>
</div>
<?php
if($sekolah){
	?>
	<div class="row mt-3">
		<?php foreach ($sekolah as $key => $value): ?>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<table class="table table-sm">
							<?php foreach ($value as $key1 => $value1): ?>
								<?php if($key1!='id'&&$key1!='sekolah_id'&&$key1!='bentuk_pendidikan_id'&&$key1!='status_sekolah'&&$key1!='is_sks'&&$key1!='semester_id') { ?>
									<tr>
										<td><?= ucwords(str_replace(['_id_str', '_str', '_'], " ", $key1)) ?></td>
										<td><?= $value1 ?></td>
									</tr>
								<?php } ?>
							<?php endforeach ?>
						</table>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<?php
}
?>