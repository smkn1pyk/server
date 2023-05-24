
<div class="row">
	<div class="col-md mb-3">
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
							<td>Jenis Kelamin</td>
							<td><?= $detail_pd['jenis_kelamin'] ?></td>
						</tr>
						<tr>
							<td>NISN</td>
							<td><?= $detail_pd['nisn'] ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $detail_pd['nik'] ?></td>
						</tr>
						<tr>
							<td>NO KK</td>
							<td><?= $detail_pd['no_kk'] ?></td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td><?= $detail_pd['tempat_lahir'] ?>/<?= date('d-m-Y', strtotime($detail_pd['tanggal_lahir'])) ?></td>
						</tr>
						<tr>
							<td>No Registrasi Akta Lahir</td>
							<td><?= $detail_pd['No_Registrasi_Akta_Lahir'] ?></td>
						</tr>
						<tr>
							<td>Kebutuhan Khusus</td>
							<td><?= $detail_pd['Kebutuhan_Khusus'] ?></td>
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
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md mb-3">
		<div class="card">
			<div class="card-header"><h3>Data Alamat</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Alamat</td>
							<td><?= $detail_pd['Alamat'] ?></td>
						</tr>
						<tr>
							<td>Dusun</td>
							<td><?= $detail_pd['Dusun'] ?></td>
						</tr>
						<tr>
							<td>RT</td>
							<td><?= $detail_pd['RT'] ?></td>
						</tr>
						<tr>
							<td>RW</td>
							<td><?= $detail_pd['RW'] ?></td>
						</tr>
						<tr>
							<td>Desa/Kelurahan</td>
							<td><?= $detail_pd['Kelurahan'] ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td><?= $detail_pd['Kecamatan'] ?></td>
						</tr>
						<tr>
							<td>Kode POS</td>
							<td><?= $detail_pd['Kode_Pos'] ?></td>
						</tr>
						<tr>
							<td>Lintang</td>
							<td><?= $detail_pd['lintang'] ?></td>
						</tr>
						<tr>
							<td>Bujur</td>
							<td><?= $detail_pd['bujur'] ?></td>
						</tr>
						<tr>
							<td>Jenis Tinggal</td>
							<td><?= $detail_pd['Jenis_Tinggal'] ?></td>
						</tr>
						<tr>
							<td>Alat Transportasi</td>
							<td><?= $detail_pd['Alat_Transportasi'] ?></td>
						</tr>
						<tr>
							<td>Anak Keberapa (Berdasarkan Kartu Keluarga)</td>
							<td><?= $detail_pd['anak_keberapa'] ?> </td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md mb-3">
		<div class="card">
			<div class="card-header"><h3>Kesejahteraan</h3> </div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Penerima KIP</td>
							<td><?= $detail_pd['Penerima_KIP'] ?></td>
						</tr>
						<tr>
							<td>Nomor KIP</td>
							<td><?= $detail_pd['Nomor_KIP'] ?></td>
						</tr>
						<tr>
							<td>Nama di KIP</td>
							<td><?= $detail_pd['Nama_di_KIP'] ?></td>
						</tr>
						<tr>
							<td>Nomor KKS</td>
							<td><?= $detail_pd['Nomor_KKS'] ?></td>
						</tr>
						<tr>
							<td>Bank</td>
							<td><?= $detail_pd['Bank'] ?></td>
						</tr>
						<tr>
							<td>Nomor Rekening Bank</td>
							<td><?= $detail_pd['Nomor_Rekening_Bank'] ?></td>
						</tr>
						<tr>
							<td>Rekening Atas Nama</td>
							<td><?= $detail_pd['Rekening_Atas_Nama'] ?></td>
						</tr>
						<tr>
							<td>Layak PIP (Usulan Sekolah)</td>
							<td><?= $detail_pd['Layak_PIP_usulan_dari_sekolah'] ?></td>
						</tr>
						<tr>
							<td>Alasan Layak PIP</td>
							<td><?= $detail_pd['Alasan_Layak_PIP'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md mb-3">
		<div class="card">
			<div class="card-header"><h3>Data Registrasi</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Jenis Pendaftaran</td>
							<td><?= $detail_pd['jenis_pendaftaran_id_str'] ?></td>
						</tr>
						<tr>
							<td>NIPD</td>
							<td><?= $detail_pd['nipd'] ?></td>
						</tr>
						<tr>
							<td>Tanggal Masuk Sekolah</td>
							<td><?= $detail_pd['tanggal_masuk_sekolah'] ?></td>
						</tr>
						<tr>
							<td>Sekolah Asal</td>
							<td><?= $detail_pd['sekolah_asal'] ?></td>
						</tr>
						<tr>
							<td>Nomor Peserta Ujian Nasional (SMP/MTs)</td>
							<td><?= $detail_pd['No_Peserta_Ujian_Nasional'] ?></td>
						</tr>
						<tr>
							<td>Nomor Seri Ijazah (SMP/MTs)</td>
							<td><?= $detail_pd['No_Seri_Ijazah'] ?></td>
						</tr>
						<tr>
							<td>SKHUN (SMP/MTs)</td>
							<td><?= $detail_pd['SKHUN'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md mb-3">
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
	<div class="col-md mb-3">
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

	<div class="col-md mb-3">
		<div class="card">
			<div class="card-header"><h3>Biodata Wali</h3></div>
			<div class="card-body">

				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Nama</td>
							<td><?= $detail_pd['nama_wali'] ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $detail_pd['NIK_Wali'] ?></td>
						</tr>
						<tr>
							<td>Tahun Lahir</td>
							<td><?= $detail_pd['Tahun_Lahir_Wali'] ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td><?= $detail_pd['Jenjang_Pendidikan_Wali'] ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><?= $detail_pd['pekerjaan_ayah_id_str'] ?></td>
						</tr>
						<tr>
							<td>Penghasilan</td>
							<td><?= $detail_pd['Penghasilan_Wali'] ?></td>
						</tr>
					</table>
				</div>
			</div>
			</div
		</div>