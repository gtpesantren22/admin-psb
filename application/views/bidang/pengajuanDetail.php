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
                    Data Detail Pengajuan
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
                        <h3 class="card-title">Data Pengajuan Saya</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($data->status == 'belum' || $data->status == 'ditolak') { ?>
                            <?= form_open('bidang/pjAddInput'); ?>
                            <input type="hidden" name="bidang" value="<?= $data->bidang ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Kode Pengajuan *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="kode_pengajuan" value="<?= $data->kode_pengajuan ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Uraian *</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="uraian" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Tahun *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tahun" value="<?= $tahun ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="inputEmail3" class="col-sm-3 control-label">QTY *</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="qty" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Satuan *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="satuan" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Harga Satuan *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control uang" id="" name="harga_satuan" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Pengajuan</button>
                                    </div>
                                </div>

                            </div>

                            <?= form_close(); ?>
                        <?php } ?>
                        <hr>
                        <?php if ($data->status == 'belum' || $data->status == 'ditolak') { ?>
                            <a href="<?= base_url('bidang/ajukan/' . $data->kode_pengajuan) ?>" class="btn btn-sm btn-warning tbl-confirm mb-2" value="Pengajuan akan di lanjutkan kepada bendahara"><i class="bx bx-upload"></i>Ajukan ke Bendahara PSB</a>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="example">
                                <thead>
                                    <tr style="color: white; background-color: #17A2B8; font-weight: bold;">
                                        <th>No</th>
                                        <th>Bidang</th>
                                        <th>Uraian</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail as $ls_jns) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ls_jns->nama; ?></td>
                                            <td><?= $ls_jns->uraian; ?></td>
                                            <td><?= $ls_jns->qty . ' ' . $ls_jns->satuan; ?></td>
                                            <td><?= rupiah($ls_jns->harga_satuan); ?></td>
                                            <td><?= rupiah($ls_jns->qty * $ls_jns->harga_satuan); ?></td>
                                            <td>
                                                <?php if ($data->status == 'belum' || $data->status == 'ditolak') { ?>
                                                    <a href="<?= base_url('bidang/delItemSarpras/' . $ls_jns->id_detail . '/' . $ls_jns->kode_pengajuan) ?>" class="btn btn-danger btn-sm tbl-confirm" value="Yakin akan menghapus item ini"><i class="bx bx-trash"></i> Del</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">TOTAL</th>
                                        <th colspan="2"><?= rupiah($dataSum->jml) ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>