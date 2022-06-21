<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>PERUSAHAAN</strong>
					</div>
					<div class="card-header2">
						<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">Perhatian !</h4>
						<p>Pastikan data yang perusahaan benar. Jika perusahaan sudah diverifikasi / valid, Anda tidak bisa merubah data Perusahaan. Perubahan hanya dapat dilakukan oleh Admin Website Bursa Kerja.</p>
					</div>
					</div>
					<div class="card-body card-block">
						<?= form_open_multipart('perusahaan/tambah'); ?>
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input type="text" class="form-control" name="namaperusahaan" required="true" value="<?= set_value('namaperusahaan'); ?>">
								<small class="form-text text-danger"><?= form_error('namaperusahaan'); ?></small>
							</div>
							<div class="form-group">
								<label>Nama Pemilik</label>
								<input type="hidden" class="form-control" name="idm" value="<?= $member['idm'] ?>">
								<input type="text" class="form-control" value="<?= $member['nama'] ?>" readOnly>
								<small class="form-text text-danger"><?= form_error('namapemilik'); ?></small>
							</div>
							<div class="form-group">
								<label>NPWP Perusahaan</label>
								<input type="text" class="form-control" name="npwp" value="<?= set_value('npwp'); ?>">
								<small class="form-text text-danger"><?= form_error('npwp'); ?></small>
							</div>
							<div class="form-group">
								<label>Lapangan Usaha</label>
								<input type="text" class="form-control" name="lapangan" value="<?= set_value('lapangan'); ?>">
								<small class="form-text text-danger"><?= form_error('lapangan'); ?></small>
							</div>
							<div class="form-group">
								<label>Alamat Perusahaan</label>
								<textarea name="alamat" id="alamat" class="form-control" rows="8" cols="80"><?= set_value('alamat'); ?></textarea>
								<small class="form-text text-danger"><?= form_error('alamat'); ?></small>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-2">
										<label>RT</label>
										<input type="text" class="form-control" name="rt" value="<?= set_value('rt'); ?>" maxlength="5">
										<small class="form-text text-danger"><?= form_error('rt'); ?></small>
									</div>
									<div class="col-sm-2">
										<label>RW</label>
										<input type="text" class="form-control" name="rw" value="<?= set_value('rw'); ?>" maxlength="5">
										<small class="form-text text-danger"><?= form_error('rw'); ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Kelurahan</label>
								<input type="text" class="form-control" name="kelurahan" value="<?= set_value('kelurahan'); ?>">
								<small class="form-text text-danger"><?= form_error('kelurahan'); ?></small>
							</div>
							<div class="form-group">
								<label>Kecamatan</label>
								<input type="text" class="form-control" name="kecamatan" value="<?= set_value('kecamatan'); ?>">
								<small class="form-text text-danger"><?= form_error('kecamatan'); ?></small>
							</div>
							<div class="form-group">
								<label>Kabupaten</label>
								<input type="text" class="form-control" name="kabupaten" value="<?= set_value('kabupaten'); ?>">
								<small class="form-text text-danger"><?= form_error('kabupaten'); ?></small>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<input type="text" class="form-control" name="provinsi" value="<?= set_value('provinsi'); ?>">
								<small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
							</div>
							<div class="form-group">
								<label>Kode Pos</label>
								<input type="text" class="form-control" name="kodepos" value="<?= set_value('kodepos'); ?>">
								<small class="form-text text-danger"><?= form_error('kodepos'); ?></small>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-3">
										<label>Telepon</label>
										<input type="text" class="form-control" name="telp" value="<?= set_value('telp'); ?>" maxlength="15">
										<small class="form-text text-danger"><?= form_error('telp'); ?></small>
									</div>
									<div class="col-sm-7">
										<label>Email</label>
										<input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
										<small class="form-text text-danger"><?= form_error('email'); ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Dokumen Pendukung Perusahaan</label>
								<input class="form-control" type="file" name="dokumen">Ukuran File Max. 2MB
                            </div>
							<div class="form-group">
								<button type="submit" name="simpan" class="btn btn-sm btn-primary">Submit</button>
								<a class="btn btn-sm btn-success" href="<?= base_url() ?>perusahaan">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>