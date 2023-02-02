@extends('template.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">{{ $title }}</h5>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <form action="{{ route('edit_kardus') }}" method="post">
                            @csrf
                            <div class="card-body hitung_kg">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tgl" class="form-control" value="{{ $kardus->tgl }}"
                                            required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Costumer</label>
                                        <select name="id_post" id="costumer" class="form-control select" required>
                                            <option value="">--Pilih Costumer--</option>
                                            @foreach ($costumer as $c)
                                            <option value="{{ $c->id_post }}" {{ $kardus->id_post == $c->id_post ?
                                                'selected' : '' }}>{{
                                                $c->nm_post }}
                                            </option>
                                            @endforeach
                                            <option value="Tambah">+ Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table " style="white-space: nowrap">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Berat</th>
                                                    <th width="25%">Type</th>
                                                    <th width="25%">Harga Satuan</th>
                                                    <th width="25%">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <input type="text" style="text-align-last: right" name="berat"
                                                            class="form-control berat" value="{{ $kardus->berat }}">
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select2" name="type">
                                                            <option value="">-Pilih Type-</option>
                                                            @foreach ($type as $t)
                                                            <option value="{{$t->id_type_kardus}}" {{$t->id_type_kardus
                                                                == $kardus->type ? 'selected' : ''}}>
                                                                {{$t->nm_type}}</option>
                                                            @endforeach
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="h_satuan"
                                                            style="text-align-last: right"
                                                            value="{{ $kardus->h_satuan }}"
                                                            class="form-control h_satuan">
                                                    </td>
                                                    <td>
                                                        <input type="text" style="text-align-last: right" name="total"
                                                            value="{{ $kardus->total }}" class="form-control total"
                                                            required>
                                                        <input type="hidden" name="nota" value="{{ $kardus->no_nota }}">
                                                        <input type="hidden" name="urutan"
                                                            value="{{ $kardus->urutan }}">
                                                        <input type="hidden" name="id_post2"
                                                            value="{{ $kardus->id_post }}">
                                                    </td>

                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th style="text-align: right;vertical-align: middle">Total:</th>
                                                    <th>
                                                        <input type="text" class="form-control total"
                                                            value="{{ $kardus->total }}" style="text-align: right"
                                                            readonly>
                                                    </th>
                                                </tr>


                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer hitung_kg">
                                <button type="submit" class="btn float-right btn-costume"><i class="fas fa-save"></i>
                                    Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<form method="post" action="{{route('tb_post')}}">
    @csrf
    <div class="modal fade tbh_post" id="tbh_post" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-costume">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="">Nama Customer</label>
                            <input type="text" class="form-control" name="nm_post">
                            <input type="hidden" value="21" class="form-control" name="id_akun">
                        </div>
                        <div class="col-lg-4">
                            <label for="">No Telpon</label>
                            <input type="text" class="form-control" name="no_telpon">
                        </div>
                        <div class="col-lg-4">
                            <label for="">NPWP</label>
                            <input type="text" class="form-control" name="npwp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-costume" action="">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        

            $(document).on('keyup', '.berat', function() {
                var berat = $('.berat').val();
                var h_satuan = $('.h_satuan').val();

                var hitung= parseInt(berat) * parseInt(h_satuan);

                $('.total').val(hitung)

            });
            $(document).on('keyup', '.h_satuan', function() {
                var berat = $('.berat').val();
                var h_satuan = $('.h_satuan').val();
                

                var hitung= parseInt(berat) * parseInt(h_satuan);

                $('.total').val(hitung)

            });
            
            
            $(document).on('change', '#costumer', function() {

               var id_post = $(this).val();

              if (id_post == 'Tambah') {
                $('.tbh_post').modal('show')
              } else {
                  
              }


            });


        });
</script>
<!-- /.control-sidebar -->
@endsection