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
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Pemasukan Pendaftaran</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3"><?= rupiah($bpSum->nominal) ?></div>
                        <div class="d-flex mb-2">
                            <div>Sudah Bayar</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <?= $bpCount != 0 && $santriCount != 0 ? round(($bpCount / $santriCount) * 100, 2) : 0 ?>%
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="3 17 9 11 13 15 21 7" />
                                        <polyline points="14 7 21 7 21 14" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: <?= $bpCount != 0 && $santriCount != 0 ? ($bpCount / $santriCount) * 100 : 0 ?>%" role="progressbar" aria-valuenow="<?= $bpCount != 0 && $santriCount != 0 ? ($bpCount / $santriCount) * 100 : 0 ?>" aria-valuemin="0" aria-valuemax="100" aria-label="<?= $bpCount != 0 && $santriCount != 0 ? ($bpCount / $santriCount) * 100 : 0 ?>% Complete">
                                <span class="visually-hidden"><?= $bpCount != 0 && $santriCount != 0 ? ($bpCount / $santriCount) * 100 : 0 ?>% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Pemasukan Registrasi Ulang</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3"><?= rupiah($registSum->nominal) ?></div>
                        <div class="d-flex mb-2">
                            <div>Sudah Bayar</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <?= $registCount != 0 && $santriCount != 0 ? round(($registCount / $santriCount) * 100, 2) : 0 ?>%
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="3 17 9 11 13 15 21 7" />
                                        <polyline points="14 7 21 7 21 14" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: <?= $registCount != 0 && $santriCount != 0 ? ($registCount / $santriCount) * 100 : 0 ?>%" role="progressbar" aria-valuenow="<?= $registCount != 0 && $santriCount != 0 ? ($registCount / $santriCount) * 100 : 0 ?>" aria-valuemin="0" aria-valuemax="100" aria-label="<?= $registCount != 0 && $santriCount != 0 ? ($registCount / $santriCount) * 100 : 0 ?>% Complete">
                                <span class="visually-hidden"><?= $registCount != 0 && $santriCount != 0 ? ($registCount / $santriCount) * 100 : 0 ?>%
                                    Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Terverifikasi</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-3 me-2"><?= $veris ?></div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    santri
                                    <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 11 12 14 20 6"></polyline>
                                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div id="chart-new-clients" class="chart-sm"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Belum Terverifikasi</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-3 me-2"><?= $santriCount - $veris ?></div>
                            <div class="me-auto">
                                <span class="text-red d-inline-flex align-items-center lh-1">
                                    santri
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div id="chart-active-users" class="chart-sm"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Statistic Pemasukan</h3>
                        <div id="chart-temperature"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Penggunaan Anggran Bidang</h3>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Bidang</th>
                                    <th scope="col">Anggaran</th>
                                    <th scope="col">Penggunaan</th>
                                    <th scope="col">Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggaran as $ang) : ?>
                                    <tr>
                                        <td><?= $ang->nama ?></td>
                                        <td><?= rupiah($ang->pagu) ?></td>
                                        <td><?= rupiah($ang->pakai) ?></td>
                                        <td><?= rupiah($ang->pagu - $ang->pakai) ?></td>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-temperature'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            fill: {
                opacity: 1,
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Pendaftaran",
                data: [Number(<?= $bpJan->nom ?>), Number(
                    <?= $bpFeb->nom ?>), Number(<?= $bpMar->nom ?>), Number(
                    <?= $bpApr->nom ?>), Number(<?= $bpMei->nom ?>), Number(
                    <?= $bpJun->nom ?>), Number(<?= $bpJul->nom ?>), Number(
                    <?= $bpAgs->nom ?>), Number(<?= $bpSep->nom ?>), Number(
                    <?= $bpOkt->nom ?>), Number(<?= $bpNov->nom ?>), Number(
                    <?= $bpDes22->nom ?>)]
            }, {
                name: "Registrasi Ulang",
                data: [Number(<?= $rgJan->nom ?>), Number(
                    <?= $rgFeb->nom ?>), Number(<?= $rgMar->nom ?>), Number(
                    <?= $rgApr->nom ?>), Number(<?= $rgMei->nom ?>), Number(
                    <?= $rgJun->nom ?>), Number(<?= $rgJul->nom ?>), Number(
                    <?= $rgAgs->nom ?>), Number(<?= $rgSep->nom ?>), Number(
                    <?= $rgOkt->nom ?>), Number(<?= $rgNov->nom ?>), Number(
                    <?= $rgDes22->nom ?>)]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            dataLabels: {
                enabled: true,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                categories: ['Jan 23', 'Feb 23', 'Mar 23', 'Apr 23', 'May 23', 'Jun 23', 'Jul 23',
                    'Aug 23', 'Sep 23', 'Oct 23', 'Nov 23', 'Dec 22'
                ],
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: [tabler.getColor("primary"), tabler.getColor("green")],
            legend: {
                show: false,
            },
            markers: {
                size: 2
            },
        })).render();
    });
</script>