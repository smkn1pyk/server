<?php
if($id){
	$CI =& get_instance();
	$this->load->model('m_data_utama');
	$detail_pd = $CI->m_data_utama->getpesertadidik_id($id);
	if($detail_pd){
		?>
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
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}