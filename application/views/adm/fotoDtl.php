<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Foto Santri
                </div>
                <h2 class="page-title">
                    Foto Santri Baru
                </h2>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Foto Santri</h3>
                    </div>
                    <div class="card-body">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                            <div>
                                                <div><?= $data->nama ?></div>
                                                <div class="text-muted"><?= $data->nis ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="d-block"><img src="<?= base_url('../psb/assets/berkas/' . $data->diri) ?>" class="card-img-top"></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-9">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <?= form_open_multipart('image/editImg') ?>
                                        <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                        <input type="hidden" name="file_lama" value="<?= $data->diri ?>">
                                        <label for="" class="form-label required">Upload Ulang Foto (PNG/JPG)</label>
                                        <input type="file" name="berkas" class="form-control" required>
                                        <label for="" class="form-label "></label>
                                        <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                <polyline points="7 9 12 4 17 9"></polyline>
                                                <line x1="12" y1="4" x2="12" y2="16"></line>
                                            </svg> Simpan</button>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>