<?php foreach ($lowongan as $row) : ?>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <h3>Lowongan Pekerjaan
                        <?php
                            if (date('d F Y') > date('d F Y', strtotime($row['bataswaktu']))) {
                                echo "<td><h3 class='text-danger'>&nbsp;(Lowongan sudah kadaluarsa)</h3></td>"; 
                            } else {
                                echo "<td><h3 class='text-success'>&nbsp;(Lowongan masih tersedia)</h3></td>"; 
                            }
                        ?>
                    </h3>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div>
                            <div class="text-left">
                                <a href="<?= base_url() ?>lowongan/detail/<?= $row['idl'] ?>" class="judul-berita" style="margin-top: -4px; font-size: 23pt">
                                    <?php
                                        $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                        echo $row['namajabatan'].", ".$data['prs']['namaperusahaan'];
                                    ?>
                                </a>
                                <br><i class="fa fa-clock-o"></i> 
                                    <?php
                                        $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                        echo $data['prs']['namaperusahaan'].", Diposting tanggal : ".$row['tglposting'];
                                    ?>
                                </div>
                        </div>
                        <img src="<?= base_url('dokumen/') . $row['dokumen']; ?>" alt="Brosur" class="img-thumbnail" width="100%">

                        <br>
                        <br>
                        <div class="text-justify">
                            <strong style="font-size: 14pt">Deskripsi Pekerjaan</strong> <hr>
                            <?= $row['uraiansingkat'] ?>
                            <hr>
                            <strong style="font-size: 14pt">Deskripsi Tanggung Jawab</strong> <hr>
                            <?= $row['uraiantugas'] ?>
                            <hr>
                            <strong style="font-size: 14pt">Detail</strong>
                            <table class="table table-hover">
                                <tr>
                                    <td width="40%">Perusahaan</td>
                                    <td>
                                        <?php
                                            $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                            echo $data['prs']['namaperusahaan'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat Perusahaan</td>
                                    <td>
                                        <?php
                                            $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                            echo $data['prs']['alamat'].
                                            "<br>Kelurahan ".$data['prs']['kelurahan'].
                                            "<br>Kecamatan ".$data['prs']['kecamatan'].
                                            "<br>Kabupaten ".$data['prs']['kabupaten'].
                                            "<br>Kabupaten ".$data['prs']['provinsi'].
                                            "<br>Kabupaten ".$data['prs']['kodepos'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>
                                        <?php
                                        $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                        echo $data['prs']['telp'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <?php
                                            $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                            echo $data['prs']['email'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Lapangan Usaha</td>
                                    <td>Information Technology</td>
                                </tr>
                                <tr>
                                    <td>Posisi</td>
                                    <td>Sales</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Formasi</td>
                                    <td>
                                        <?= $row['jumlahformasi'] ?>
                                        <table width="50%">
                                            <tr>
                                                <td>Pria</td>
                                                <td>:</td>
                                                <td><?= $row['laki'] ?> Orang</td>
                                            </tr>
                                            <tr>
                                                <td>Wanita</td>
                                                <td>:</td>
                                                <td><?= $row['perempuan'] ?> Orang</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Syarat dan Cara Melamar</td>
                                    <td>
                                        <?= $row['persyaratan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistem Upah</td>
                                    <td><?= $row['sistempengupahan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Gaji</td>
                                    <td>Rp.<?= number_format($row['gajiperbulan'],2,',','.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Status Hubungan Kerja</td>
                                    <td><?= $row['statushubungan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Jam Kerja</td>
                                    <td><?= $row['jumlahjamkerja'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jaminan Sosial</td>
                                    <td>
                                    <?php
                                            $data['lw'] = $this->db->get_where('jaminansosial', ['idl' => $row['idl']])->result_array();
                                            foreach ($data['lw'] as $rowj) {
                                                echo $rowj['jaminan']."<br>";
                                            }
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Batas Waktu Pendaftaran</td>
                                    <td><?= date('d F Y', strtotime($row['bataswaktu'])) ?></td>
                                </tr>
                                <tr>
                                    <td>Kontak Person</td>
                                    <td>
                                        <?= $row['namakontak']."(".$row['jabatankontak'].")" ?>
                                        <br><?= $row['nomorkontak'] ?><br>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>