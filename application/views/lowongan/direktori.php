<!-- MIDDLE CONTENT -->
<section id="team" class="team">
    <div class="container">
        <div class="section-title">
            <h2>Lowongan Pekerjaan</h2>
        </div>
        <div class="row">
            <?php foreach ($lowongan as $row) : ?>
            <div class="card mt-4 ml-4">
                <?php if (date('d F Y') > date('d F Y', strtotime($row['bataswaktu']))) : ?>
                    <span style="--my-color-var : #F55353; --my-content-var : 'kadaluarsa'"></span>
                <?php else : ?>
                    <span style="--my-color-var : #3A5BA0; --my-content-var : 'tersedia'"></span>
                <?php endif; ?>
                <div class="top">
                    <div class="userDetails">
                        <h3>
                            <br>
                            <?php
                                $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                echo "<strong>".$data['prs']['namaperusahaan']."</strong>";
                            ?>
                        </h3>
                        <h4>
                            <a href="<?= base_url() ?>lowongan/detail/<?= $row['idl'] ?>" style="font-size: 18pt">
                            <?php
                                $data['prs'] = $this->db->get_where('perusahaan', ['idp' => $row['idp']])->row_array();
                                echo "<strong style='color: red'>".$row['namajabatan']."</strong>";
                            ?>
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="imgBx">
                    <img src="<?= base_url('dokumen/') . $row['dokumen']; ?>" alt="Brosur" class="img-thumbnail">
                </div>
                <p><?= $row['uraiansingkat'] ?></p>
                <br>
                <br>
                Batas Waktu Pendaftaran : 
                <?php
                    echo "<strong>".date('d F Y', strtotime($row['bataswaktu']))."</strong>";
                ?>
                
                <button type="button" class="detaillowongan btn btn-primary" data-id="<?= $row['idl'] ?>">Lihat Selengkapnya</button>

            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" >

</div>