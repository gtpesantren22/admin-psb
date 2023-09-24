<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Pengajuan
                </div>
                <h2 class="page-title">
                    Cek SPJ
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <?php if ($data->stts == '1') : ?>
                    <div class="btn-list">
                        <a href="<?= base_url('pengajuan/vervalSpj/' . $data->kode_pengajuan) ?>" class="btn btn-success d-none d-sm-inline-block tbl-confirm" value="SPJ akan diverifikasi/disetujui">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                                <path d="M14 19l2 2l4 -4"></path>
                                <path d="M9 8h4"></path>
                                <path d="M9 12h2"></path>
                            </svg>
                            Verval SPJ
                        </a>
                        <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addBaruPengajuan">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-alert" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M12 17l.01 0"></path>
                                <path d="M12 11l0 3"></path>
                            </svg>
                            Tolak SPJ
                        </a>
                    </div>
                <?php endif ?>
            </div>
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
                        <h3 class="card-title">Cek SPJ Pengajuan</h3>
                    </div>
                    <div class="card-body">
                        <iframe src="<?= base_url('demo/uploads/' . $data->file_spj) ?>" style="width: 100%; height: 700px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addBaruPengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak SPJ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('pengajuan/tolakSpj'); ?>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-3 control-label">Kode Pengajuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="kode_pengajuan" value="<?= $data->kode_pengajuan ?>" readonly>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-3 control-label">Bidang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $pj->nama ?>" readonly>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nominal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= rupiah($dataSum->jml) ?>" readonly>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-3 control-label">Catatan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="catatan" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Tolak SPJ</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>