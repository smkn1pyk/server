<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$detail_gtk = $CI->m_data_utama->getgtk_id($id);
	if($detail_gtk){
		?>
		<div class="card">
			<div class="card-header"><h3>Kepegawaian</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td>PTK Induk</td>
							<td><?= $detail_gtk['ptk_induk'] ?></td>
						</tr>
						<tr>
							<td>NUPTK</td>
							<td><?= $detail_gtk['nuptk'] ?></td>
						</tr>
						<tr>
							<td>NIP</td>
							<td><?= $detail_gtk['nip'] ?></td>
						</tr>
						<tr>
							<td>Jenis PTK</td>
							<td><?= $detail_gtk['jenis_ptk_id_str'] ?></td>
						</tr>
						<tr>
							<td>Status Kepegawaian</td>
							<td><?= $detail_gtk['status_kepegawaian_id_str'] ?></td>
						</tr>
						<tr>
							<td>Tugas Tambahan</td>
							<td><?= $detail_gtk['tugas_tambahan'] ?></td>
						</tr>
						<tr>
							<td>SK CPNS</td>
							<td><?= $detail_gtk['sk_cpns'] ?></td>
						</tr>
						<tr>
							<td>Tanggal CPNS</td>
							<td><?= date('d-m-Y', strtotime($detail_gtk['tanggal_cpns'])) ?></td>
						</tr>
						<tr>
							<td>SK Pengankatan</td>
							<td><?= $detail_gtk['sk_pengangkatan'] ?></td>
						</tr>
						<tr>
							<td>TMT Pengangkatan</td>
							<td><?= $detail_gtk['tmt_pengangkatan'] ?></td>
						</tr>
						<tr>
							<td>Lembaga Pengangkatan</td>
							<td><?= $detail_gtk['lembaga_pengangkatan'] ?></td>
						</tr>
						<tr>
							<td>Sumber Gaji</td>
							<td><?= $detail_gtk['sumber_gaji'] ?></td>
						</tr>
						<tr>
							<td>Lisensi Kepala Sekolah</td>
							<td><?= $detail_gtk['sudah_lisensi_kepala_sekolah'] ?></td>
						</tr>
						<tr>
							<td>Diklat Kepengawasan</td>
							<td><?= $detail_gtk['pernah_diklat_kepengawasan'] ?></td>
						</tr>
						<tr>
							<td>Keahlian Braile</td>
							<td><?= $detail_gtk['keahlian_braile'] ?></td>
						</tr>
						<tr>
							<td>Keahlian Bahasa Isyarat</td>
							<td><?= $detail_gtk['keahlian_bahasa_isyarat'] ?></td>
						</tr>
						<tr>
							<td>Keahlian Braile</td>
							<td><?= $detail_gtk['keahlian_braile'] ?></td>
						</tr>
						<tr>
							<td>NPWP</td>
							<td><?= $detail_gtk['npwp'] ?></td>
						</tr>
						<tr>
							<td>Nama Wajib Pajak</td>
							<td><?= $detail_gtk['nama_wajib_pajak'] ?></td>
						</tr>
						<tr>
							<td>Karpeg</td>
							<td><?= $detail_gtk['karpeg'] ?></td>
						</tr>
						<tr>
							<td>Karsi/Karsu</td>
							<td><?= $detail_gtk['karsi_karsu'] ?></td>
						</tr>
						<tr>
							<td>NUKS</td>
							<td><?= $detail_gtk['nuks'] ?></td>
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