@extends('template.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">{{$title}}</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <form id="submit_summary">
                        <div class="card">
                            <div class="card-header" style="background-color: #BDEED9; color: #787878">
                                <h5>Pengelolaan Data Pengeluaran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Dari</label>
                                        <input type="date" name="" id="tgl1" class="form-control">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Sampai</label>
                                        <input type="date" name="" id="tgl2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-block"
                                    style="background-color: #629779; color: white">Lanjutkan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div id="laporan"></div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>


<!-- /.control-sidebar -->
@endsection
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#submit_summary', function(e) {
            e.preventDefault();
            var tgl1 = $("#tgl1").val();
            var tgl2 = $("#tgl2").val();
            var url = "{{route('view_summary')}}?tgl1=" + tgl1 + "&tgl2=" + tgl2;
            $('#laporan').load(url);
            
        });
    });
</script>