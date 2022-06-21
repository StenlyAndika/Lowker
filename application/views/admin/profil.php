<div class="col-lg-12">
    <div class="card">
    	<div class="card-header">
			<strong>PROFIL ADMIN</strong>
		</div>
    	<div class="card-body card-block">
    		<?php if ( $this->session->flashdata('flash') ) : ?>
	    		<div class="row mt-3">
	    			<div class="col-md-6">
	    				<div class="alert alert-success alert-dismissible fade show" role="alert">
	    					Data Admin <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
	    					<button type="button" class="close" data-dismiss="alert" aria-label="close">
	    						<span aria-hidden="true">&times;</span>
	    					</button>
	    				</div>
	    			</div>
	    		</div>
    		<?php endif; ?>
			<form action="<?= base_url().'admin/ubah/'.$admin['username'] ?>" method="post">
				<input type="hidden" class="form-control" name="username" value="<?= $admin['username'] ?>">
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="pass" value="<?= $admin['pass'] ?>">
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