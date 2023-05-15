<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="card">
		<div class="card-header text-end"></div>
		<div class="card-body">
			<?php
			if($list_soal){
				?>
				<?php foreach ($list_soal as $key => $value): $key++ ?>
					<div class="card mb-3">
						<div class="card-header"></div>
						<div class="card-body">
							<div class="pertanyaan">
								<h4><i class='fas fa-book-reader'></i> Pertanyaan <?= $key ?></h4>
								<?= $value->pertanyaan ?>
							</div>
							<?php
							if($value->jenis_soal=='1'){
								$this->db->order_by('id', 'desc');
								$cekObjektif = $this->db->get_where('objektif_soal', ['uniq_list'=>$value->uniq])->result();
								$cekKunci = $this->db->get_where('kunci_objektif', ['list_soal'=>$value->uniq])->row_array();
								if($cekObjektif){
									?>
									<div class="objektif" style="clear: both;">
										<h4><i class='fas fa-list'></i> Objektif</h4>
										<table class="table table-sm">
											<?php foreach ($cekObjektif as $key1 => $value1): $key1++ ?>
												<tr>
													<td class="align-middle"><?= $key1 ?></td>
													<td class="align-middle"><?= $value1->objektif ?></td>
												</tr>
											<?php endforeach ?>
										</table>
									</div>
									<div class="kunci_objektif">
										<?php
										if($cekKunci){
											$detailKunci = $this->db->get_where('objektif_soal', ['uniq_paket'=>$cekKunci['q'],'uniq_list'=>$cekKunci['list_soal'],'uniq'=>$cekKunci['kunci_jawaban']])->row_array();
											?>
											<h5><i class="fab fa-key"></i> Jawaban:</h5>
											<div><?= $detailKunci['objektif'] ?></div>
											<?php
										}
										?>
									</div>
									<?php
								}
							}
							?>
						</div>
					</div>
				<?php endforeach ?>
				<?php
			}else{
				?> <div class="alert-danger p-5">Belum ada data soal untuk ditampilkan</div> <?php
			}
			?>
		</div>
	</div>
</body>
</html>