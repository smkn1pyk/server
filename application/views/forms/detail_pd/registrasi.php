<?php
if($id){
	$CI =& get_instance();
	$this->load->model('m_data_utama');
	$detail_pd = $CI->m_data_utama->getpesertadidik_id($id);
	if($detail_pd){
		?>
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
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}