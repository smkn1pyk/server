<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$detail_gtk = $CI->m_data_utama->getgtk_id($id);
	if($detail_gtk){
		?>
		<div class="card">
			<div class="card-header"><h3>Alamat</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>Alamat</td>
							<td><?= $detail_gtk['alamat'] ?></td>
						</tr>
						<tr>
							<td>RT</td>
							<td><?= $detail_gtk['rt'] ?></td>
						</tr>
						<tr>
							<td>RW</td>
							<td><?= $detail_gtk['rw'] ?></td>
						</tr>
						<tr>
							<td>Dusun</td>
							<td><?= $detail_gtk['dusun'] ?></td>
						</tr>
						<tr>
							<td>Desa/Kelurahan</td>
							<td><?= $detail_gtk['kelurahan'] ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td><?= $detail_gtk['kecamatan'] ?></td>
						</tr>
						<tr>
							<td>Kode POS</td>
							<td><?= $detail_gtk['kode_pos'] ?></td>
						</tr>
						<tr>
							<td>Telp</td>
							<td><?= $detail_gtk['telepon'] ?></td>
						</tr>
						<tr>
							<td>HP</td>
							<td><?= $detail_gtk['hp'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $detail_gtk['email'] ?></td>
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