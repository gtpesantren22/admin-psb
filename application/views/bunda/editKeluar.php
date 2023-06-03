<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Transaksi PSB
                </div>
                <h2 class="page-title">
                    Biaya Pengeluaran PSB 2023
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                </div>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <?= form_open('trans/updaetKeluar') ?>
                        <input type="hidden" name="id" value="<?= $data->id_keluar ?>">
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label class="form-label required">Tanggal</label>
                                <div>
                                    <input type="text" name="tanggal" class="form-control" id="datepicker" placeholder="Tanggal Pengeluaran" value="<?= $data->tanggal ?>" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label required">Nominal</label>
                                <div>
                                    <input type="text" name="nominal" class="form-control uang" id="" placeholder="Nominal Pengeluaran" value="<?= $data->nominal ?>" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label required">Keterangan</label>
                                <div>
                                    <textarea name="ket" class="form-control" id="" placeholder="Keterangan" required><?= $data->ket ?></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label required">Sumber</label>
                                <div>
                                    <select name="sumber" id="" class="form-control" required>
                                        <option value=""> -pilih- </option>
                                        <option value="daftar" <?= $data->sumber === 'daftar' ? 'selected' : '' ?>>Pendaftaran</option>
                                        <option value="regist" <?= $data->sumber === 'regist' ? 'selected' : '' ?>>Registrasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label required">Divisi</label>
                                <div>
                                    <select name="divisi" id="" class="form-control" required>
                                        <option value=""> -pilih- </option>
                                        <option value="KESEKRETARIATAN" <?= $data->divisi === 'KESEKRETARIATAN' ? 'selected' : '' ?>>KESEKRETARIATAN</option>
                                        <option value="BENDAHARA" <?= $data->divisi === 'BENDAHARA' ? 'selected' : '' ?>>BENDAHARA</option>
                                        <option value="PUBLIKASI" <?= $data->divisi === 'PUBLIKASI' ? 'selected' : '' ?>>PUBLIKASI</option>
                                        <option value="PENDAFTARAN" <?= $data->divisi === 'PENDAFTARAN' ? 'selected' : '' ?>>PENDAFTARAN</option>
                                        <option value="MOSBA" <?= $data->divisi === 'MOSBA' ? 'selected' : '' ?>>MOSBA</option>
                                        <option value="IT & DATA" <?= $data->divisi === 'IT & DATA' ? 'selected' : '' ?>>IT & DATA</option>
                                        <option value="TURBA" <?= $data->divisi === 'TURBA' ? 'selected' : '' ?>>TURBA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label required">PJ</label>
                                <div>
                                    <input type="text" name="pj" class="form-control" value="<?= $user->nama ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>