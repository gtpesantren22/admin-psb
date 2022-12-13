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

            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">TOTAL SEKOLAH</div>
                        </div>
                        <div class="h1 mb-3">75%</div>
                        <div class="d-flex mb-2">
                            <div>Conversion rate</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    7%
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="3 17 9 11 13 15 21 7" />
                                        <polyline points="14 7 21 7 21 14" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="d-flex align-items-center">
                            <div class="subheader">Upload</div>
                        </div> -->
                        <form id="form-upload-user" method="post" autocomplete="off">
                            <div class="sub-result"></div>
                            <div class="form-group">
                                <label class="control-label">Pilih Berkas <small class="text-danger">*</small></label>
                                <input type="file" class="form-control form-control-sm" id="file" name="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    required>
                                <small class="text-danger">Upload excel or csv file only.</small>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <div class="user-loader" style="display: none; ">
                                        <i class="fa fa-spinner fa-spin"></i> <small>Please wait ...</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light"
                                    id="btnUpload">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $("body").on("submit", "#form-upload-user", function(e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('import/import') ?>",
            data: data,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#btnUpload").prop('disabled', true);
                $(".user-loader").show();
            },
            success: function(result) {
                $("#btnUpload").prop('disabled', false);
                if ($.isEmptyObject(result.error_message)) {
                    $(".result").html(result.success_message);
                } else {
                    $(".sub-result").html(result.error_message);
                }
                $(".user-loader").hide();
            }
        });
    });
});
</script>