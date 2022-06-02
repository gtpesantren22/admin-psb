  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="logout.php" class="btn btn-primary">Logout</a>
              </div>
          </div>
      </div>
  </div>

  </div>
  <!---Container Fluid-->

  </div>
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>copyright &copy; <script>
                      document.write(new Date().getFullYear());
                  </script> - developed by
                  <b><a href="https://indrijunanda.gitlab.io/" target="_blank">SMK DWK</a></b>
              </span>
          </div>
      </div>
  </footer>
  <!-- Footer -->
  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Select2 -->
  <script src="vendor/select2/dist/js/select2.full.min.js"></script>
  <script src="vendor/select2/dist/js/select2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Datatables -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="vendor/sw/sweetalert2.all.min.js"></script>


  <!-- Page level custom scripts -->
  <script>
      $(document).ready(function() {
          $('#dataTable').DataTable(); // ID From dataTable 
          $('#dataTableHover').DataTable(); // ID From dataTable with Hover
          $('#dataTableHover2').DataTable(); // ID From dataTable with Hover
      });
  </script>
  <script>
      $(document).ready(function() {
          $('.select2-single').select2();
          // Select2 Single  with Placeholder
          $('.select2-single-placeholder').select2({
              placeholder: "Select a Province",
              allowClear: true
          });
      });
  </script>

  <script type="text/javascript">
      var rupiah = document.getElementById('uang');
      var rupiah2 = document.getElementById('uang2');
      var rupiah3 = document.getElementById('uang3');

      rupiah.addEventListener('keyup', function(e) {
          rupiah.value = formatRupiah(this.value);
      });
      rupiah2.addEventListener('keyup', function(e) {
          rupiah2.value = formatRupiah(this.value);
      });
      rupiah3.addEventListener('keyup', function(e) {
          rupiah3.value = formatRupiah(this.value);
      });

      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
              split = number_string.split(','),
              sisa = split[0].length % 3,
              rupiah = split[0].substr(0, sisa),
              ribuan = split[0].substr(sisa).match(/\d{3}/gi);

          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
          }

          rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
          return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
  </script>
  </body>

  </html>