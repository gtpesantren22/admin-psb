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
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-large">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Tambah Pengeluaran Baru
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
        <div class="row row-deck row-cards">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-sm" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Ket</th>
                                        <th>Nominal</th>
                                        <th>Divisi</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $dts = $this->db->query("SELECT * FROM keluar ORDER BY tanggal DESC")->result();
                                    $ttl = $this->db->query("SELECT SUM(nominal) as ttl FROM keluar")->row();
                                    foreach ($dts as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= date('d/m/Y', strtotime($row->tanggal)); ?></td>
                                            <td><?= $row->ket; ?></td>
                                            <td><?= rupiah($row->nominal); ?></td>
                                            <td><?= $row->divisi; ?></td>
                                            <td>
                                                <a href="<?= base_url('trans/delKeluar/') . $row->id_keluar ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus ?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg> Del
                                                </a>
                                                <a href="<?= base_url('trans/editKeluar/') . $row->id_keluar ?>" class="btn btn-warning btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                        <path d="M13.5 6.5l4 4"></path>
                                                    </svg> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">TOTAL</th>
                                        <th colspan="4"><?= rupiah($ttl->ttl) ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rekap Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="">
                                <tr>
                                    <th></th>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                    <th>Saldo</th>
                                </tr>
                                <tr>
                                    <td>Pendaftaran</td>
                                    <td><?= rupiah($bp->nominal) ?></td>
                                    <td><?= rupiah($bpPakai->nominal) ?></td>
                                    <td><?= rupiah($bp->nominal - $bpPakai->nominal) ?></td>
                                </tr>
                                <tr>
                                    <td>Registrasi</td>
                                    <td><?= rupiah($regist->nominal) ?></td>
                                    <td><?= rupiah($registPakai->nominal) ?></td>
                                    <td><?= rupiah($regist->nominal - $registPakai->nominal) ?></td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <th><?= rupiah($regist->nominal + $bp->nominal) ?></th>
                                    <th><?= rupiah($registPakai->nominal + $bpPakai->nominal) ?></th>
                                    <th><?= rupiah(($regist->nominal - $registPakai->nominal) + ($bp->nominal - $bpPakai->nominal)) ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembayaran Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('trans/addKeluar') ?>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label class="form-label required">Tanggal</label>
                    <div>
                        <input type="text" name="tanggal" class="form-control" id="datepicker" placeholder="Tanggal Pengeluaran" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label required">Nominal</label>
                    <div>
                        <input type="text" name="nominal" class="form-control uang" id="" placeholder="Nominal Pengeluaran" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label required">Keterangan</label>
                    <div>
                        <textarea name="ket" class="form-control" id="" placeholder="Keterangan" required></textarea>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label required">Sumber</label>
                    <div>
                        <select name="sumber" id="" class="form-control" required>
                            <option value=""> -pilih- </option>
                            <option value="daftar">Pendaftaran</option>
                            <option value="regist">Registrasi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label required">Divisi</label>
                    <div>
                        <select name="divisi" id="" class="form-control" required>
                            <option value=""> -pilih- </option>
                            <option value="KESEKRETARIATAN">KESEKRETARIATAN</option>
                            <option value="BENDAHARA">BENDAHARA</option>
                            <option value="PUBLIKASI">PUBLIKASI</option>
                            <option value="PENDAFTARAN">PENDAFTARAN</option>
                            <option value="MOSBA">MOSBA</option>
                            <option value="IT & DATA">IT & DATA</option>
                            <option value="TURBA">TURBA</option>
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