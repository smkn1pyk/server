<?php
if($id){
	$CI =& get_instance();
	$this->load->model('m_data_utama');
	$detail_pd = $CI->m_data_utama->getpesertadidik_id($id);
	if($detail_pd){
		?>
		<div class="row">
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