<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>LOWONGAN</strong>
					</div>
					<div class="card-header2">
						<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">Perhatian !</h4>
						<p>Pastikan data yang lowongan benar. Jika lowongan sudah diverifikasi / valid, Anda tidak bisa merubah data Perusahaan. Perubahan hanya dapat dilakukan oleh Admin Website Bursa Kerja.</p>
					</div>
					</div>
					<div class="card-body card-block">
						<?= form_open_multipart('lowongan/tambah'); ?>
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<select name="idp" class="form-control">
								<?php foreach ($perusahaan as $datap) : ?>
									<option value="<?= $datap['idp']; ?>"><?= $datap['namaperusahaan']; ?></option>
								<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('idp'); ?></small>
							</div>
							<div class="form-group">
								<label>Nama Jabatan/Pekerjaan</label>
								<input type="text" class="form-control" name="namajabatan" value="<?= set_value('namajabatan'); ?>">
								<small class="form-text text-danger"><?= form_error('namajabatan'); ?></small>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-2">
										<label>Jumlah Formasi</label>
										<input type="text" class="form-control" name="jumlahformasi" value="<?= set_value('jumlahformasi'); ?>" maxlength="5">
										<small class="form-text text-danger"><?= form_error('jumlahformasi'); ?></small>
									</div>
									<div class="col-sm-2">
										<label>Laki-Laki</label>
										<input type="text" class="form-control" name="laki" value="<?= set_value('laki'); ?>" maxlength="5">
										<small class="form-text text-danger"><?= form_error('laki'); ?></small>
									</div>
									<div class="col-sm-2">
										<label>Perempuan</label>
										<input type="text" class="form-control" name="perempuan" value="<?= set_value('perempuan'); ?>" maxlength="5">
										<small class="form-text text-danger"><?= form_error('perempuan'); ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Pendidikan Minimal</label>
								<input type="text" class="form-control" name="pendidikanminimal" value="<?= set_value('pendidikanminimal'); ?>">
								<small class="form-text text-danger"><?= form_error('pendidikanminimal'); ?></small>
							</div>
							<div class="form-group">
								<label>Persyaratan dan Cara Melamar</label>
								<textarea class="form-control" name="persyaratan" id="persyaratan" rows="8" cols="80">
									<?= set_value('persyaratan'); ?>
								</textarea>
								<small class="form-text text-danger"><?= form_error('persyaratan'); ?></small>
							</div>
							<div class="form-group">
								<label>Sistem Pengupahan</label>
								<select name="sistempengupahan" class="form-control">
								<?php foreach ($spengupahan as $dataupah) : ?>
									<option value="<?= $dataupah; ?>"><?= $dataupah; ?></option>
								<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('sistempengupahan'); ?></small>
							</div>
							<div class="form-group">
								<label>Gaji/Upah sebulan</label>
								<input type="text" class="form-control" name="gajiperbulan" value="<?= set_value('gajiperbulan'); ?>">
								<small class="form-text text-danger"><?= form_error('gajiperbulan'); ?></small>
							</div>
							<div class="form-group">
								<label>Status Hubungan Kerja</label>
								<select name="statushubungan" class="form-control">
								<?php foreach ($statushubkerja as $datastatus) : ?>
									<option value="<?= $datastatus; ?>"><?= $datastatus; ?></option>
								<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('statushubungan'); ?></small>
							</div>
							<div class="form-group">
								<label>Jumlah Jam Kerja dalam Seminggu</label>
								<input type="text" class="form-control" name="jumlahjamkerja" value="<?= set_value('jumlahjamkerja'); ?>">
								<small class="form-text text-danger"><?= form_error('jumlahjamkerja'); ?></small>
							</div>
							<div class="form-group" bis_skin_checked="1">
								<label>Jaminan Sosial lainnya</label>
								<select multiple class="form-control" id="jmss" name="jaminansosial[]">
									<option value="Makan">Makan</option>
									<option value="Lembur">Lembur</option>
									<option value="Pakaian Kerja">Pakaian Kerja</option>
									<option value="Transport">Transport</option>
									<option value="Waktu Istirahat">Waktu Istirahat</option>
									<option value="Kecelakaan">Kecelakaan</option>
									<option value="Kesehatan">Kesehatan</option>
									<option value="Cuti">Cuti</option>
									<option value="Hari Raya">Hari Raya</option>
									<option value="Premi/Bonus">Premi/Bonus</option>
									<option value="Hari Tua">Hari Tua</option>
									<option value="Perumahan">Perumahan</option>
									<option value="Lainnya">Lainnya</option>
								</select>
							</div>
							<div class="form-group">
								<label>Uraian Singkat Pekerjaan</label>
								<textarea class="form-control" name="uraiansingkat" id="uraiansingkat" rows="8" cols="80">
									<?= set_value('uraiansingkat'); ?>
								</textarea>
								<small class="form-text text-danger"><?= form_error('uraiansingkat'); ?></small>
							</div>
							<div class="form-group">
								<label>Uraian Tugas</label>
								<textarea class="form-control" name="uraiantugas" id="uraiantugas" rows="8" cols="80">
									<?= set_value('uraiantugas'); ?>
								</textarea>
								<small class="form-text text-danger"><?= form_error('uraiantugas'); ?></small>
							</div>
							<div class="form-group">
								<label>Batas Waktu</label>
								<input type="text" id="tgl" class="form-control" name="bataswaktu" value="<?= set_value('bataswaktu'); ?>">
								<small class="form-text text-danger"><?= form_error('bataswaktu'); ?></small>
							</div>
							<div class="form-group">
								<label>Nama Kontak Person</label>
								<input type="text" class="form-control" name="namakontak" value="<?= set_value('namakontak'); ?>">
								<small class="form-text text-danger"><?= form_error('namakontak'); ?></small>
							</div>
							<div class="form-group">
								<label>Nomor Kontak Person</label>
								<input type="text" class="form-control" name="nomorkontak" value="<?= set_value('nomorkontak'); ?>">
								<small class="form-text text-danger"><?= form_error('nomorkontak'); ?></small>
							</div>
							<div class="form-group">
								<label>Jabatan Kontak Person</label>
								<input type="text" class="form-control" name="jabatankontak" value="<?= set_value('jabatankontak'); ?>">
								<small class="form-text text-danger"><?= form_error('jabatankontak'); ?></small>
							</div>
							<div class="form-group">
								<label>Upload Brosur/Gambar</label>
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