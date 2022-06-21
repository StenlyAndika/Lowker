<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>LOWONGAN</strong>
					</div>
					<div class="card-header2">
						<?php if ( $this->session->userdata('email') != NULL ) { ?>
							<a href="<?= base_url() ?>lowongan/tambah" class="btn btn-sm btn-success">Data Baru</a>
						<?php } ?>
					</div>
					<div class="card-body card-block">
						<?php if ( $this->session->flashdata('flash') ) : ?>
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										Data Lowongan <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
										<button type="button" class="close" data-dismiss="alert" aria-label="close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							</div>
						<?php endif; ?>
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
										<?php if ( $this->session->userdata('username') != NULL ) { ?>
											<th>Opsi</th>
										<?php } ?>
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
												echo "<td>".$row['namajabatan']."</td>";
												echo "<td>".$row['jumlahformasi']."</td>";
												echo "<td>".$row['bataswaktu']."</td>";
												if ($row['status'] == 0) {
													echo "<td><div class='text-warning'><i class='fa fa-times-circle'></i> Belum diverifikasi</div></td>"; 
												} else if($row['status'] == 1) {
													echo "<td><div class='text-success'><i class='fa fa-circle-check'></i> Telah diverifikasi</div></td>"; 
												} else if($row['status'] == 2) {
													echo "<td><div class='text-danger'><i class='fa fa-times-circle'></i> Verifikasi ditolak</div></td>"; 
												}
												if ( $this->session->userdata('username') != NULL ) {
													if($row['status'] == 0) { ?>
														<td>
															<button type="button" class="btn btn-sm btn-primary veriflowongan" 
																data-id="<?= $row['idl'] ?>"
																data-ket="<?= $row['namajabatan']. ' di ' .$data['prshn']['namaperusahaan'] ?>">Verifikasi</button>
															<button type="button" class="btn btn-sm btn-danger tolaklowongan" 
																data-id="<?= $row['idl'] ?>"
																data-ket="<?= $row['namajabatan']. ' di ' .$data['prshn']['namaperusahaan'] ?>">Tolak</button>
														</td>
										<?php		} else {
														echo "<td><div class='text-danger'><i class='fa fa-times-circle'></i> Tidak tersedia</div></td>";
													}
												}
											} else {
												$no++;
												echo "<td>".$no."</td>";
												echo "<td>".$data['prshn']['namaperusahaan']."</td>";
												$data['lwg'] = $this->db->get_where('lowongan', ['idp' => $row['idp'], 'status' => '0'])->row_array();
												if ($data['lwg']['status'] == 0) {
													echo "<td>".$data['lwg']['namajabatan']."</td>";
													echo "<td>".$data['lwg']['jumlahformasi']."</td>";
													echo "<td>".$data['lwg']['bataswaktu']."</td>";
													if ($data['prshn']['status'] == 2) {
														echo "<td><div class='text-danger'><i class='fa fa-times-circle'></i> Perusahaan tidak terverifikasi</div></td>"; 
													} else {
														echo "<td><div class='text-warning'><i class='fa fa-times-circle'></i> Belum diverifikasi</div></td>"; 
													}
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
												if ( $this->session->userdata('username') != NULL ) {
													if($data['prshn']['status'] == 0) { ?>
														<td>
															<button type="button" class="btn btn-sm btn-primary veriflowongan" 
																data-id="<?= $row['idl'] ?>"
																data-ket="<?= $row['namajabatan']. ' di ' .$data['prshn']['namaperusahaan'] ?>">Verifikasi</button>
															<button type="button" class="btn btn-sm btn-danger tolaklowongan" 
																data-id="<?= $row['idl'] ?>"
																data-ket="<?= $row['namajabatan']. ' di ' .$data['prshn']['namaperusahaan'] ?>">Tolak</button>
														</td>
										<?php		} else {
														echo "<td><div class='text-danger'><i class='fa fa-times-circle'></i> Tidak tersedia</div></td>";
													}
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

<div class="modal fade" id="veriflowongan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post" action="<?= base_url() ?>lowongan/verif">
		<div class="modal-body">
		<input type="hidden" class="form-control" name="idl" id="idl" value=""/>
		<div class="form-group">
			<label>Keterangan Lowongan : </label>
			<input type="text" class="form-control" name="ket" id="ket" value=""/>
		</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
			<button type="submit" class="btn btn-primary">Verifikasi</button>
		</div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="tolaklowongan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tolak Verifikasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post" action="<?= base_url() ?>lowongan/tolak">
		<div class="modal-body">
		<input type="hidden" class="form-control" name="tolakidl" id="tolakidl" value=""/>
		<div class="form-group">
			<label>Keterangan Lowongan : </label>
			<input type="text" class="form-control" name="tolakket" id="tolakket" value=""/>
		</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
			<button type="submit" class="btn btn-danger">Tolak</button>
		</div>
	  </form>
    </div>
  </div>
</div>