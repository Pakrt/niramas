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
                <li class="breadcrumb-item active">Data Karyawan</li>
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
            <div class="col-md-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                    @if(auth()->user()->role == 'ADMIN')
                    <a href="{{ url('karyawan/form')}}" class="btn btn-secondary">Tambah Data</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row d-flex align-items-stretch">
                        @foreach ($karyawan as $karyawan)
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                              <div class="card-header text-muted border-bottom-0">
                                {{$karyawan->user->role}} - {{$karyawan->bagian->nama}}
                              </div>
                              <div class="card-body pt-0">
                                <div class="row">
                                  <div class="col-md-3 col-xs-2 text-center">
                                    <img src="{{$karyawan->user->getAvatar()}}" alt="" class="img-circle img-fluid">
                                  </div>
                                  <div class="col-md-7">
                                    <h2 class="lead"><b>{{$karyawan->nama}}</b></h2>
                                    {{-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> --}}
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                      <li class="medium"><span class="fa-li"><i class="fas fa-md fa-home"></i></span> {{$karyawan->alamat}}</li>
                                      <li class="medium"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span> +62 {{$karyawan->kontak}}</li>
                                      <li class="medium"><span class="fa-li"><i class="fas fa-md fa-at"></i></span> {{$karyawan->user->email}}</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="text-right">
                                    <form action="/karyawan/{{ $karyawan->id }}/delete" method="POST">
                                      @method('delete')
                                      @csrf
                                      <a href="https://api.whatsapp.com/send?phone=62{{$karyawan->kontak}}" class="btn btn-sm bg-teal" target="_blank">
                                        <i class="fas fa-phone"></i> Hubungi
                                      </a>
                                      <a href="/karyawan/{{$karyawan->id}}/detail" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Detail
                                      </a>
                                      {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus datanya niiih ??')"><i class="fas fa-trash"></i> Hapus</button> --}}
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                          @endforeach
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
