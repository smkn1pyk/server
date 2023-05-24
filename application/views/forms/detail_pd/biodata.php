<?php
if($id){
	$CI =& get_instance();
	$this->load->model('m_data_utama');
	$detail_pd = $CI->m_data_utama->getpesertadidik_id($id);
	if($detail_pd){
		?>
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
						<tr>
							<td>Anak Keberapa (Berdasarkan Kartu Keluarga)</td>
							<td><?= $detail_pd['anak_keberapa'] ?> </td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}