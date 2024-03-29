@extends('layouts.master')
@section('tittle')
    Form Tambah Karyawan
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Form Tambah Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href={{ url('/karyawan')}} class="btn btn-danger btn-xs">Data Karyawan</a></li>
                <li class="breadcrumb-item active">Form Tambah Karyawan</li>
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
            <div class="col-md-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                    <form action="/karyawan/create" method="POST">
                        @csrf
                        <div class="row col-md-12">
                            <div class="form-group col-md-4 col-xs-12 {{$errors->has('nik') ? 'has-error' : ''}}">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" style="border-color: maroon" value="{{old('nik')}}" required>
                                @if($errors->has('nik'))
                                <span class="help-block">{{$errors->first('nik')}}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" style="border-color: maroon" value="{{old('nama')}}" required>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Department</label>
                                <select style="border-color: maroon" class="form-control select2bs4" name="bagian_id"  required>
                                    @foreach ($bagian as $bagian)
                                    <option value="{{$bagian->id}}">{{$bagian->kode}} - {{$bagian->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Role</label>
                                <select style="border-color: maroon" class="form-control select2bs4" name="role"  required>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="CREW">CREW</option>
                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" style="border-color: maroon" value="{{old('tanggal_lahir')}}" required>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Jenis Kelamin</label>
                                <select style="border-color: maroon" class="form-control select2bs4" name="jenis_kelamin"  required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-xs-12 {{$errors->has('email') ? 'has-error' : ''}}">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" style="border-color: maroon" value="{{old('email')}}">
                            @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-5 col-xs-12 {{$errors->has('kontak') ? 'has-error' : ''}}">
                            <label>Nomor HP</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" style="border-color: maroon">+62 </span>
                                </div>
                                <input type="text" name="kontak" class="form-control" style="border-color: maroon" placeholder="82134567890" value="{{old('kontak')}}" required>
                            </div>
                            @if($errors->has('kontak'))
                            <span class="help-block">{{$errors->first('kontak')}}</span>
                            @endif
                            {{-- <span class="input-group-text">+62 </span>
                            <input type="kontak" name="kontak" class="form-control" style="border-color: maroon" placeholder="+62 " required> --}}
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" style="border-color: maroon">{{old('alamat')}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('karyawan') }}" class="btn btn-warning" onclick="return confirm('Yakin mau balik ??')">Kembali</a>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Udah selesai update nya ??')">Tambah Data</button>
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
