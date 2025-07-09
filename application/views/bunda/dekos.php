<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Dekosan Santri
                </div>
                <h2 class="page-title">
                    Dekosan Santri Baru
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
            <div class="col-9">
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
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Tgl Bayar</th>
                                        <th>Jam</th>
                                        <th>Nominal</th>
                                        <th>Tempat Kos</th>
                                        <th>Lembaga</th>
                                        <th>Penerima</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dekosan->result() as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nis; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= date('d-m-Y', strtotime($row->tgl)); ?></td>
                                            <td><?= date('H:i:s', strtotime($row->tgl)); ?></td>
                                            <td><?= rupiah($row->nominal); ?>
                                            </td>
                                            <td><?= $tmpKos[$row->t_kos]; ?></td>
                                            <td><?= $row->lembaga; ?></td>
                                            <td><?= $row->kasir  ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm edit-button" data-nis="<?= $row->nis ?>" data-nama="<?= $row->nama ?>" data-nominal="<?= $row->nominal ?>" data-t_kos="<?= $row->t_kos ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg> Edit</button>
                                                <a href="<?= base_url('dekos/del/' . $row->id_kos) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus ?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>Del</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Dekosan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table card-table table-vcenter table-sm">
                            <thead>
                                <tr>
                                    <th>Tempat</th>
                                    <th>Jml</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jmlDekos->result() as $rw) : ?>
                                    <tr>
                                        <td><?= $tmpKos[$rw->t_kos] ?></td>
                                        <td><?= $rw->jml ?></td>
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

<div class="modal modal-blur fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pembayaran Dekosan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <form action="<?= base_url('dekos/edit') ?>" method="post" id="edit-form">
                        <div class="form-group mb-2">
                            NIS :
                            <input type="text" name="nis" class="form-control" value="nis-id" id="nis-id" readonly>
                        </div>
                        <div class="form-group mb-2">
                            NAMA :
                            <input type="text" name="nama" class="form-control" value="nama-id" id="nama-id" readonly>
                        </div>
                        <div class="form-group mb-2">
                            NOMINAL :
                            <input type="text" name="nominal" class="form-control uang" value="nominal-id" id="nominal-id">
                        </div>
                        <div class="form-group mb-2">
                            Tempat Kos :
                            <input type="text" name="t_kos" class="form-control" value="t_kos-id" id="t_kos-id">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".edit-button").click(function() {
            var nis = $(this).data('nis');
            var nama = $(this).data('nama');
            var nominal = $(this).data('nominal');
            var t_kos = $(this).data('t_kos');

            // Mengisi nilai input dengan data yang akan diedit
            $("#nis-id").val(nis);
            $("#nama-id").val(nama);
            $("#nominal-id").val(nominal);
            $("#t_kos-id").val(t_kos);

            // Menampilkan modal
            $("#edit-modal").modal("show");
        });

        $("#edit-form").submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {

                    alert("Data Berhasil disimpan");
                    window.location = '<?= base_url('dekos') ?>';

                },
                error: function(xhr, status, error) {
                    alert("Data error disimpan");
                    window.location = '<?= base_url('dekos') ?>';
                }
            });
        });
    });
</script>