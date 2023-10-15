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
                    Data Pengajuan
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
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
                        <h3 class="card-title"><a href="#" data-bs-toggle="modal" data-bs-target="#addBaruPengajuan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M9 12h6"></path>
                                    <path d="M12 9v6"></path>
                                </svg>
                                Buat Pengajuan</a></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>SPJ</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $ls_jns) :
                                        $kdpj = $ls_jns->kode_pengajuan;
                                        $spj = $this->db->query("SELECT * FROM spj WHERE kode_pengajuan = '$kdpj' ")->row();
                                        $sttsSpj = $spj ? $spj->stts : 0;
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ls_jns->kode_pengajuan; ?></td>
                                            <td><?= $ls_jns->tanggal; ?></td>
                                            <td><?= $ls_jns->tahun; ?></td>
                                            <td>
                                                <?php
                                                if ($ls_jns->status == 'proses') {
                                                    echo "<span class='badge bg-primary'><i class='bx bx-check'></i> Proses</span>";
                                                } elseif ($ls_jns->status == 'ditolak') {
                                                    echo "<span class='badge bg-danger'><i class='bx bx-x'></i> Ditolak</span>";
                                                } elseif ($ls_jns->status == 'disetujui') {
                                                    echo "<span class='badge bg-success'><i class='bx bx-check'></i> Disetujui</span>";
                                                } elseif ($ls_jns->status == 'dicairkan') {
                                                    echo "<span class='badge bg-success'><i class='bx bx-check'></i> Dicairkan</span>";
                                                } elseif ($ls_jns->status == 'selesai') {
                                                    echo "<span class='badge bg-info'><i class='bx bx-check'></i> Selesai</span>";
                                                } elseif ($ls_jns->status == 'belum') {
                                                    echo "<span class='badge bg-warning'>Input</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <!-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload SPJ</button> -->

                                                <?php if ($spj && $sttsSpj == 0) { ?>
                                                    <span class="badge bg-danger"><i class="bx bx-no-entry"></i> belum
                                                        upload</span>
                                                    | <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $ls_jns->id_pengajuan ?>"><i class="bx bx-upload"></i> Upload berkas SPJ</button>
                                                <?php } else if ($spj && $sttsSpj == 1) { ?>
                                                    <span class="badge bg-warning"><i class="bx bx-recycle"></i>
                                                        proses verifikasi</span>
                                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $ls_jns->id_pengajuan ?>"><i class="bx bx-upload"></i>
                                                        Upload ulang berkas SPJ</button>
                                                <?php } else if ($spj && $sttsSpj == 2) { ?>
                                                    <span class="badge bg-danger"><i class="bx bx-recycle"></i>
                                                        SPJ ditolak</span>
                                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $ls_jns->id_pengajuan ?>"><i class="bx bx-upload"></i>
                                                        Upload ulang berkas SPJ</button>
                                                <?php } elseif ($sttsSpj == 3) { ?>
                                                    <span class="badge bg-success"><i class="bx bx-check"></i> sudah
                                                        selesai</span>
                                                <?php } ?>

                                                <div class="modal fade" id="exampleModal<?= $ls_jns->id_pengajuan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Form Upload SPJ Sarpras</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <?= form_open_multipart('bidang/uploadSpj') ?>
                                                            <input type="hidden" name="kode" value="<?= $ls_jns->kode_pengajuan ?>">
                                                            <div class="modal-body">
                                                                <h6>Kode Pengajuan : <?= $ls_jns->kode_pengajuan ?></h6>
                                                                <div class="form-group">
                                                                    <label for="">Pilih File</label>
                                                                    <input type="file" name="file" class="form-control" required>
                                                                    <small style="color: red;">* File upload harus PDF dan Max File 5 MB</small>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Upload File</button>
                                                            </div>
                                                            <?= form_close() ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td><a href="<?= base_url('bidang/pengajuanDetail/' . $ls_jns->kode_pengajuan) ?>"><button class="btn btn-info btn-sm"><i class="bx bx-search"></i>cek</button></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
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
                <h5 class="modal-title" id="exampleModalLabel">Buat Pengajuan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('bidang/pengajuanpAdd'); ?>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-2 control-label">Bulan *</label>
                    <div class="col-sm-10">
                        <select name="bulan" class="form-control" required>
                            <option value=""> -- pilih bulan -- </option>
                            <?php
                            for ($i = 1; $i < count($bulan); $i++) { ?>
                                <option <?= date('m') == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= $bulan[$i] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="datepicker" name="tanggal">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tahun *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun" value="<?= $tahun ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Buat Pengajuan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>