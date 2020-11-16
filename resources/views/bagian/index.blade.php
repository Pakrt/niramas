@extends('layouts.master')
@section('tittle')
    Data Department
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Data Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item active">Data Department</li>
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
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th width="20">#</th>
                      <th width="150">KODE DEPARTMENT</th>
                      <th>NAMA DEPARTMENT</th>
                      <th width="100">AKSI</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($bagian as $bagian)
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{$bagian->kode}}</td>
                            <td>{{$bagian->nama}}</td>
                            <td text-center>
                                <form action="/bagian/{{ $bagian->id }}/delete" method="POST">
                                    @method('delete')
                                    @csrf
                                    <a href="/bagian/{{$bagian->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>&emsp;
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus datanya niiih ??')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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
                <form action="/bagian/create" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group{{$errors->has('kode') ? 'has-error' : ''}}">
                        <label>Kode Department</label>
                        <input type="text" name="kode" class="form-control" style="border-color: maroon" required>
                        @if($errors->has('kode'))
                            <span class="help-block">{{$errors->first('kode')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Department</label>
                        <input type="text" name="nama" class="form-control" style="border-color: maroon" required>
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
