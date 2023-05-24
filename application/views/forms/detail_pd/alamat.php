<?php
if($id){
	$CI =& get_instance();
	$this->load->model('m_data_utama');
	$detail_pd = $CI->m_data_utama->getpesertadidik_id($id);
	if($detail_pd){
		?>
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