<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Informasi
                </div>
                <h2 class="page-title">
                    Informasi Pendafataran Santri Baru
                </h2>
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
                        <h3 class="card-title">Edit Data Informasi</h3>
                    </div>
                    <div class="card-body">
                        <?= form_open('info/editAct') ?>
                        <input type="hidden" name="id" value="<?= $data->id_info ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Upload</label>
                                <input type="text" class="form-control" placeholder="Tanggal Upload Informasi" id="datepicker" name="tanggal" value="<?= $data->tanggal ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi Informasi</label>
                                <textarea id="" class="texteditor" name="isi" required><?= $data->isi ?></textarea>
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
        </div>
    </div>
</div>