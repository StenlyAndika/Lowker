<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h6>SELAMAT DATANG <?= strtoupper($member['nama']) ?></h6>
					</div>
					<div class="card-header2">
						<p>
Member area adalah halaman untuk mengolah data perusahaan dan untuk mem-publish lowongan pekerjaan pada perusahaan anda.
Berikut adalah data Pengajuan Perusahaan dan Lowongan,
<strong>Jika data ditolak oleh Admin, Anda dapat mengubah data tersebut dan memberikan informasi lowongan yang valid.</strong> </p>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<br>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h6>Daftar Perusahaan yang belum di verifikasi oleh Admin </h6>
					</div>
					<div class="card-body card-block">
						<form>
							<div class="table-responsive-lg">
							<table id="datatable" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Perusahaan</th>
										<th>NPWP</th>
										<th>Alamat</th>
										<th>Status</th>
									</tr>	
								</thead>
								<tbody>
									<?php $no=0; foreach ($perusahaan as $row) : $no++; ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $row['namaperusahaan']; ?></td>
										<td><?= $row['npwp']; ?></td>
										<td><?= $row['alamat']; ?></td>
										<td><?php if($row['status'] == 0) { echo "<div class='text-warning'><i class='fa fa-times-circle'></i> Belum Diverifikasi</div>"; } ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<br>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h6>Daftar lowongan yang belum di verifikasi oleh Admin</h6>
					</div>
					<div class="card-body card-block">
						<form>
							<div class="table-responsive-lg">
							<table id="datatable" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Perusahaan</th>
										<th>Posisi</th>
										<th>Jumlah Dibutuhkan</th>
										<th>Batas Waktu</th>
										<th>Status</th>
									</tr>	
								</thead>
								<tbody>
									<?php $no=0; foreach ($lowongan as $row) : ?>
									<tr>
										<?php
											$data['prshn'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
											if ($data['prshn']['status'] == 1) {
												$no++;
												echo "<td>".$no."</td>";
												echo "<td>".$data['prshn']['namaperusahaan']."</td>";
												$data['lwg'] = $this->db->get_where('lowongan', ['idp' => $row['idp'], 'status' => '0'])->row_array();
												if ($data['lwg']['status'] == 0) {
													echo "<td>".$data['lwg']['namajabatan']."</td>";
													echo "<td>".$data['lwg']['jumlahformasi']."</td>";
													echo "<td>".$data['lwg']['bataswaktu']."</td>";
													echo "<td><div class='text-warning'><i class='fa fa-times-circle'></i> Belum diverifikasi</div></td>"; 
												} else if($data['lwg']['status'] == 1) {
													echo "<td>".$data['lwg']['namajabatan']."</td>";
													echo "<td>".$data['lwg']['jumlahformasi']."</td>";
													echo "<td>".$data['lwg']['bataswaktu']."</td>";
													echo "<td><div class='text-success'><i class='fa fa-circle-check'></i> Telah diverifikasi</div></td>"; 
												} else if($data['lwg']['status'] == 2) {
													echo "<td>".$data['lwg']['namajabatan']."</td>";
													echo "<td>".$data['lwg']['jumlahformasi']."</td>";
													echo "<td>".$data['lwg']['bataswaktu']."</td>";
													echo "<td><div class='text-danger'><i class='fa fa-times-circle'></i> Verifikasi ditolak</div></td>"; 
												}
											}	
										?>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>