<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Kamar Santri
                </div>
                <h2 class="page-title">
                    Kamar Santri Baru
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-large">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Buat Informasi Baru
                    </a>
                </div>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-12">
                <div class="row row-cards">
                    <?php foreach ($komplek as $komplek) : ?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Komplek <?= $komplek->komplek ?></h3>

                                </div>
                                <div class="card-body">
                                    <?php
                                    $bonang = $this->db->query("SELECT * FROM lemari_data WHERE komplek = '$komplek->komplek' GROUP BY kamar ")->result();
                                    foreach ($bonang as $dtbo) : ?>
                                        <div class="row g-3">
                                            <button class="btn btn-outline-primary btn-pill btn-sm">Kamar <?= $dtbo->kamar ?></button>
                                            <?php
                                            $kmrbonang = $this->db->query("SELECT * FROM lemari_data WHERE komplek = '$dtbo->komplek' AND kamar = '$dtbo->kamar' GROUP BY lemari ")->result();
                                            foreach ($kmrbonang as $lmrbon) :
                                            ?>
                                                <div class="col-6">
                                                    <h4>Lemari <?= $lmrbon->lemari ?></h4>
                                                    <div class="row g-3">
                                                        <?php
                                                        $lokerbonang = $this->db->query("SELECT * FROM lemari_data WHERE komplek = '$dtbo->komplek' AND kamar = '$dtbo->kamar' AND lemari = '$lmrbon->lemari' ")->result();
                                                        foreach ($lokerbonang as $loker) :
                                                            $nis = $loker->nis == '' ? '00000' : $loker->nis;
                                                            $ident = $this->db->query("SELECT nis,nama FROM tb_santri WHERE nis = $nis ")->row();
                                                            $foto = $this->db->query("SELECT diri FROM foto_file WHERE nis = $nis ")->row();
                                                            $nama = $ident ? $ident->nama : 'Belum Ada';
                                                            $bg = $ident ? 'green' : 'red';
                                                            $img = $foto ? $foto->diri : '';
                                                        ?>
                                                            <div class="col-6">
                                                                <div class="row g-3 align-items-center">
                                                                    <a href="<?= base_url('kamar/detail/' . $loker->id) ?>" class="col-auto">
                                                                        <span class="avatar" style="background-image: url(<?= 'https://psb.ppdwk.com/assets/berkas/' . $img ?>)">
                                                                            <span class="badge bg-<?= $bg ?>"></span></span>
                                                                    </a>
                                                                    <div class="col text-truncate">
                                                                        <a href="<?= base_url('kamar/detail/' . $loker->id) ?>" class="text-reset d-block text-truncate"><?= $nama ?></a>
                                                                        <div class="text-muted text-truncate mt-n1"><?= $loker->lemari . '  Loker : ' . $loker->loker ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <hr>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Sunan Gunung Jati -->

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Informasi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('info/add') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" maxlength="50" class="form-control" placeholder="Judul Informasi" id="" name="judul" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Upload</label>
                    <input type="text" class="form-control" placeholder="Tanggal Upload Informasi" id="datepicker" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi Informasi</label>
                    <textarea id="" class="texteditor" name="isi" required></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>