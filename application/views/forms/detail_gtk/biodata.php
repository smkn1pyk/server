<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$detail_gtk = $CI->m_data_utama->getgtk_id($id);
	if($detail_gtk){
		?>
		<div class="card">
			<div class="card-header"><h3>Biodata</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Nama</td>
							<td><?= $detail_gtk['nama'] ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><?= $detail_gtk['jenis_kelamin'] ?></td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td><?= $detail_gtk['tempat_lahir'].'/'.date('d-m-Y', strtotime($detail_gtk['tanggal_lahir'])) ?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td><?= $detail_gtk['agama_id_str'] ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $detail_gtk['nik'] ?></td>
						</tr>
						<tr>
							<td>Nomor KK</td>
							<td><?= $detail_gtk['no_kk'] ?></td>
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