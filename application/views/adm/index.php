<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Dashboard
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
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-friends" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="7" cy="5" r="2"></circle>
                                                <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path>
                                                <circle cx="17" cy="5" r="2"></circle>
                                                <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?= $total ?> santri
                                        </div>
                                        <div class="text-muted">
                                            Total Santri Terdaftar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-man" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="5" r="2"></circle>
                                                <path d="M10 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?= $totalPa ?> santri
                                        </div>
                                        <div class="text-muted">
                                            Total Santri Putra Terdaftar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-red text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-woman" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="5" r="2"></circle>
                                                <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?= $totalPi ?> santri
                                        </div>
                                        <div class="text-muted">
                                            Total Santri Putri Terdaftar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2" style="background-color: yellow;">UPDATE PERTANGGAL</th>
                                        <th class="text-center" colspan="2" style="background-color: #021c1e; color: white;">RA</th>
                                        <th class="text-center" rowspan="2" style="background-color: #021c1e; color: white;">JML</th>
                                        <th class="text-center" colspan="2" style="background-color: #004445; color: white;">MI</th>
                                        <th class="text-center" rowspan="2" style="background-color: #004445; color: white;">JML</th>
                                        <th class="text-center" colspan="2" style="background-color: #2c7873; color: white;">MTs</th>
                                        <th class="text-center" rowspan="2" style="background-color: #2c7873; color: white;">JML</th>
                                        <th class="text-center" colspan="2" style="background-color: #6fb98f; color: white;">SMP</th>
                                        <th class="text-center" rowspan="2" style="background-color: #6fb98f; color: white;">JML</th>
                                        <th class="text-center" colspan="2" style="background-color: #2e4600; color: white;">MA</th>
                                        <th class="text-center" rowspan="2" style="background-color: #2e4600; color: white;">JML</th>
                                        <th class="text-center" colspan="2" style="background-color: #486b00; color: white;">SMK</th>
                                        <th class="text-center" rowspan="2" style="background-color: #486b00; color: white;">JML</th>
                                        <th class="text-center" colspan="3" style="background-color: yellow;">REKAP SANTRI BARU & LAMA</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" style="background-color: #021c1e; color: white;">PUTRA</th>
                                        <th class="text-center" style="background-color: #021c1e; color: white;">PUTRI</th>
                                        <th class="text-center" style="background-color: #004445; color: white;">PUTRA</th>
                                        <th class="text-center" style="background-color: #004445; color: white;">PUTRI</th>
                                        <th class="text-center" style="background-color: #2c7873; color: white;">PUTRA</th>
                                        <th class="text-center" style="background-color: #2c7873; color: white;">PUTRI</th>
                                        <th class="text-center" style="background-color: #6fb98f; color: white;">PUTRA</th>
                                        <th class="text-center" style="background-color: #6fb98f; color: white;">PUTRI</th>
                                        <th class="text-center" style="background-color: #2e4600; color: white;">PUTRA</th>
                                        <th class="text-center" style="background-color: #2e4600; color: white;">PUTRI</th>
                                        <th class="text-center" style="background-color: #486b00; color: white;">PUTRA</th>
                                        <th class="text-center" style="background-color: #486b00; color: white;">PUTRI</th>
                                        <th class="text-center" style="background-color: yellow; ">PUTRA</th>
                                        <th class="text-center" style="background-color: yellow; ">PUTRI</th>
                                        <th class="text-center" style="background-color: yellow; ">JML</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td><?= tanggalIndo(date('Y-m-d')) ?></td>
                                    <td><?= $RAPa ?></td>
                                    <td><?= $RAPi ?></td>
                                    <td style="background-color: #021c1e; color: white;"><?= $RAPa + $RAPi ?></td>
                                    <td><?= $MIPa ?></td>
                                    <td><?= $MIPi ?></td>
                                    <td style="background-color: #004445; color: white;"><?= $MIPa + $MIPi ?></td>
                                    <td><?= $MTsPa ?></td>
                                    <td><?= $MTsPi ?></td>
                                    <td style="background-color: #2c7873; color: white;"><?= $MTsPa + $MTsPi ?></td>
                                    <td><?= $SMPPa ?></td>
                                    <td><?= $SMPPi ?></td>
                                    <td style="background-color: #6fb98f; color: white;"><?= $SMPPa + $SMPPi ?></td>
                                    <td><?= $MAPa ?></td>
                                    <td><?= $MAPi ?></td>
                                    <td style="background-color: #2e4600; color: white;"><?= $MAPa + $MAPi ?></td>
                                    <td><?= $SMKPa ?></td>
                                    <td><?= $SMKPi ?></td>
                                    <td style="background-color: #486b00; color: white;"><?= $SMKPa + $SMKPi ?></td>
                                    <td><?= $totalPa ?></td>
                                    <td><?= $totalPi ?></td>
                                    <td><?= $total ?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Traffic summary</h3>
                        <div id="chart-mentions" class="chart-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>