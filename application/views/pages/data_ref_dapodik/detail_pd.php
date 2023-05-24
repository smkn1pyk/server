
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header"><h3>Biodata Siswa</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Nama</td>
							<td><?= $detail_pd['nama'] ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $detail_pd['nik'] ?></td>
						</tr>
						<tr>
							<td>NIS/NISN</td>
							<td><?= $detail_pd['nipd'] ?>/<?= $detail_pd['nisn'] ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><?= $detail_pd['jenis_kelamin'] ?></td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td><?= $detail_pd['tempat_lahir'] ?>/<?= date('d-m-Y', strtotime($detail_pd['tanggal_lahir'])) ?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td><?= $detail_pd['agama_id_str'] ?></td>
						</tr>
						<tr>
							<td>Tinggi Badan</td>
							<td><?= $detail_pd['tinggi_badan'] ?></td>
						</tr>
						<tr>
							<td>Berat Badan</td>
							<td><?= $detail_pd['berat_badan'] ?></td>
						</tr>
						<tr>
							<td>Anak keberapa</td>
							<td><?= $detail_pd['anak_keberapa'] ?> (Berdasarkan Kartu Keluarga)</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md">
		<div class="card">
			<div class="card-header"><h3>Biodata Ayah</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Nama</td>
							<td><?= $detail_pd['nama_ayah'] ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $detail_pd['NIK_Ayah'] ?></td>
						</tr>
						<tr>
							<td>Tahun Lahir</td>
							<td><?= $detail_pd['Tahun_Lahir_Ayah'] ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td><?= $detail_pd['Jenjang_Pendidikan_Ayah'] ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><?= $detail_pd['pekerjaan_ayah_id_str'] ?></td>
						</tr>
						<tr>
							<td>Penghasilan</td>
							<td><?= $detail_pd['Penghasilan_Ayah'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md">
		<div class="card">
			<div class="card-header"><h3>Biodata Ibu</h3></div>
			<div class="card-body">
				
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Nama</td>
							<td><?= $detail_pd['nama_ibu'] ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $detail_pd['NIK_Ibu'] ?></td>
						</tr>
						<tr>
							<td>Tahun Lahir</td>
							<td><?= $detail_pd['Tahun_Lahir_Ibu'] ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td><?= $detail_pd['Jenjang_Pendidikan_Ibu'] ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><?= $detail_pd['pekerjaan_ayah_id_str'] ?></td>
						</tr>
						<tr>
							<td>Penghasilan</td>
							<td><?= $detail_pd['Penghasilan_Ibu'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
echo "<pre>";
print_r ($detail_pd);
echo "</pre>";
?>