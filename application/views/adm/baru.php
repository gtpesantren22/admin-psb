<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Data Santri
                </div>
                <h2 class="page-title">
                    Santri Baru
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
                        <h3 class="card-title">Data Santri Baru</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jenkel</th>
                                        <th>Gel</th>
                                        <th>No. HP</th>
                                        <th>Lembaga Tujuan</th>
                                        <th>Status</th>
                                        <td>#</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($baru as $row) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->nis; ?></td>
                                        <td><?= $row->nama; ?></td>
                                        <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                        <td><?= $row->jkl; ?></td>
                                        <td><?= $row->gel; ?></td>
                                        <td><?= $row->hp; ?></td>
                                        <td><?= $row->lembaga; ?></td>
                                        <td><?= $row->stts === 'Terverifikasi' ? "<span class='badge bg-green'>Terverifikasi</span>" : "<span class='badge bg-red'>Belum Terverifikasi</span>" ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-sm btn-success" role="group">
                                                <label for="btn-radio-dropdown-dropdown" class="btn dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-settings" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg> Settings
                                                </label>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="<?= base_url('santriAdm/edit/' . $row->nis); ?>">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="<?= base_url('santriAdm/send/' . $row->nis); ?>">Japri</a>
                                                    <a class="dropdown-item"
                                                        href="<?= base_url('santriAdm/sendGp/' . $row->nis); ?>">Group</a>
                                                    <a class="dropdown-item"
                                                        href="<?= base_url('santriAdm/sendAkun/' . $row->nis); ?>">Akun</a>
                                                </div>
                                            </div>
                                            <!-- <a class="btn btn-warning btn-sm"
                                                href="<?= base_url('santriAdm/edit/' . $row->nis); ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg> Edit
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url('santriAdm/send/' . $row->nis); ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-link" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                                    </path>
                                                    <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                                    </path>
                                                </svg> Japri
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="<?= base_url('santriAdm/sendGp/' . $row->nis); ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-link" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                                    </path>
                                                    <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                                    </path>
                                                </svg> Grup
                                            </a> -->
                                        </td>
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