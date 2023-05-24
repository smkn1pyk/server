<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$detail_gtk = $CI->m_data_utama->getgtk_id($id);
	if($detail_gtk){
		?>
		<div class="card">
			<div class="card-header"><h3>Anggota Keluarga</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Nama Ibu Kandung</td>
							<td><?= $detail_gtk['nama_ibu_kandung'] ?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td><?= $detail_gtk['status_perkawinan'] ?></td>
						</tr>
						<tr>
							<td>Nama Suami/Istri</td>
							<td><?= $detail_gtk['nama_suami_istri'] ?></td>
						</tr>
						<tr>
							<td>Pekerjaan Suami/Istri</td>
							<td><?= $detail_gtk['pekerjaan_suami_istri'] ?></td>
						</tr>
						<tr>
							<td>NIP Suami/Istri</td>
							<td><?= $detail_gtk['nip_suami_istri'] ?></td>
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