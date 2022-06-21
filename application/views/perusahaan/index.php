<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>PERUSAHAAN</strong>
					</div>
					<div class="card-header2">
						<?php if ( $this->session->userdata('email') != NULL ) { ?>
							<a href="<?= base_url() ?>perusahaan/tambah" class="btn btn-sm btn-success">Data Baru</a>
						<?php } ?>
					</div>
					<div class="card-body card-block">
						<?php if ( $this->session->flashdata('flash') ) : ?>
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										Data Perusahaan <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
										<th>NPWP</th>
										<th>Alamat</th>
										<th>Status</th>
										<?php if ( $this->session->userdata('username') != NULL ) { ?>
											<th>Opsi</th>
										<?php } ?>
									</tr>	
								</thead>
								<tbody>
									<?php $no=0; foreach ($perusahaan as $row) : $no++; ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $row['namaperusahaan']; ?></td>
										<td><?= $row['npwp']; ?></td>
										<td><?= $row['alamat']; ?></td>
										<td><?php
											if($row['status'] == 0) {
												echo "<div class='text-warning'><i class='fa fa-times-circle'></i> Belum diverifikasi</div>"; 
											} else if($row['status'] == 1) {
												echo "<div class='text-success'><i class='fa fa-circle-check'></i> Telah diverifikasi</div>"; 
											} else if($row['status'] == 2) {
												echo "<div class='text-danger'><i class='fa fa-times-circle'></i> Verifikasi ditolak</div>"; 
											} ?>
										</td>
										<?php if ( $this->session->userdata('username') != NULL ) { ?>
											<?php if($row['status'] == 0) { ?>
												<td>
													<button type="button" class="btn btn-sm btn-primary verifperusahaan" 
														data-id="<?= $row['idp'] ?>"
														data-ket="<?= $row['namaperusahaan'] ?>">Verifikasi</button>
													<button type="button" class="btn btn-sm btn-danger tolakperusahaan" 
														data-id="<?= $row['idp'] ?>"
														data-ket="<?= $row['namaperusahaan'] ?>">Tolak</button>
												</td>
											<?php  } else {
												echo "<td><div class='text-danger'><i class='fa fa-times-circle'></i> Tidak tersedia</div></td>"; 
											} ?>
										<?php } ?>
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

<div class="modal fade" id="verifperusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post" action="<?= base_url() ?>perusahaan/verif">
		<div class="modal-body">
		<input type="hidden" class="form-control" name="idp" id="idp" value=""/>
		<div class="form-group">
			<label>Nama Perusahaan : </label>
			<input type="text" class="form-control" name="ket" id="ket" value="" readonly/>
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

<div class="modal fade" id="tolakperusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tolak Verifikasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post" action="<?= base_url() ?>perusahaan/tolak">
		<div class="modal-body">
		<input type="hidden" class="form-control" name="tolakidp" id="tolakidp" value=""/>
		<div class="form-group">
			<label>Nama Perusahaan : </label>
			<input type="text" class="form-control" name="tolakket" id="tolakket" value="" readonly/>
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