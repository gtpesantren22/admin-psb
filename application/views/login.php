<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta16
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin PSB 23 - PPDWK</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content="" />
    <meta name="theme-color" content="" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="<?= base_url('demo'); ?>./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url('demo'); ?>./favicon.ico" type="image/x-icon" />
    <meta name="description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!" />
    <meta name="twitter:image:src" content="https://preview.tabler.io/static/og.png">
    <meta name="twitter:site" content="@tabler_ui">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta name="twitter:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta property="og:image" content="https://preview.tabler.io/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Tabler">
    <meta property="og:type" content="object">
    <meta property="og:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta property="og:url" content="https://preview.tabler.io/static/og.png">
    <meta property="og:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <!-- CSS files -->
    <link href="<?= base_url('demo'); ?>./dist/css/tabler.min.css?1668288743" rel="stylesheet" />
    <link href="<?= base_url('demo'); ?>./dist/css/tabler-flags.min.css?1668288743" rel="stylesheet" />
    <link href="<?= base_url('demo'); ?>./dist/css/tabler-payments.min.css?1668288743" rel="stylesheet" />
    <link href="<?= base_url('demo'); ?>./dist/css/tabler-vendors.min.css?1668288743" rel="stylesheet" />
    <link href="<?= base_url('demo'); ?>./dist/css/demo.min.css?1668288743" rel="stylesheet" />
    <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    </style>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <script src="<?= base_url('demo'); ?>./dist/js/demo-theme.min.js?1668288743"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36"
                        alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login Admin PSB</h2>
                    <form action="<?= base_url('login/masuk'); ?>" method="post" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <!-- <span class="form-label-description">
                                    <a href="#">I forgot password</a>
                                </span> -->
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password" placeholder="Your password"
                                    required autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Login ke</label>
                            <select class="form-control" name="tujuan" placeholder="Username" required>
                                <option value=""> -pilih- </option>
                                <option value="adm"> Administrasi </option>
                                <option value="bunda"> Admin Bendahara </option>
                            </select>
                        </div>
                        <!-- <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Ingat saya</span>
                            </label>
                        </div> -->
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Masuk</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="text-center text-muted mt-3">
                Belum punya akun ? <a href="<?= base_url('login/daftar'); ?>" tabindex="-1">Daftar Akun</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('demo'); ?>./dist/js/tabler.min.js?1668288743" defer></script>
    <script src="<?= base_url('demo'); ?>./dist/js/demo.min.js?1668288743" defer></script>
</body>

</html>