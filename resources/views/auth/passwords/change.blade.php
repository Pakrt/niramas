@extends('layouts.master')
@section('tittle')
    Data Satuan
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Data Satuan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href="/home" class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href="/satuan" class="btn btn-danger btn-xs">Master</a></li>
                <li class="breadcrumb-item active">Master Satuan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="/password/update">
                        @csrf
                        @method('put')
                            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="current_password" class="col-md-4 control-label">Password Lama</label>
                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control" name="current_password" style="border-color: maroon">
                                    <span class="help-block">{{ $errors->first('current_password') }}</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password Baru</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" style="border-color: maroon">
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="col-md-4 control-label">Konfirmasi Password Baru</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" style="border-color: maroon">
                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <a href="/user/{{Auth::id()}}/detail" class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-success">Ganti Password</button>
                                </div>
                            </div>
                        </form>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: maroon; color:white ">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/satuan/create" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group{{$errors->has('kode') ? 'has-error' : ''}}">
                        <label>Kode Satuan</label>
                        <input type="text" name="kode" class="form-control" style="border-color: maroon" required>
                        @if($errors->has('kode'))
                            <span class="help-block">{{$errors->first('kode')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Satuan</label>
                        <input type="text" name="nama" class="form-control" style="border-color: maroon" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" style="border-color: maroon">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
            </div>
            </div>
        </div>
@endsection
