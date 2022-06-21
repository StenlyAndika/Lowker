<div class="col-lg-12">
    <div class="card">
    	<div class="card-header">
			<strong>PROFIL MEMBER</strong>
		</div>
    	<div class="card-body card-block">
    		<?php if ( $this->session->flashdata('flash') ) : ?>
	    		<div class="row mt-3">
	    			<div class="col-md-6">
	    				<div class="alert alert-success alert-dismissible fade show" role="alert">
	    					Data Member <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
	    					<button type="button" class="close" data-dismiss="alert" aria-label="close">
	    						<span aria-hidden="true">&times;</span>
	    					</button>
	    				</div>
	    			</div>
	    		</div>
    		<?php endif; ?>
			<form action="<?= base_url().'member/ubah/'.$member['idm'] ?>" method="post">
				<input type="hidden" class="form-control" name="idm" value="<?= $member['idm'] ?>">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" value="<?= $member['nama'] ?>">
					<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" value="<?= $member['email'] ?>">
					<small class="form-text text-danger"><?= form_error('email'); ?></small>
				</div>
				<div class="form-group">
					<label>Nomor HP</label>
					<input type="text" class="form-control" name="nohp" value="<?= $member['nohp'] ?>">
					<small class="form-text text-danger"><?= form_error('nohp'); ?></small>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" value="<?= $member['password'] ?>">
					<strong>Abaikan saja jika tidak ingin mengganti password.</strong>
				</div>
				<div class="form-group">
					<button type="submit" name="simpan" class="btn btn-sm btn-primary">Submit</button>
					<a class="btn btn-sm btn-success" href="<?= base_url() ?>">Kembali</a>
				</div>
			</form>
		</div>
    </div>
</div>