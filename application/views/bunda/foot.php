<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">

        <div class="col-12 col-lg-auto mt-1 mt-lg-0">
            <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                    Copyright &copy; 2022
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                </li>
                <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                        v1.0.0-beta14
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Libs JS -->
<script src="<?= base_url('demo'); ?>./dist/libs/apexcharts/dist/apexcharts.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>./dist/libs/jsvectormap/dist/maps/world.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>./dist/libs/jsvectormap/dist/maps/world-merc.js?1666304673" defer></script>
<!-- Tabler Core -->
<script src="<?= base_url('demo'); ?>./dist/js/tabler.min.js?1666304673" defer></script>
<script src="<?= base_url('demo'); ?>./dist/js/demo.min.js?1666304673" defer></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

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

$(document).ready(function() {
    $('#example').DataTable();
    $('#example2').DataTable();
});
</script>
</body>

</html>