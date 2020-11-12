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
                <li class="breadcrumb-item"><a href="/home" class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
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
                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn">
                      <img class="img-circle" width="250px" height="250px"
                        src="{{ Auth::user()->getAvatar() }}"
                        alt="User profile picture">
                    </button>
                  </div>
                  <div class="col-md-12">
                    <a href="/karyawan/{{$user->karyawan->id}}/edit" class="btn btn-md" style="background-color: transparent; color:black"><i class="fas fa-pencil-alt"></i></a>
                    <h3 class="profile-username text-center">{{ $user->karyawan->nama }}</h3>
                    <p class="text-muted text-center">{{ $user->karyawan->bagian->nama }}</p>
                  </div>
                  <div class="col-md-12">
                    <div class="row text-center m-t-10">
                        <div class="col-md-4"><strong>NIK</strong>
                            <p>{{$user->karyawan->nik}}</p>
                        </div>
                        <div class="col-md-4"><strong>Tanggal Lahir</strong>
                            <p>{{$user->karyawan->tanggal_lahir}}</p>
                        </div>
                        <div class="col-md-4"><strong>Jenis Kelamin</strong>
                            <p>
                            @if ($user->karyawan->jenis_kelamin == 'L')
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
                            <p>{{$user->karyawan->user->email}}</p>
                        </div>
                        <div class="col-md-4"><strong>Kontak</strong>
                            <p>+62 {{$user->karyawan->kontak}}</p>
                        </div>
                        <div class="col-md-4"><strong>Alamat</strong>
                            <p>{{$user->karyawan->alamat}}</p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr color="maroon">
                    <!-- .row -->
                    <div class="text-center">
                        <a href="{{ url('password')}}"><small style="color: maroon">Ganti Password</small></a>
                    </div>
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
                <form action="/user/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ganti Avatar</label>
                        <input type="file" name="avatar" class="form-control" style="border-color: maroon">
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
