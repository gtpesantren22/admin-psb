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
<!-- Tabler Core -->
<script src="<?= base_url('demo'); ?>/dist/js/tabler.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/dist/js/demo.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>/sw/sweetalert2.all.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('demo'); ?>/dist/jquery.mask.min.js"></script>
<script src="<?= base_url('demo'); ?>/sw/my-notif.js"></script>

<script>
    // @formatter:off

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
</body>

</html>