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
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <img src="{{ asset('assets') }}/menu/img/agrilaras.png" alt="" width='150px'>
                            </div>
                            <div class="float-right">
                                <table style="font-size: small;">
                                    <tr>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">Tanggal</td>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">:</td>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">{{date('d-m-Y',strtotime($nota->tgl))}}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">No nota</td>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">:</td>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">T-{{$nota->no_nota}}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">Kpd Yth, Bpk/Ibu</td>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">:</td>
                                        <td style="padding: 0.75rem;
                                        vertical-align: top;">{{$nota->nm_post}}{{$nota->urutan}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered"
                                style="text-align: center;white-space: nowrap; vertical-align: middle">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Ekor</th>
                                        <th>Timbangan <br> (Kg)</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <th>Ayam</th>
                                    <td>{{number_format($nota->ekor,0)}}</td>
                                    <td>{{number_format($nota->berat,2)}}</td>
                                    <td>{{number_format($nota->harga,0)}}</td>
                                    <td>{{number_format($nota->ttl_harga,0)}}</td>
                                </tbody>
                                <tfoot>
                                    <th colspan="3"></th>
                                    <th>TOTAL</th>
                                    <th>{{number_format($nota->ttl_harga,0)}}</th>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            <form action="{{route('save_jurnal_ayam')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-3 mb-2">
                                        <p>BCA</p>
                                        <input type="hidden" name="id_akun[]" value="32">
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" value="0" class="form-control bayar" name="debit[]"
                                            style="text-align: right" required>
                                    </div>
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-3 mb-2">
                                        <p>Kas Agri Sinta</p>
                                        <input type="hidden" name="id_akun[]" value="33">
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" value="0" class="form-control bayar" name="debit[]"
                                            style="text-align: right" required>
                                    </div>
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-3 mb-2">
                                        <p>Piutang Ayam</p>
                                        <input type="hidden" name="id_akun[]" value="52">
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" value="0" class="form-control bayar" name="debit[]"
                                            style="text-align: right" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <hr style="border: 1px solid black">
                                    </div>
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-3">
                                        <em class="float-right">Total :</em>
                                    </div>
                                    <div class="col-lg-4">
                                        <em class="float-right"><strong id="total_bayar">Rp. 0</strong></em>
                                    </div>
                                </div>

                                <input type="hidden" class="total_asli" name="total" value="{{$nota->ttl_harga}}">
                                <input type="hidden" class="total_hitung">
                                <input type="hidden" name="no_nota" value="{{$nota->no_nota}}">
                                <input type="hidden" name="tgl" value="{{$nota->tgl}}">
                                <input type="hidden" name="id_post" value="{{$nota->id_post}}">
                                <div class="col-lg-12 mt-4">
                                    <button id="btn_bayar" class="btn btn-costume  float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('keyup', '.bayar', function() {
            var bayar =  $(this).val();
            var ttl_rp = 0;
            $(".bayar").each(function() {
                ttl_rp += parseInt($(this).val());
            });

            var number_total = ttl_rp.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            var rupiah_total = "Rp. " + number_total;
            $('#total_bayar').text(rupiah_total);
            $('.total_hitung').val(ttl_rp);


           var hitung = $('.total_hitung').val();
            var asli = $('.total_asli').val();

            if (hitung == asli) {
                    $('#btn_bayar').removeAttr('disabled');
                    // alert('tes')
                } else {
                    // alert('tes1')
                    $('#btn_bayar').attr('disabled', 'true');
            }
        });
        var count = 1;
        $(document).on('click', '.tbh_pembayaran', function() {
            count = count + 1;
            $.ajax({
                url: "{{ route('tambah_pembayaran_ayam') }}?count=" + count ,
                type: "Get",
                    success: function(data) {
                            $('#tambah').append(data);
                            $('.select').select2()
                    }
            }); 
                
        });
        $(document).on('click', '.remove', function() {
                var delete_row = $(this).attr('count');
                $('#row' + delete_row).remove();

                var ttl_rp = 0;
            $(".bayar").each(function() {
                ttl_rp += parseInt($(this).val());
            });

            var number_total = ttl_rp.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            var rupiah_total = "Rp. " + number_total;
            $('#total_bayar').text(rupiah_total);
            $('.total_hitung').val(ttl_rp);


           var hitung = $('.total_hitung').val();
            var asli = $('.total_asli').val();

            if (hitung == asli) {
                    $('#btn_bayar').removeAttr('disabled');
                    // alert('tes')
                } else {
                    // alert('tes1')
                    $('#btn_bayar').attr('disabled', 'true');
            }
                
        });
    });
</script>
@endsection