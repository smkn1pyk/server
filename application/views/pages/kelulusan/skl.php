<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/lulusan.css') ?>"> -->
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="icon" type="images/png" href="<?= base_url('assets/images/favicon.png') ?>">
	<style type="text/css">
		@media only screen and (max-width: 600px) {
			html, body {
				width: 100%;
			}

		}
		@media print {
			html, body {
				width: 210mm;
				height: 297mm;
				font-size: 12pt;
			}
			.tombol{display: none;}
			header { display : none; }
		}

		button {
			padding: 15px;
			font-weight: bold;
			margin-bottom: 15mm; 
		}

		.container{
			width: 210mm;
			height: 297mm;
			margin: auto;
		}

		.m-0{margin: 0;}

		.header{
			clear: both;
			width: 210mm;
		}
		.header-kiri{
			width: 30mm;
			float: left;
		}
		.header-tengah{
			width: 150mm;
			float: left;
			text-align: center;
		}

		.header-tengah p{
			font-size: 9pt;
		}
		.header-kanan{
			width: 30mm;
			float: right;
		}

		.header-kanan img{margin-top: -10px;}
		.judul{
			clear: both;
			border-top: 3px solid #333;
			width: 210mm;
			margin-bottom: 10mm;
			text-align: center;
		}

		.judul h3{margin-bottom: 0;}

		.isi{
			width: 210mm;
			text-align: justify;
			line-height: 1.8;
		}

		.isi table{
			line-height: 1.8;
			font-size: 12pt;
		}

		.ttd{
			clear: both;
			width: 210mm;
		}
		.ttd-kanan{
			/*border: 1px solid #ddd;*/
			width: 55mm;
			float: right;
		}

		.ttd-kanan img{
			margin-top: -15px;
			margin-left: -85px;
			z-index: 3;
		}

		.ctt{
			clear: both;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
		// $bulan = [
		// 	'01' => 'Januari',
		// 	'02' => 'Februari',
		// 	'03' => 'Maret',
		// 	'04' => 'April',
		// 	'05' => 'Mei',
		// 	'06' => 'Juni',
		// 	'07' => 'Juli',
		// 	'08' => 'Agustus',
		// 	'09' => 'September',
		// 	'10' => 'Oktober',
		// 	'11' => 'November',
		// 	'12' => 'Desember'
		// ];
		// $x_tanggal_surat = explode('-', $lulusan['tanggal_surat']);
		// $tanggal_tanggal_surat = $x_tanggal_surat[2];
		// echo $bulan_tanggal_surat = $bulan[$x_tanggal_surat[1]];
		// $tahun_tanggal_surat = $x_tanggal_surat[0];
		// exit();
		if($status){
			?>
			<div class="header">
				<!-- <div class="tombol" style="float: right;width: 200mm; text-align: right;">
					<button onclick="print();"><i class="fas fa-print"></i> Print</button>
					<a href="<?= base_url('auth/keluar') ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
				</div> -->
				<?php
				if($kop_sekolah){
					?>
					<div class="header-kiri">
						<?= '<img src="data:image/jpeg;base64,'.base64_encode($kop_sekolah['logo_1']).'" width="110px"/>' ?>
						<!-- <img src="<?= base_url('assets/images/logo-prov.png') ?>" width="110px"> -->
					</div>
					<div class="header-tengah">
						<h3 class="m-0"><?= $kop_sekolah['header_1'] ?></h3>
						<H3 class="m-0"><?= $kop_sekolah['header_2'] ?></H3>
						<h3 class="m-0"><?= $kop_sekolah['header_3'] ?></h3>
						<?php
						if($sekolah){
							?>
							<h2 class="m-0"><?= $sekolah['nama'] ?></h2>
							<p class="m-0"><?= $sekolah['alamat_jalan'] ?> - Telp/Fax <?= $sekolah['nomor_telepon'] ?></p>
							<p class="m-0">E-Mail: <?= $sekolah['email'] ?> - Web: <?= $sekolah['website'] ?> - Kode Pos: <?= $sekolah['kode_pos'] ?></p>
							<?php
						}else{
							?>
							<H2 class="m-0">SMK NEGERI 1 PAYAKUMBUH</H2>
							<P class="m-0">Jalan ASOKA no.6 - Telp/Fax (0752) 92047</P>
							<p class="m-0">E-Mail : smkn1pyk@gmail.com -  WEB : https://smkn1payakumbuh.sch.id - Kode Pos : 26225</p>
							<?php
						}
						?>
					</div>
					<div class="header-kanan align-middle">
						<?= '<img src="data:image/jpeg;base64,'.base64_encode($kop_sekolah['logo_2']).'" width="110px"/>' ?>
						<!-- <img src="<?= base_url('assets/images/logo.png') ?>" width="120px" class='mt-4'> -->
					</div>
					<?php
				}else{
					?>
					<div class="header-kiri">
						<img src="<?= base_url('assets/images/logo-prov.png') ?>" width="110px">
					</div>
					<div class="header-tengah">
						<h3 class="m-0">PEMERINTAHAN PROVINSI SUMATERA BARAT</h3>
						<H3 class="m-0">DINAS PENDIDIKAN</H3>
						<h3 class="m-0">CABANG DINAS WILAYAH IV</h3>
						<H2 class="m-0">SMK NEGERI 1 PAYAKUMBUH</H2>
						<P class="m-0">Jalan ASOKA no.6 - Telp/Fax (0752) 92047</P>
						<p class="m-0">E-Mail : smkn1pyk@gmail.com -  WEB : https://smkn1payakumbuh.sch.id - Kode Pos : 26225</p>
					</div>
					<div class="header-kanan">
						<img src="<?= base_url('assets/images/logo.png') ?>" width="120px" class='mt-4'>
					</div>
					<?php
				}
				?>
			</div>

			<div class="judul">
				<div>
					<h3>SURAT KETERANGAN LULUS</h3>
					<!-- <H3>PENGUMUMAN KELULUSAN</H3> -->
				</div>
				<h4 class="m-0">NO: <?= $lulusan['nomor_surat'] ?></h4>
			</div>

			<div class="isi">
				<p>Berdasarkan Surat Keputusan Kepala SMK Negeri 1 Payakumbuh No. <?= $lulusan['nomor_surat_penetapan'] ?>, tentang Kriteria Kelulusan dari Satuan Pendidikan dan hasil Rapat Dewan Guru tanggal: <?= date('d-M-Y', strtotime($lulusan['tanggal_penetapan'])) ?>, dengan  ini Kepala SMK  Negeri 1 Payakumbuh  menerangkan:</p>
				<table class="table-sm table-responsive mb-4">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?= strval($siswa['nama']) ?></td>
					</tr>
					<tr>
						<td>Tempat/ Tgl. Lahir</td>
						<td>:</td>
						<td><?= $siswa['tempat_lahir'].', '.date('d-m-Y', strtotime($siswa['tanggal_lahir'])) ?></td>
					</tr>
					<tr>
						<td>NIS / NISN</td>
						<td>:</td>
						<td><?= $siswa['nipd'].' / '. $siswa['nisn'] ?></td>
					</tr>
					<?php
					if($rombel){
						?>
						<tr>
							<td>Kompetensi Keahlian</td>
							<td>:</td>
							<td><?= $rombel['jurusan_id_str'] ?></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td>Kurikulum</td>
						<td>:</td>
						<td><?= $siswa['kurikulum_id'] ?>/<?= $siswa['kurikulum_id_str'] ?></td>
					</tr>
					<tr>
						<td>Nama Orang Tua</td>
						<td>:</td>
						<td>
							<?php
							if($siswa['nama_ayah']){
								echo $siswa['nama_ayah'];
							}else{
								if($siswa['nama_ibu']){
									echo $siswa['nama_ibu'];
								}
							}
							?>
						</td>
					</tr>
				</table>
				<p>Dinyatakan 
					<?php
					if($status['status']=='1'){
						echo "memenuhi";
					}else{
						echo "tidak memenuhi";
					}
					?>
					kriteria dan <b>
						<?php
						if($status['status']=='1'){
							echo "Lulus";
						}else{
							echo "Tidak Lulus";
						}
						?>
					</b> dari SMKN Negeri 1 Payakumbuh Tahun Pelajaran <?= date('Y', strtotime($lulusan['tanggal_surat']))-1 ?>/<?= date('Y', strtotime($lulusan['tanggal_surat'])) ?></p>
					<p>Demikianlah surat keterangan Lulus ini dikeluarkan untuk digunakan sesuai keperluan</p>
				</div>
				<div class="ttd">
					<div class="ttd-kanan">
						Dikeluarkan di : Payakumbuh<br>
						Pada Tanggal   : <?= date('d-M-Y', strtotime($lulusan['tanggal_surat'])) ?><br>
						Kepala<br>
						<?php
						if($kop_sekolah){
							echo '<img src="data:image/jpeg;base64,'.base64_encode($kop_sekolah['ttd']).'" width="270px"/>';
						}else{
							?> <img src="<?= base_url('assets/images/ttd.png') ?>" width="270px" class='ml-0'> <?php	
						}
						?>

					</div>
				</div>
				<div class="ctt">
					Ctt: Mohon dikonfirmasi ke Operator Kesiswaan<br>apabila ada penulisan data yang salah sebelum penulisan ijazah.
				</div>
			</div>
			<?php
		}
		?>
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				window.print();
			})
		</script>
	</body>
	</html>
