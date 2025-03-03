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

            <div class="col-auto ms-auto d-print-none">
                <?php if ($data->status == 'proses') : ?>
                    <div class="btn-list">
                        <a href="<?= base_url('pengajuan/verval/' . $data->kode_pengajuan) ?>" class="btn btn-success d-none d-sm-inline-block tbl-confirm" value="Pengajuan akan diverifikasi/disetujui">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                                <path d="M14 19l2 2l4 -4"></path>
                                <path d="M9 8h4"></path>
                                <path d="M9 12h2"></path>
                            </svg>
                            Verval
                        </a>
                        <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addBaruPengajuan">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-alert" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M12 17l.01 0"></path>
                                <path d="M12 11l0 3"></path>
                            </svg>
                            Tolak
                        </a>
                        <a href="<?= base_url('pengajuan/cetak/' . $data->kode_pengajuan) ?>" target="_blank" class="btn btn-info d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Cetak
                        </a>
                    </div>
                <?php endif ?>
                <?php if ($data->status == 'disetujui') : ?>
                    <div class="btn-list">
                        <a href="#" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#cairkan">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                                <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                            </svg>
                            Cairkan Pengajuan
                        </a>
                        <a href="<?= base_url('pengajuan/cetak/' . $data->kode_pengajuan) ?>" target="_blank" class="btn btn-info d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Cetak
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
                        <h3 class="card-title">Data Pengajuan Saya</h3>
                    </div>
                    <div class="card-body">
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
                                        <th>Cair</th>
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
                                            <td><?= $ls_jns->cair ?></td>
                                            <td>
                                                <?php if ($data->status == 'proses') { ?>
                                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $ls_jns->id_detail ?>">Edit</button>
                                                    <div class="modal fade" id="edit<?= $ls_jns->id_detail ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Item Pengajuan</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <?= form_open('pengajuan/editItem'); ?>
                                                                <input type="hidden" name="id" value="<?= $ls_jns->id_detail ?>">
                                                                <input type="hidden" name="kode" value="<?= $ls_jns->kode_pengajuan ?>">
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-1">
                                                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Item</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" value="<?= $ls_jns->uraian ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label for="inputEmail3" class="col-sm-3 control-label">QTY</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" name="qty" class="form-control" value="<?= $ls_jns->qty ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label for="inputEmail3" class="col-sm-3 control-label">Nominal</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="harga_satuan" class="form-control uang" value="<?= $ls_jns->harga_satuan ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label for="inputEmail3" class="col-sm-3 control-label">Jenis Cair</label>
                                                                        <div class="col-sm-9">
                                                                            <label class="form-check">
                                                                                <input class="form-check-input" type="radio" name="cair" value="Cair Tunai" <?= $ls_jns->cair == 'Cair Tunai' ? 'checked' : '' ?> />
                                                                                <span class="form-check-label">Cair Tunai</span>
                                                                            </label>
                                                                            <label for="">Non Tunai</label>
                                                                            <ul>
                                                                                <li>
                                                                                    <label class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="cair" value="Unit Usaha" <?= $ls_jns->cair == 'Unit Usaha' ? 'checked' : '' ?> />
                                                                                        <span class="form-check-label">Unit Usaha</span>
                                                                                    </label>
                                                                                </li>
                                                                                <li>
                                                                                    <label class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="cair" value="MDP" <?= $ls_jns->cair == 'MDP' ? 'checked' : '' ?> />
                                                                                        <span class="form-check-label">MDP</span>
                                                                                    </label>
                                                                                </li>
                                                                                <li>
                                                                                    <label class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="cair" value="Kopontren" <?= $ls_jns->cair == 'Kopontren' ? 'checked' : '' ?> />
                                                                                        <span class="form-check-label">Kopontren</span>
                                                                                    </label>
                                                                                </li>
                                                                                <li>
                                                                                    <label class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="cair" value="HSP" <?= $ls_jns->cair == 'HSP' ? 'checked' : '' ?> />
                                                                                        <span class="form-check-label">HSP</span>
                                                                                    </label>
                                                                                </li>
                                                                                <li>
                                                                                    <label class="form-check">
                                                                                        <input class="form-check-input" type="radio" name="cair" value="NF Printing" <?= $ls_jns->cair == 'NF Printing' ? 'checked' : '' ?> />
                                                                                        <span class="form-check-label">NF Printing</span>
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                                                </div>
                                                                <?= form_close(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">TOTAL</th>
                                        <th colspan="3"><?= rupiah($dataSum->jml) ?></th>
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

<div class="modal fade" id="addBaruPengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('pengajuan/pengajuanTolak'); ?>
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
                <button type="submit" class="btn btn-danger">Tolak Pengajuan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="cairkan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pencairan Pengajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('pengajuan/cairkan'); ?>
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
                    <label for="inputEmail3" class="col-sm-3 control-label">Penerima</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="penerima" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan Pengajuan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>