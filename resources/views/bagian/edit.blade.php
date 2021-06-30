@extends('layouts.master')
@section('tittle')
    Edit Data Department
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Edit Data Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Data Department</a></li>
                <li class="breadcrumb-item active">Edit Data Department</li>
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
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-body">
                    <form action="/bagian/{{$bagian->id}}/update" method="POST">
                        @csrf
                            <div class="form-group col-md-4 col-sm-4">
                                <label>Kode Department</label>
                                <input type="text" name="kode" class="form-control" style="border-color: maroon" required value="{{$bagian->kode}}" disabled>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Nama Department</label>
                                <input type="text" name="nama" class="form-control" style="border-color: maroon" required value="{{$bagian->nama}}">
                            </div>
                        <div class="modal-footer">
                            <a href="{{ url('/bagian') }}" class="btn btn-warning" onclick="return confirm('Yakin mau balik ??')">Kembali</a>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Udah selesai update nya ??')">Update Data</button>
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
@endsection
