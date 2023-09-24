<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">

        <!-- <div class="col-12 col-lg-auto mt-1 mt-lg-0">
            <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                    Copyright &copy; 2022
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                </li>
                <li class="list-inline-item">
                    <a href="/changelog.html" class="link-secondary" rel="noopener">
                        v1.0.0-beta14
                    </a>
                </li>
            </ul>
        </div> -->
    </div>
</footer>
</div>
</div>

<!-- Libs JS -->
<script src="<?= base_url('demo'); ?>/dist/libs/apexcharts/dist/apexcharts.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/dist/libs/jsvectormap/dist/maps/world.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/dist/libs/jsvectormap/dist/maps/world-merc.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/dist/libs/litepicker/dist/litepicker.js?1668288743" defer></script>
<script src="<?= base_url('demo'); ?>/dist/libs/tom-select/dist/js/tom-select.base.min.js?1666304673" defer></script>
<!-- Tabler Core -->
<script src="<?= base_url('demo'); ?>/dist/js/tabler.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/dist/js/demo.min.js?1666304673" defer></script>

<script src="<?= base_url('demo'); ?>/dist/libs/tinymce/tinymce.min.js?1668288743" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('demo'); ?>/dist/jquery.mask.min.js"></script>
<!-- panggil ckeditor.js -->
<script type="text/javascript" src="<?= base_url('demo'); ?>/ckeditor/ckeditor.js"></script>
<!-- panggil adapter jquery ckeditor -->
<script type="text/javascript" src="<?= base_url('demo'); ?>/ckeditor/adapters/jquery.js"></script>
<!-- setup selector -->

<script src="<?= base_url('demo/'); ?>sw/sweetalert2.all.min.js"></script>
<script src="<?= base_url('demo/'); ?>sw/my-notif.js"></script>

<script type="text/javascript">
    $('textarea.texteditor').ckeditor();
</script>
<script>
    // @formatter:off
    // Pake ini
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
                stacked: true,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Web",
                data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24,
                    29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6
                ]
            }, {
                name: "Social",
                data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4,
                    6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0
                ]
            }, {
                name: "Other",
                data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1,
                    2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6
                ]
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
                xaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19',
                '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24',
                '2020-07-25', '2020-07-26'
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor(
                "green", 0.8)],
            legend: {
                show: false,
            },
        })).render();
    });

    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        let options = {
            selector: '#tinymce-mytextarea',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }
        tinyMCE.init(options);
    })
    // @formatter:on

    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.Litepicker && (new Litepicker({
            element: document.getElementById('datepicker'),
            buttonText: {
                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
            },
        }));
    });
    // @formatter:on



    $(document).ready(function() {
        $('#example').DataTable();
        $('#example2').DataTable();

        var dengan_rupiah = document.getElementById('rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });

    $(document).ready(function() {

        // Format mata uang.
        $('.uang').mask('000.000.000.000', {
            reverse: true
        });

    })
</script>
<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading").hide();

        $("#provinsi").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#kota").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("santriAdm/listKota"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_provinsi: $("#provinsi").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#kota").html(response.list_kota).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError); // Munculkan alert error
                }
            });
        });

        $("#kota").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#kec").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("santriAdm/listKec"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_kab: $("#kota").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#kec").html(response.list_kec).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError); // Munculkan alert error
                }
            });
        });

        $("#kec").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#kel").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("santriAdm/listDesa"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_kec: $("#kec").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#kel").html(response.list_desa).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError); // Munculkan alert error
                }
            });
        });

        $("#kec2").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#skl").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("santriAdm/listSkl"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_kec: $("#kec2").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#skl").html(response.list_skl).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError); // Munculkan alert error
                }
            });

        });

        $("#provinsi2").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#kota2").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("santriAdm/listKota"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_provinsi: $("#provinsi2").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#kota2").html(response.list_kota).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError); // Munculkan alert error
                }
            });
        });

        $("#kota2").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#kec2").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("santriAdm/listKec"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_kab: $("#kota2").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#kec2").html(response.list_kec).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('select-users'), {
            copyClassesToDropdown: false,
            dropdownClass: 'dropdown-menu ts-dropdown',
            optionClass: 'dropdown-item',
            controlInput: '<input>',
            render: {
                item: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
    // @formatter:on
</script>

</body>

</html>