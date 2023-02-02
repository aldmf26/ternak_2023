@extends('template.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="float-left">{{$title}} : {{date('d-m-Y',strtotime($tgl1))}} ~
                                {{date('d-m-Y',strtotime($tgl2))}}</h5>
                            <a href="" data-toggle="modal" data-target="#view"
                                class="btn btn-costume btn-sm float-right mr-1"><i class="fas fa-file-excel"></i>
                                Export
                            </a>
                            <a href="" data-toggle="modal" data-target="#view"
                                class="btn btn-costume btn-sm float-right mr-1"><i class="fas fa-calendar-alt"></i> View
                            </a>

                        </div>

                        <div class="card-body">
                            <table class="table text-center" id="example2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Akun</th>
                                        <th>Post Akun</th>
                                        <th>Debit <br> ({{ number_format($total_jurnal->debit, 0) }})
                                        </th>
                                        <th>Kredit <br> ({{ number_format($total_jurnal->kredit, 0) }})
                                        </th>
                                        <th>Saldo <br> ({{ number_format($total_jurnal->debit -
                                            $total_jurnal->kredit,
                                            0) }})</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($buku as $b)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$b->no_akun}}</td>
                                        <td style="text-align: left"><a
                                                href="{{route('detail_buku_besar',['id_akun'=> $b->id_akun,'tgl1'=>$tgl1,'tgl2'=> $tgl2])}}">{{$b->nm_akun}}</a>
                                        </td>
                                        <td style="text-align: right">{{number_format($b->debit,0)}}</td>
                                        <td style="text-align: right">{{number_format($b->kredit,0)}}</td>
                                        <td style="text-align: right">{{number_format($b->debit - $b->kredit,0)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<form method="get" action="">
    <div class="modal fade" id="view" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header bg-costume">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jurnal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Dari</label>
                            <input type="date" class="form-control" name="tgl1">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Sampai</label>
                            <input type="date" class="form-control" name="tgl2">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-costume" action="">Search</button>
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
<!-- /.control-sidebar -->
@endsection