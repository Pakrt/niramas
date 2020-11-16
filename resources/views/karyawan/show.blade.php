@extends('layouts.master')
@section('tittle')
    Data Karyawan
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Data Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href="/karyawan" class="btn btn-danger btn-xs">Data Karyawan</a></li>
                <li class="breadcrumb-item active">Detail Karyawan</li>
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

                <!-- Profile Image -->
            <div class="card card-maroon card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                      <a href="{{ $karyawan->user->getAvatar() }}" target="_blank">
                        <img class="img-circle" width="250px" height="250px"
                        src="{{ $karyawan->user->getAvatar() }}"
                        alt="User profile picture">
                      </a>
                  </div>
                  <h3 class="profile-username text-center">{{ $karyawan->nama }}</h3>
                  <p class="text-muted text-center">{{ $karyawan->bagian->nama }}</p>
                  <div class="col-md-12">
                    <div class="row text-center m-t-10">
                        <div class="col-md-4"><strong>NIK</strong>
                            <p>{{$karyawan->nik}}</p>
                        </div>
                        <div class="col-md-4"><strong>Tanggal Lahir</strong>
                            <p>{{$karyawan->tanggal_lahir}}</p>
                        </div>
                        <div class="col-md-4"><strong>Jenis Kelamin</strong>
                            <p>
                            @if ($karyawan->jenis_kelamin == 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                            </p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr color="maroon">
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-4"><strong>Email ID</strong>
                            <p>{{$karyawan->user->email}}</p>
                        </div>
                        <div class="col-md-4"><strong>Kontak</strong>
                            <p>+62 {{$karyawan->kontak}}</p>
                        </div>
                        <div class="col-md-4"><strong>Alamat</strong>
                            <p>{{$karyawan->alamat}}</p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr color="maroon">
                    <div class="">
                        <a href="{{url('/karyawan')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    <!-- .row -->
                  </div>
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
