<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Berkas Pendaftaran
                </div>
                <h2 class="page-title">
                    Berkas Pendaftaran Santri
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
                        <h3 class="card-title">Detail Berkas # <?= $data->nis . ' - ' . $data->nama ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label required">Kartu Keluarga (KK)</label>
                                            <?php if ($data->kk != '') { ?>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#kk"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-file-upload" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path
                                                        d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                    </path>
                                                    <path d="M12 11v6"></path>
                                                    <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                                                </svg> Upload Ulang
                                            </button>
                                            <a href="<?= base_url('berkas/downKK/' . $data->nis) ?>"
                                                class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-file-download" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path
                                                        d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                    </path>
                                                    <path d="M12 17v-6"></path>
                                                    <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                                                </svg> Download
                                            </a>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#viewkk"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-file-search" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5">
                                                    </path>
                                                    <circle cx="16.5" cy="17.5" r="2.5"></circle>
                                                    <line x1="18.5" y1="19.5" x2="21" y2="22"></line>
                                                </svg> Lihat
                                            </button>
                                            <br>
                                            <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                            <div class="badge bg-danger">Belum Upload</div>
                                            <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-file-upload" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path
                                                        d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                    </path>
                                                    <path d="M12 11v6"></path>
                                                    <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                                                </svg> Upload Berkas</button><br>
                                            <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
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
</div>

<div class="modal modal-blur fade" id="kk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload KK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadKK') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->kk; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewkk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat KK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->kk) ?>" width="100%" height="500"
                    style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>