<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin PSB 2023</title>
    <!-- CSS files -->
    <link href="<?= base_url('demo') ?>/dist/css/tabler.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/tabler-flags.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/tabler-payments.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/tabler-vendors.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/demo.min.css?1666304673" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body class=" layout-fluid">
    <script src="<?= base_url('demo'); ?>/dist/js/demo-theme.min.js?1666304673"></script>
    <div class="page">
        <!-- Navbar -->
        <div class="sticky-top">
            <header class="navbar navbar-expand-md navbar-dark d-print-none">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                        <a href="<?= base_url('bidang'); ?>">
                            Bendahara PSB 2023 - PPDWK
                        </a>
                    </h1>
                    <div class="navbar-nav flex-row order-md-last">

                        <div class="d-none d-md-flex">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="4" />
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                            <div class="nav-item dropdown d-none d-md-flex me-3">
                                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                    </svg>
                                    <span class="badge bg-red"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Last updates</h3>
                                        </div>
                                        <div class="list-group list-group-flush list-group-hoverable">
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="#" class="text-body d-block">Example 1</a>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            Change deprecated html tags to text decoration classes
                                                            (#29604)
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="list-group-item-actions">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <span class="avatar avatar-sm" style="background-image: url(<?= base_url('demo') ?>/static/avatar.png)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div><?= $user->nama; ?></div>
                                    <div class="mt-1 small text-muted"><?= $user->jabatan; ?></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <!-- <div class="dropdown-divider"></div> -->
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="<?= base_url('login/logout') ?>" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="navbar-expand-md">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="navbar navbar-light">
                        <div class="container-xl">
                            <ul class="navbar-nav">
                                <li class="nav-item <?= $judul === 'home' ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?= base_url('bidang') ?>">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown <?= $judul === 'santri' ? 'active' : ''; ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="4" />
                                                <circle cx="12" cy="12" r="9" />
                                                <line x1="15" y1="15" x2="18.35" y2="18.35" />
                                                <line x1="9" y1="15" x2="5.65" y2="18.35" />
                                                <line x1="5.65" y1="5.65" x2="9" y2="9" />
                                                <line x1="18.35" y1="5.65" x2="15" y2="9" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Data Santri
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('santridv'); ?>">
                                            Santri Baru
                                        </a>
                                        <a class="dropdown-item" href="<?= base_url('santridv/lanjut'); ?>">
                                            Santri Lanjutan
                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item <?= $judul === 'pengajuan' ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?= base_url('bidang/pengajuan') ?>">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                <path d="M17 17h-11v-14h-2"></path>
                                                <path d="M6 5l14 1l-1 7h-13"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Pengajuan
                                        </span>
                                    </a>
                                </li>
                                <?php if ($user->level == 'admin' || ($user->level == 'division' && $user->jabatan == '11LG')) : ?>
                                    <li class="nav-item <?= $judul === 'seragam' ? 'active' : ''; ?>">
                                        <a class="nav-link" href="<?= base_url('bidang/seragam') ?>">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shirt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                List Seragam
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown <?= $judul === 'registrasi' ? 'active' : ''; ?>">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12">
                                                    </path>
                                                    <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Registrasi Ulang
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('bidang/registrasi'); ?>">
                                                Registrasi Santri Baru
                                            </a>
                                            <a class="dropdown-item" href="<?= base_url('bidang/registrasiLanjut'); ?>">
                                                Registrasi Santri Lanjutan
                                            </a>
                                        </div>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('ok') ?>"></div>
            <div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('error') ?>"></div>